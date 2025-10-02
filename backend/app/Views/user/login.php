<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSale - Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://images.unsplash.com/photo-1623910270913-3e0294a1c765?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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

        .login-box {
            background: rgba(255, 255, 255, 0.06);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 360px;
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
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?= view('components/header') ?>

    <main>
        <div class="login-box">
            <h2>Login</h2>
            <form>
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Password" required />

                <!-- Primary Button -->
                <?= view('components/buttons/button_primary', ['label' => 'Login']) ?>
            </form>

            <div class="extra-links">
                <!-- Link Buttons -->
                <?= view('components/buttons/button_link', ['label' => 'Sign Up', 'href' => '/signup']) ?>
                <?= view('components/buttons/button_link', ['label' => 'Forgot Password?', 'href' => '#']) ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>