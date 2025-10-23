<!DOCTYPE html>
<html lang="en">

<!-- Head Component -->
<?= view('components/head', ['title' => 'Mood Board']) ?>

<body class="moodboard-bg">

    <!-- Header -->
    <?= view('components/header') ?>

    <main class="moodboard">
        <h2>Mood board</h2>
        <p>Visual identity samples for RetroSale (retro gaming marketplace)</p>

        <!-- Color System -->
        <section>
            <h3>Color system</h3>
            <p>Accent red, muted neutrals, and dark retro backgrounds for depth.</p>
            <div class="palette">
                <div class="palette-col">
                    <div class="swatches">
                        <div class="color" style="background:#b91c1c;"></div>
                        <div class="color" style="background:#dc2626;"></div>
                        <div class="color" style="background:#f87171;"></div>
                    </div>
                    <p>Main Accent Red</p>
                    <p class="hex">#b91c1c — #dc2626 — #f87171</p>
                </div>

                <div class="palette-col">
                    <div class="swatches">
                        <div class="color" style="background:#374151;"></div>
                        <div class="color" style="background:#4b5563;"></div>
                        <div class="color" style="background:#6b7280;"></div>
                    </div>
                    <p>Neutral Gray</p>
                    <p class="hex">#374151 — #4b5563 — #6b7280</p>
                </div>

                <div class="palette-col">
                    <div class="swatches">
                        <div class="color" style="background:#232324ff;"></div>
                        <div class="color" style="background:#1f2937;"></div>
                        <div class="color" style="background:#272e3b;"></div>
                    </div>
                    <p>Dark Background</p>
                    <p class="hex">#232324ff — #1f2937 — #272e3b</p>
                </div>
            </div>
        </section>

        <!-- Typography -->
        <section class="typography">
            <div>
                <h3>Typography</h3>
                <p class="heading-font">Heading font — Example Heading</p>
            </div>
            <div>
                <p class="body-font">Body font — Example body text for readability.</p>
            </div>
        </section>

        <!-- Buttons -->
        <section>
            <h3>Buttons</h3>
            <p>Light Mode</p>
            <button class="btn primary">Primary</button>
            <button class="btn secondary">Secondary</button>
            <button class="border btn">Border</button>
            <button class="btn disabled" disabled>Disabled</button>

            <p>Dark Mode</p>
            <div class="dark-mode">
                <button class="btn primary">Primary</button>
                <button class="btn secondary">Secondary</button>
                <button class="border btn">Border</button>
                <button class="btn disabled" disabled>Disabled</button>
            </div>
        </section>

        <!-- Card -->
        <section>
            <h3>Card Sample</h3>
            <div class="card">
                <h4>Retro Game</h4>
                <p>Example product card with title and text.</p>
            </div>
        </section>

        <!-- Logos -->
        <section>
            <h3>Logos</h3>
            <div class="logos">
                <div class="circle-logo">RS</div>
                <div class="square-logo">RS</div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?= view('components/footer') ?>

</body>

</html>