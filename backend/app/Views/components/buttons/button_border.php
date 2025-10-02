<?php if ($disable ?? false): ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="opacity:0.5;pointer-events:none;border:1px solid #3d3d3dff;color:#2563eb;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;">
        <?= htmlspecialchars($label ?? 'Action') ?>
    </a>
<?php else: ?>
    <a href="<?= htmlspecialchars($href ?? '#') ?>"
        style="border:1px solid #686868ff;color:#686868ff;padding:0.75rem 1.5rem;border-radius:0.5rem;text-decoration:none;display:inline-block;transition:all 0.3s;"
        onmouseover="this.style.backgroundColor='#8b8b8bff';this.style.color='white';"
        onmouseout="this.style.backgroundColor='transparent';this.style.color='#5c5c5cff';">
        <?= htmlspecialchars($label ?? 'Secondary') ?>
    </a>
<?php endif; ?>