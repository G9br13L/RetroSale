<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function showLoginPage()
    {
        // Initialize session
        $session = session();

        // If already logged in, send to landing
        if ($session->has('user')) {
            return redirect()->to('/');
        }

        // Pull flashdata errors/old/success if present
        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];

        return view('auth/login', ['errors' => $errors, 'old' => $old]);
    }

    public function login()
    {
        $session = session();

        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required');

        $post = $request->getPost();

        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        $email = $request->getPost('email');

        $userModel = new UsersModel();
        $user = $userModel->where('email', $email)->first();

        if (! $user) {
            $session->setFlashdata('errors', ['email' => 'No account found for that email']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $userArr = is_array($user) ? $user : (method_exists($user, 'toArray') ? $user->toArray() : (array) $user);

        if (! password_verify($request->getPost('password'), $userArr['password_hash'] ?? '')) {
            $session->setFlashdata('errors', ['password' => 'Incorrect password']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        if (($userArr['account_status'] ?? 0) == 0 || ($userArr['email_activated'] ?? 0) == 0) {
            $session->setFlashdata('errors', ['email' => 'Your account is not activated or has been deactivated.']);
            $session->setFlashdata('old', ['email' => $email]);
            return redirect()->back()->withInput();
        }

        $session->set('user', [
            'id' => $userArr['id'] ?? null,
            'email' => $userArr['email'] ?? null,
            'first_name' => $userArr['first_name'] ?? null,
            'last_name' => $userArr['last_name'] ?? null,
            'type' => $userArr['type'] ?? 'client',
            'display_name' => trim(($userArr['first_name'][0] ?? '') . ' ' . ($userArr['middle_name'][0] ?? '') . ' ' . ($userArr['last_name'] ?? '')),
        ]);

        $type = strtolower($userArr['type'] ?? 'client');

        if ($type === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        if ($type === 'client') {
            return redirect()->to('/');
        }

        // Default fallback (for other roles)
        return redirect()->to('/');
    }

    public function logout()
    {

        session()->destroy();


        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 3600,
            $params['path'] ?? '/',
            $params['domain'] ?? '',
            isset($_SERVER['HTTPS']),
            true
        );

        //Redirect to homepage or login page
        return redirect()->to('/');
    }

    public function showSignupPage()
    {
        // Initialize session
        $session = session();

        // If already logged in, redirect to home
        if ($session->has('user')) {
            return redirect()->to('/');
        }

        // Retrieve validation errors and old input data if present
        $errors = $session->getFlashdata('errors') ?? [];
        $old = $session->getFlashdata('old') ?? [];

        return view('auth/signup', ['errors' => $errors, 'old' => $old]);
    }

    public function signup()
    {
        // Create Session
        $session = session();

        // Extract Data from Frontend
        $request = service('request');
        $post = $request->getPost();

        // Create Rules for Validation
        $validation = \Config\Services::validation();

        // Define field rules based on your table requirements
        $validation->setRule('first_name', 'First Name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('middle_name', 'Middle Name', 'permit_empty|max_length[100]');
        $validation->setRule('last_name', 'Last Name', 'required|min_length[2]|max_length[100]');
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required|min_length[6]');
        $validation->setRule('password_confirm', 'Password Confirmation', 'required|matches[password]');

        // Catch validation errors
        if (! $validation->run($post)) {
            $session->setFlashdata('errors', $validation->getErrors());
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Create Model
        $userModel = new \App\Models\UsersModel();

        // Check for duplicate email
        $existing = $userModel->where('email', $post['email'])->first();
        if ($existing) {
            $session->setFlashdata('errors', ['email' => 'Email is already registered']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // Prepare Data Structure
        $data = [
            'first_name' => $post['first_name'],
            'middle_name' => $post['middle_name'] ?? null, // nullable field
            'last_name' => $post['last_name'],
            'email' => $post['email'],
            'password_hash' => password_hash($post['password'], PASSWORD_DEFAULT),
            'type' => 'client', // default role
            'account_status' => 1,
            'email_activated' => 0,
        ];

        // Insert Data into Database
        $inserted = $userModel->insert($data);

        // Catch possible DB errors
        if ($inserted === false) {
            $session->setFlashdata('errors', ['general' => 'Could not create account. Please try again.']);
            $session->setFlashdata('old', $post);
            return redirect()->back()->withInput();
        }

        // If all good
        $session->setFlashdata('success', 'Account successfully created. Please log in.');
        return redirect()->to('/login');
    }
}
