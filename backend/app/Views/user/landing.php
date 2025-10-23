<!DOCTYPE html>
<html lang="en">

<?= view('components/head', ['title' => 'Games and Consoles']) ?>

<body class="landing-bg">

    <!-- Header -->
    <?= view('components/header') ?>

    <main>
        <!-- Call To Action (CTA) -->
        <?= view('components/cta') ?>

        <section class="featured-section">
            <h2>Featured Products</h2>

            <div class="product-grid">
                <?= view('components/cards/card', [
                    'title' => 'PlayStation',
                    'excerpt' => 'Relive the golden age of 3D gaming with legendary PS consoles.',
                    'image' => 'https://images.unsplash.com/photo-1591196702597-062a87208fed?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Nintendo',
                    'excerpt' => 'Experience portable nostalgia with the iconic handheld console.',
                    'image' => 'https://images.unsplash.com/photo-1715279239396-51e741734462?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Digicam',
                    'excerpt' => 'Step back into the era of old cameras and capture new moments!',
                    'image' => 'https://images.unsplash.com/photo-1711289163428-75e546d9ffa8?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]) ?>

                <?= view('components/cards/card', [
                    'title' => 'Music Players',
                    'excerpt' => 'Use old music players and take a listen with a fresh feel of nostalgia.',
                    'image' => 'https://images.unsplash.com/photo-1611001716885-b3402558a62b?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]) ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>
</body>

</html>