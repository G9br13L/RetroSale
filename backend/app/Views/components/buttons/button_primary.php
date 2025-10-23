<?php if ($disable ?? false): ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="opacity:0.5;pointer-events:none;background-color:#d20000ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;">
        <?= htmlspecialchars($label ?? 'Secondary') ?>
    </a>
<?php else: ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="background-color:#d20000ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;transition:background-color 0.3s;"
        onmouseover="this.style.backgroundColor='#a90000ff';"
        onmouseout="this.style.backgroundColor='#d20000ff';">
        <?= htmlspecialchars($label ?? 'Secondary') ?>
    </a>
<?php endif; ?>