<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => 'Login']) ?>

<body class="login-bg">
    <!-- Header -->
    <?= view('components/header') ?>

    <?php
    // 🔹 Data catchers for validation and old input
    $errors = $errors ?? [];
    $old = $old ?? [];
    ?>

    <main class="centered">
        <div class="login-box">
            <h2>Login</h2>

            <!-- ✅ Updated Form -->
            <form class="space-y-6 mt-8" action="/login" method="post" novalidate>
                <?= csrf_field() ?> <!-- 🔒 CSRF protection -->

                <!-- Email -->
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email"
                    autocomplete="email"
                    required
                    value="<?= esc($old['email'] ?? '') ?>"
                    aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>"
                    aria-describedby="email-error">
                <?php if (! empty($errors['email'])): ?>
                    <p id="email-error" class="mt-2 text-red-600 text-sm"><?= esc($errors['email']) ?></p>
                <?php endif; ?>

                <!-- Password -->
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    required
                    aria-invalid="<?= isset($errors['password']) ? 'true' : 'false' ?>"
                    aria-describedby="password-error">
                <?php if (! empty($errors['password'])): ?>
                    <p id="password-error" class="mt-2 text-red-600 text-sm"><?= esc($errors['password']) ?></p>
                <?php endif; ?>

                <!-- Primary Button -->
                <button type="submit"
                    style="background-color:#d20000ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;transition:background-color 0.3s;cursor:pointer;border:none;"
                    onmouseover="this.style.backgroundColor='#a90000ff';"
                    onmouseout="this.style.backgroundColor='#d20000ff';">
                    Login
                </button>


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