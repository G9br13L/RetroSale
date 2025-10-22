<!DOCTYPE html>
<html lang="en">
<?= view('components/head', ['title' => 'Road Map']) ?>

<body class="roadmap-bg">
    <?= view('components/header') ?>

    <main class="roadmap">
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

    <?= view('components/footer') ?>
</body>

</html>