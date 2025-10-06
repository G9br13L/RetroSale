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

        /* === Signup Page Styles === */
        body.signup-bg {
            background-image: url('https://images.unsplash.com/photo-1625805866449-3589fe3f71a3?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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

        .signup-box h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
        }

        .signup-box input {
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

        .signup-box input:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 2px #3b82f6;
        }

        .signup-box input::placeholder {
            color: #d1d5db;
        }

        .signup-box .extra-links {
            margin-top: 1.5rem;
            text-align: center;
        }

        .signup-box .extra-links a {
            font-size: 0.9rem;
            color: #93c5fd;
            text-decoration: none;
            transition: color 0.2s;
        }

        .signup-box .extra-links a:hover {
            color: #60a5fa;
            text-decoration: underline;
        }

        /* === Mood Board Styles === */

        /* Background (only for moodboard.php) */
        body.moodboard-bg {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #111;
            background:
                linear-gradient(rgba(128, 128, 128, 0.5), rgba(128, 128, 128, 0.5)),
                url('https://images.unsplash.com/photo-1593693846848-45d4c34303ca?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* === Moodboard Override === */
        main.moodboard {
            background: transparent !important;
            min-height: 100vh;
        }


        main.moodboard h2 {
            margin-bottom: 0.5rem;
        }

        main.moodboard h3 {
            margin: 1.5rem 0 1rem;
            font-size: 1.1rem;
        }

        main.moodboard section {
            margin-bottom: 2rem;
        }

        /* Color Palette */
        .palette {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .palette-col {
            flex: 1;
        }

        .swatches {
            display: flex;
            gap: 0.4rem;
            margin-bottom: 0.5rem;
        }

        .color {
            width: 50px;
            height: 35px;
            border-radius: 4px;
        }

        .hex {
            font-size: 0.85rem;
            color: #6b7280;
        }

        /* Typography */
        .typography {
            display: flex;
            gap: 2rem;
        }

        .heading-font {
            font-weight: bold;
        }

        .body-font {
            font-size: 0.95rem;
        }

        /* Buttons */
        .btn {
            padding: 0.4rem 1rem;
            margin-right: 0.5rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn.primary {
            background: #dc2626;
            color: #fff;
        }

        .btn.primary:hover {
            background: #b91c1c;
        }

        .btn.secondary {
            background: #6b7280;
            color: #fff;
        }

        .btn.secondary:hover {
            background: #4b5563;
        }

        .btn.border {
            background: transparent;
            border: 1px solid #374151;
            color: #374151;
        }

        .btn.disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        /* Dark Mode Sample */
        .dark-mode {
            background: #232324ff;
            padding: 1rem;
            border-radius: 8px;
        }

        .dark-mode .btn.border {
            border: 1px solid #f9fafb;
            color: #f9fafb;
        }

        /* Card */
        .card {
            width: 220px;
            padding: 1rem;
            border-radius: 6px;
            background: #1f2937;
            color: #f9fafb;
        }

        .card h4 {
            margin-top: 0;
        }

        /* Logos */
        .logos {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .circle-logo,
        .square-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
        }

        .circle-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #dc2626;
        }

        .square-logo {
            width: 70px;
            height: 70px;
            background: #111827;
        }

        /* === Roadmap Page Styles === */
        /* === Roadmap Page Specific Fixes === */
        body.roadmap-bg {
            background:
                linear-gradient(rgba(55, 65, 81, 0.7), rgba(55, 65, 81, 0.7)),
                url('https://images.unsplash.com/photo-1616094399519-bfea34e3785f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        main.roadmap {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(31, 41, 55, 0.85);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        main.roadmap h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #f9fafb;
            border-bottom: 2px solid #4b5563;
            padding-bottom: 0.25rem;
        }

        main.roadmap section {
            margin-bottom: 2rem;
        }

        .roadmap {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Override moodboard card style for roadmap */
        .roadmap .card {
            width: 100%;
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: #f3f4f6;
        }

        .roadmap .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.8);
        }

        .roadmap .card h3 {
            margin: 0;
            font-size: 1.1rem;
            color: #ffffff;
        }

        .roadmap .card p {
            margin: 0.5rem 0 0.75rem;
            font-size: 0.9rem;
            color: #d1d5db;
        }

        .roadmap .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            border-radius: 9999px;
            font-weight: bold;
        }

        .roadmap .done {
            background: #065f46;
            color: #d1fae5;
        }

        .roadmap .backlog {
            background: #92400e;
            color: #fef3c7;
        }

        .roadmap .notdone {
            background: #991b1b;
            color: #fee2e2;
        }

        .roadmap .date {
            font-size: 0.75rem;
            background: #374151;
            color: #e5e7eb;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
            margin-top: 0.5rem;
            display: inline-block;
        }
    </style>
</head>