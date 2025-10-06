<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => 'Login']) ?>

<body class="login-bg">
    <!-- Header -->
    <?= view('components/header') ?>

    <main class="centered">
        <div class="login-box">
            <h2>Login</h2>

            <form>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>

                <!-- Primary Button -->
                <?= view('components/buttons/button_primary', ['label' => 'Login']) ?>
            </form>

            <div class="extra-links">
                <!-- Link Buttons -->
                <?= view('components/buttons/button_link', ['label' => 'Sign Up', 'href' => '/signup']) ?>
                <?= view('components/buttons/button_link', ['label' => 'Forgot Password?', 'href' => '/']) ?>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>