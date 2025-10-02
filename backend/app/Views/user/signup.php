<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSale - Sign Up</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1625805866449-3589fe3f71a3?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #f9fafb;
        }

        main {
            background-color: rgba(59, 60, 60, 0.9);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .signup-box {
            background: rgba(255, 255, 255, 0.06);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 380px;
            backdrop-filter: blur(8px);
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
        }

        input {
            width: 100%;
            padding: 0.9rem 1rem;
            margin-bottom: 1.2rem;
            border: none;
            border-radius: 0.6rem;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 1rem;
            line-height: 1.4;
            outline: none;
            box-sizing: border-box;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 2px #3b82f6;
        }

        input::placeholder {
            color: #d1d5db;
        }

        .extra-links {
            margin-top: 1.5rem;
            text-align: center;
        }

        .extra-links a {
            font-size: 0.9rem;
            color: #93c5fd;
            text-decoration: none;
            transition: color 0.2s;
        }

        .extra-links a:hover {
            color: #60a5fa;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?= view('components/header') ?>

    <main>
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form>
                <input type="text" placeholder="Full Name" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Password" required />
                <input type="password" placeholder="Confirm Password" required />


                <?= view('components/buttons/button_primary', ['label' => 'Sign Up']) ?>
            </form>

            <div class="extra-links">
                Already have an account?
                <?= view('components/buttons/button_link', ['label' => 'Login', 'href' => '/login']) ?>
            </div>
        </div>
    </main>


    <?= view('components/footer') ?>
</body>

</html>