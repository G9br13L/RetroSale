<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Board</title>
    <style>
        /* Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #111;

            /* Background image with overlay */
            background:
                linear-gradient(rgba(128, 128, 128, 0.5), rgba(128, 128, 128, 0.5)),
                url('https://images.unsplash.com/photo-1593693846848-45d4c34303ca?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }


        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        h2 {
            margin-bottom: 0.5rem;
        }

        h3 {
            margin: 1.5rem 0 1rem;
            font-size: 1.1rem;
        }

        section {
            margin-bottom: 2rem;
        }

        /* --- Color System --- */
        .palette {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .palette-col {
            flex: 1;
        }

        .swatches {
            display: flex;
            gap: 0.4rem;
            margin-bottom: 0.5rem;
        }

        .color {
            width: 50px;
            height: 35px;
            border-radius: 4px;
        }

        .hex {
            font-size: 0.85rem;
            color: #6b7280;
        }

        /* --- Typography --- */
        .typography {
            display: flex;
            gap: 2rem;
        }

        .heading-font {
            font-weight: bold;
        }

        .body-font {
            font-size: 0.95rem;
        }

        /* --- Buttons --- */
        .btn {
            padding: 0.4rem 1rem;
            margin-right: 0.5rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn.primary {
            background: #dc2626;
            color: #fff;
        }

        .btn.primary:hover {
            background: #b91c1c;
        }

        .btn.secondary {
            background: #6b7280;
            color: #fff;
        }

        .btn.secondary:hover {
            background: #4b5563;
        }

        .btn.border {
            background: transparent;
            border: 1px solid #374151;
            color: #374151;
        }

        .btn.disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }

        /* --- Dark Mode Section --- */
        .dark-mode {
            background: #111827;
            padding: 1rem;
            border-radius: 8px;
        }

        .dark-mode .btn.border {
            border: 1px solid #f9fafb;
            color: #f9fafb;
        }

        /* --- Card --- */
        .card {
            width: 220px;
            padding: 1rem;
            border-radius: 6px;
            background: #1f2937;
            color: #f9fafb;
        }

        .card h4 {
            margin-top: 0;
        }

        /* --- Logos --- */
        .logos {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .circle-logo,
        .square-logo {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
        }

        .circle-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #dc2626;
        }

        .square-logo {
            width: 70px;
            height: 70px;
            background: #111827;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?= view('components/header') ?>

    <main>
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
                        <div class="color" style="background:#111827;"></div>
                        <div class="color" style="background:#1f2937;"></div>
                        <div class="color" style="background:#272e3b;"></div>
                    </div>
                    <p>Dark Background</p>
                    <p class="hex">#111827 — #1f2937 — #272e3b</p>
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