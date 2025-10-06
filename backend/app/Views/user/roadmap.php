<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road Map</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #f9fafb;

            /* Background image with dark gray overlay */
            background:
                linear-gradient(rgba(55, 65, 81, 0.7), rgba(55, 65, 81, 0.7)),
                url('https://images.unsplash.com/photo-1616094399519-bfea34e3785f?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDJ8fHxlbnwwfHx8fHw%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        main {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(31, 41, 55, 0.85);
            /* dark translucent box */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #f9fafb;
            border-bottom: 2px solid #4b5563;
            padding-bottom: 0.25rem;
        }

        section {
            margin-bottom: 2rem;
        }

        /* Roadmap Cards */
        .roadmap {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .card {
            background: #1f2937;
            /* dark gray */
            border: 1px solid #374151;
            border-radius: 8px;
            padding: 1rem 1.25rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: #f3f4f6;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.8);
        }

        .card h3 {
            margin: 0;
            font-size: 1.1rem;
            color: #ffffff;
        }

        .card p {
            margin: 0.5rem 0 0.75rem;
            font-size: 0.9rem;
            color: #d1d5db;
        }

        /* Status Badges */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            border-radius: 9999px;
            font-weight: bold;
        }

        .done {
            background: #065f46;
            color: #d1fae5;
        }

        .backlog {
            background: #92400e;
            color: #fef3c7;
        }

        .notdone {
            background: #991b1b;
            color: #fee2e2;
        }

        /* Date Label */
        .date {
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

<body>
    <!-- Header -->
    <?= view('components/header') ?>

    <main>
        <h2>Completed</h2>
        <div class="roadmap">

            <div class="card">
                <h3>Fragmentation</h3>
                <p>Broke down header and footer into reusable components for consistent layout.</p>
                <span class="date">Oct 1, 2025</span>
                <span class="badge done">Done</span>
            </div>

            <div class="card">
                <h3>Setup Environment</h3>
                <p>Prepare project files, configure environment, and initialize version control.</p>
                <span class="date">Sept 15, 2025</span>
                <span class="badge done">Done</span>
            </div>

            <div class="card">
                <h3>Landing Page</h3>
                <p>Design and build the main landing page for the project.</p>
                <span class="date">Sept 15, 2025</span>
                <span class="badge done">Done</span>
            </div>

            <div class="card">
                <h3>Login & Sign Up</h3>
                <p>Create authentication pages for users.</p>
                <span class="date">Sept 24, 2025</span>
                <span class="badge done">Done</span>
            </div>

            <div class="card">
                <h3>Mood Board</h3>
                <p>Showcase project colors, typography, buttons, cards, and logos.</p>
                <span class="date">Sept 24, 2025</span>
                <span class="badge done">Done</span>
            </div>

            <div class="card">
                <h3>Roadmap Page</h3>
                <p>Outline the development flow with milestones.</p>
                <span class="date">Sept 24, 2025</span>
                <span class="badge done">Done</span>
            </div>
        </div>

        <h2>Backlog</h2>
        <div class="roadmap">

            <div class="card">
                <h3>CRUD Functionalities</h3>
                <p>Implement at least 3 features with create, read, update, delete:</p>
                <ul style="margin:0.5rem 0 0 1.25rem; font-size:0.9rem; color:#d1d5db;">
                    <li>User Accounts (Sign up, profile, delete)</li>
                    <li>Product Catalog (Add, edit, remove items)</li>
                    <li>Wishlist (Add/remove favorites)</li>
                </ul>
                <span class="badge backlog">Backlog</span>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>