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

        /* style for dashboard admin */
        /* === ADMIN DASHBOARD SPECIFIC STYLES === */
        body.admin-body {
            background-color: #4c4c4cff;
            /* light neutral gray for contrast */
            color: #ffffffff;
            /* dark slate text for admin readability */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-body main {
            flex: 1;
            display: flex;
            gap: 2rem;
            padding: 2.5rem;
            background-color: #4c4c4cff;
            /* same gray tone for seamless background */
        }

        .admin-sidebar {
            width: 16rem;
            background: linear-gradient(180deg, #f3f4f6 0%, #e5e7eb 100%);
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 1.25rem;
        }

        .admin-content {
            flex: 1;
            background: #f9fafb;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }

        .admin-sidebar h4,
        .admin-sidebar h5 {
            color: #1f2937;
        }

        .admin-nav a {
            display: block;
            padding: 0.6rem 1rem;
            margin-bottom: 0.25rem;
            border-radius: 0.5rem;
            text-decoration: none;
            color: #ffffffff;
            transition: background-color 0.2s, color 0.2s;
        }

        .admin-nav a.active {
            background-color: #ef4444;
            /* RetroSale red accent */
            color: #fff;
            font-weight: 600;
        }

        .admin-nav a:hover:not(.active) {
            background-color: #d1d5db;
        }

        /* Optional slight blur/glow feel for admin cards */
        .admin-panel {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;

            /* === SERVICES ADMIN PAGE === */
            body.services-body {
                background:
                    linear-gradient(rgba(76, 76, 76, 0.85), rgba(76, 76, 76, 0.85)),
                    url('https://images.unsplash.com/photo-1605902711622-cfb43c4437b5?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                color: #f9fafb;
            }

            .services-body main {
                background-color: rgba(31, 41, 55, 0.85);
                border-radius: 0.75rem;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            }

            .services-body h2 {
                color: #f3f4f6;
                border-bottom: 2px solid #ef4444;
                display: inline-block;
                padding-bottom: 0.25rem;
            }

            /* Stats cards layout tweaks */
            #serviceStats .card-stat {
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(8px);
                border-radius: 0.75rem;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            #serviceStats .card-stat:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.4);
            }

            /* Buttons */
            .btn-border {
                border: 1px solid #f87171;
                background-color: transparent;
                color: #f87171;
            }

            .btn-border:hover {
                background-color: #ef4444;
                color: #fff;
            }

            /* Table styling (services list) */
            table.services-table {
                width: 100%;
                border-collapse: collapse;
                background: rgba(255, 255, 255, 0.1);
                color: #f3f4f6;
                border-radius: 8px;
                overflow: hidden;
            }

            table.services-table th,
            table.services-table td {
                padding: 0.75rem 1rem;
                text-align: left;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            table.services-table th {
                background: rgba(255, 255, 255, 0.15);
                font-weight: 600;
                color: #ffffff;
            }

            table.services-table tr:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            /* Modal overlay for create/edit service */
            .modal-overlay {
                background: rgba(0, 0, 0, 0.7);
                position: fixed;
                inset: 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .modal-box {
                background: rgba(31, 41, 55, 0.95);
                padding: 2rem;
                border-radius: 0.75rem;
                width: 90%;
                max-width: 480px;
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.5);
            }

            .modal-box h3 {
                margin-bottom: 1rem;
                font-size: 1.25rem;
                color: #f3f4f6;
                border-bottom: 2px solid #ef4444;
                padding-bottom: 0.25rem;
            }

            .modal-box input,
            .modal-box textarea {
                width: 100%;
                background: rgba(255, 255, 255, 0.1);
                border: none;
                border-radius: 0.5rem;
                color: #fff;
                padding: 0.75rem;
                margin-bottom: 1rem;
            }

            .modal-box input:focus,
            .modal-box textarea:focus {
                background: rgba(255, 255, 255, 0.15);
                outline: 2px solid #ef4444;
            }

            /* === Admin Accounts Page Styling === */
            body.admin-accounts-body {
                background-color: #f9fafb;
                font-family: 'Inter', sans-serif;
                color: #1f2937;
            }

            .admin-accounts-body h2 {
                color: #1e293b;
                letter-spacing: -0.02em;
            }

            #accountStats .card-stat {
                background: linear-gradient(to bottom right, #ffffff, #f3f4f6);
                border: 1px solid #e5e7eb;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            #accountStats .card-stat:hover {
                transform: translateY(-3px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .admin-accounts-body table {
                width: 100%;
                border-collapse: collapse;
                background-color: #fff;
                border-radius: 0.75rem;
                overflow: hidden;
            }

            .admin-accounts-body table thead {
                background-color: #f3f4f6;
                text-transform: uppercase;
                font-size: 0.75rem;
                color: #6b7280;
            }

            .admin-accounts-body table tbody tr:hover {
                background-color: #f9fafb;
            }

            .admin-accounts-body table td,
            .admin-accounts-body table th {
                padding: 0.75rem 1rem;
                text-align: left;
                border-bottom: 1px solid #e5e7eb;
            }

            .admin-accounts-body .btn-create {
                background-color: #2563eb;
                color: #fff;
                font-weight: 500;
                padding: 0.5rem 1.25rem;
                border-radius: 0.5rem;
                transition: background-color 0.2s ease;
            }

            .admin-accounts-body .btn-create:hover {
                background-color: #1d4ed8;
            }

            /* === Accounts Table Enhancements === */
            .accounts-table th {
                font-weight: 600;
                color: #475569;
            }

            .accounts-table td {
                font-size: 0.875rem;
            }

            .accounts-table tr:hover td {
                background-color: #f9fafb;
            }

            .accounts-table img {
                transition: transform 0.2s ease;
            }

            .accounts-table img:hover {
                transform: scale(1.05);
            }

            .btn-sage {
                background-color: #22c55e;
                color: white;
            }

            .btn-sage:hover {
                background-color: #16a34a;
            }
    </style>
</head>