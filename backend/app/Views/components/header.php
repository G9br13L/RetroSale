<header style="background-color:#1c1c1c; padding:1rem 2rem; display:flex; justify-content:space-between; align-items:center; position:relative; z-index:10; margin:0;">
    <h1 style="font-size:1.5rem; font-weight:bold; color:#f9fafb; margin:0;">RetroSale</h1>

    <div style="display:flex; gap:0.75rem;">
        <?php if (session()->has('user')): ?>
            <!-- Logged-in state -->
            <form action="/logout" method="post" style="margin:0;">
                <?= csrf_field() ?>
                <button type="submit"
                    style="
                        background-color:#d20000ff;
                        color:white;
                        padding:0.5rem 1rem;
                        border:none;
                        border-radius:0.5rem;
                        cursor:pointer;
                        font-weight:500;
                        transition:background-color 0.3s;
                    "
                    onmouseover="this.style.backgroundColor='#a90000ff';"
                    onmouseout="this.style.backgroundColor='#d20000ff';">
                    Logout
                </button>
            </form>
        <?php else: ?>
            <!-- Guest state -->
            <?= view('components/buttons/button_border', ['label' => 'Login', 'href' => '/login']) ?>
            <?= view('components/buttons/button_secondary', ['label' => 'Sign Up', 'href' => '/signup']) ?>
        <?php endif; ?>
    </div>
</header>