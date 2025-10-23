<!DOCTYPE html>
<html lang="en">

<!-- Head Component -->
<?= view('components/head', ['title' => 'Sign Up']) ?>

<body class="signup-bg">

    <!-- Header -->
    <?= view('components/header') ?>

    <main class="centered">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form>
                <input type="text" placeholder="Full Name" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Password" required />
                <input type="password" placeholder="Confirm Password" required />

                <!-- Primary Button -->
                <?= view('components/buttons/button_primary', ['label' => 'Sign Up']) ?>
            </form>

            <div class="extra-links">
                Already have an account?
                <?= view('components/buttons/button_link', ['label' => 'Login', 'href' => '/login']) ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>