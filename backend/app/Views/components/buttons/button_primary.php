<?php if ($disable ?? false): ?>
    <button
        type="submit"
        disabled
        style="opacity:0.5;cursor:not-allowed;background-color:#d20000ff;color:white;
               padding:0.75rem 1.5rem;border:none;border-radius:0.5rem;
               font-weight:bold;transition:background-color 0.3s;">
        <?= htmlspecialchars($label ?? 'Primary') ?>
    </button>
<?php else: ?>
    <button
        type="submit"
        style="background-color:#d20000ff;color:white;padding:0.75rem 1.5rem;
               border:none;border-radius:0.5rem;font-weight:bold;
               transition:background-color 0.3s;cursor:pointer;"
        onmouseover="this.style.backgroundColor='#a90000ff';"
        onmouseout="this.style.backgroundColor='#d20000ff';">
        <?= htmlspecialchars($label ?? 'Primary') ?>
    </button>
<?php endif; ?>