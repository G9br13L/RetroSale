<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => 'Sign Up']) ?>

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
            <h2>Create an Account</h2>

            <!-- ✅ Signup Form -->
            <form class="space-y-6 mt-8" action="/signup" method="post" novalidate>
                <?= csrf_field() ?> <!-- 🔒 CSRF protection -->

                <!-- First Name -->
                <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    placeholder="First Name"
                    required
                    value="<?= esc($old['first_name'] ?? '') ?>"
                    aria-invalid="<?= isset($errors['first_name']) ? 'true' : 'false' ?>">
                <?php if (! empty($errors['first_name'])): ?>
                    <p class="mt-2 text-red-600 text-sm"><?= esc($errors['first_name']) ?></p>
                <?php endif; ?>

                <!-- Middle Name -->
                <input
                    id="middle_name"
                    name="middle_name"
                    type="text"
                    placeholder="Middle Name (optional)"
                    value="<?= esc($old['middle_name'] ?? '') ?>">

                <!-- Last Name -->
                <input
                    id="last_name"
                    name="last_name"
                    type="text"
                    placeholder="Last Name"
                    required
                    value="<?= esc($old['last_name'] ?? '') ?>"
                    aria-invalid="<?= isset($errors['last_name']) ? 'true' : 'false' ?>">
                <?php if (! empty($errors['last_name'])): ?>
                    <p class="mt-2 text-red-600 text-sm"><?= esc($errors['last_name']) ?></p>
                <?php endif; ?>

                <!-- Email -->
                <input
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Email"
                    autocomplete="email"
                    required
                    value="<?= esc($old['email'] ?? '') ?>"
                    aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>">
                <?php if (! empty($errors['email'])): ?>
                    <p class="mt-2 text-red-600 text-sm"><?= esc($errors['email']) ?></p>
                <?php endif; ?>

                <!-- Password -->
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    required
                    aria-invalid="<?= isset($errors['password']) ? 'true' : 'false' ?>">
                <?php if (! empty($errors['password'])): ?>
                    <p class="mt-2 text-red-600 text-sm"><?= esc($errors['password']) ?></p>
                <?php endif; ?>

                <!-- Confirm Password -->
                <input
                    id="password_confirm"
                    name="password_confirm"
                    type="password"
                    placeholder="Confirm Password"
                    required
                    aria-invalid="<?= isset($errors['password_confirm']) ? 'true' : 'false' ?>">
                <?php if (! empty($errors['password_confirm'])): ?>
                    <p class="mt-2 text-red-600 text-sm"><?= esc($errors['password_confirm']) ?></p>
                <?php endif; ?>

                <!-- Primary Inline Button -->
                <button type="submit"
                    style="background-color:#d20000ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;transition:background-color 0.3s;cursor:pointer;border:none;"
                    onmouseover="this.style.backgroundColor='#a90000ff';"
                    onmouseout="this.style.backgroundColor='#d20000ff';">
                    Sign Up
                </button>
            </form>

            <!-- Link to Login -->
            <div class="extra-links" style="margin-top:1rem;">
                <a href="/login"
                    style="color:#d20000ff;text-decoration:none;transition:color 0.3s;"
                    onmouseover="this.style.color='#a90000ff';"
                    onmouseout="this.style.color='#d20000ff';">
                    Already have an account? Log in
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>