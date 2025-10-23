<section style="position:relative;
                text-align:center;
                padding:6rem 1.5rem;
                background-image:url('https://images.unsplash.com/photo-1513599898445-1c34777500ab?q=80&w=1167&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
                background-size:cover;
                background-position:center;
                background-repeat:no-repeat;">

    <!-- Dark overlay for readability -->
    <div style="position:absolute;top:0;left:0;width:100%;height:100%;
                background-color:rgba(39, 39, 39, 0.7);"></div>

    <!-- Content -->
    <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;">
        <h2 style="font-size:2.5rem;font-weight:800;margin-bottom:1rem;color:#f9fafb;">
            Enjoy the rich history of gadgets and gaming!
        </h2>
        <p style="font-size:1.125rem;color:#e5e7eb;max-width:600px;margin:0 auto 2rem;">
            RetroSale offers old school video games ranging from PS1, PS2, Wii, DS, and 3DS,
            letting you relive classics and explore the history of gaming!
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <?= view('components/buttons/button_primary', ['label' => 'Get Started', 'href' => '/login']) ?>
        </div>
    </div>
</section>