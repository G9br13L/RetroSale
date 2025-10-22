<?php
// Component: components/head.php
// Data contract:
// $heading: string
// $sub: string|null
// $primary: object
// $secondary: object
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= esc($title ?? null ? $title . ": " : "") ?>RetroSale</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* === Global RetroSale Theme (Universal Base) === */
        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #f9fafb;
        }

        /* === Base main layout used globally === */
        main {
            background-color: rgba(59, 60, 60, 0.9);
            min-height: 100vh;
        }

        /* === Headings === */
        h2 {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

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
        }
    </style>
</head>