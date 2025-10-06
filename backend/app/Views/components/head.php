<?php
// Component: components/head.php
// $title: optional string
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= esc($title ?? null ? $title . ": " : "") ?>RetroSale</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* === Global RetroSale Theme (used by all pages) === */
        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #f9fafb;
        }

        main {
            background-color: rgba(59, 60, 60, 0.9);
            min-height: 100vh;
        }

        h2 {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* === Landing Page Grid Section === */
        .featured-section {
            padding: 1rem 2.5rem;
        }

        .product-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            max-width: 1400px;
            margin: 0 auto;
        }

        /* === Login Page Styles === */
        body.login-bg {
            background-image: url('https://images.unsplash.com/photo-1623910270913-3e0294a1c765?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        }

        main.centered {
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

        .login-box h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #fff;
        }

        .login-box input {
            width: 100%;
            padding: 0.9rem 1rem;
            margin-bottom: 1.2rem;
            border: none;
            border-radius: 0.6rem;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 1rem;
            outline: none;
            box-sizing: border-box;
        }

        .login-box input:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 2px #3b82f6;
        }

        .login-box input::placeholder {
            color: #d1d5db;
        }

        .extra-links {
            margin-top: 1.5rem;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>