<?php if ($disable ?? false): ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="opacity:0.5;pointer-events:none;background-color:#686868ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;">
        <?= htmlspecialchars($label ?? 'Action') ?>
    </a>
<?php else: ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="background-color:#686868ff;color:white;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;transition:background-color 0.3s;"
        onmouseover="this.style.backgroundColor='#3a3a3aff';"
        onmouseout="this.style.backgroundColor='#686868ff';">
        <?= htmlspecialchars($label ?? 'Action') ?>
    </a>
<?php endif; ?>