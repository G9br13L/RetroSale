<header style="background-color:#1c1c1c; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center; position:relative; z-index:10; margin:0;">
    <h1 style="font-size:1.5rem; font-weight:bold; color:#f9fafb; margin:0;">RetroSale</h1>

    <div style="display:flex; gap:0.75rem;">
        <?= view('components/buttons/button_border', ['label' => 'Login', 'href' => '/login']) ?>
        <?= view('components/buttons/button_secondary', ['label' => 'Sign Up', 'href' => '/signup']) ?>
    </div>
</header>