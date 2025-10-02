<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroSale: Games and Consoles</title>
</head>

<body style="margin:0;padding:0;
             background-image:url('https://plus.unsplash.com/premium_photo-1687854992749-e15cba89631d?q=80&w=627&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
             background-size:cover;
             background-position:center;
             background-repeat:no-repeat;
             font-family:Arial, sans-serif;
             color:#f9fafb;">

    <!-- Header -->
    <?= view('components/header') ?>

    <!-- Overlay container -->
    <main style="background-color:rgba(59, 60, 60, 0.9);min-height:100vh;">

        <!-- Call To Action (CTA) -->
        <?= view('components/cta') ?>

        <section style="padding:1rem 2.5rem;">
            <h2 style="font-size:2rem; font-weight:700; text-align:center; margin-bottom:2rem;">
                Featured Products
            </h2>

            <div class="gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mx-auto max-w-6xl">
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
                    'excerpt' => 'Step back into the era of old cameras.',
                    'image' => 'https://images.unsplash.com/photo-1711289163428-75e546d9ffa8?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                ]) ?>
            </div>
            </div>
        </section>


    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>