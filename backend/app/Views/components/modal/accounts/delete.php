<?php
// Component: components/modal/accounts/delete.php
// Data contract:
// $account: object|array with id, name, and email
?>

<!-- Delete Button -->
<button type="button"
    <?= isset($account->id) ? 'data-delete-account-id="' . esc($account->id) . '"' : '' ?>
    <?= isset($account->name) ? 'data-delete-account-name="' . esc($account->name) . '"' : '' ?>
    <?= isset($account->email) ? 'data-delete-account-email="' . esc($account->email) . '"' : '' ?>
    class="inline-flex justify-center items-center bg-red-500 hover:bg-red-600 shadow px-3 py-2 rounded-lg text-white transition duration-200 js-delete-account-trigger"
    title="Delete Account">
    <i class="fa-solid fa-trash"></i>
</button>

<!-- Delete Modal -->
<div class="hidden z-50 fixed inset-0 flex justify-center items-center delete-account-modal">
    <!-- backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm delete-account-backdrop"></div>

    <!-- modal box -->
    <div class="relative bg-white shadow-xl rounded-2xl w-full max-w-lg max-h-[90vh] overflow-auto animate-fade-in">
        <header class="flex justify-between items-center bg-red-500/10 px-6 py-4 border-b">
            <h3 id="deleteAccountTitle" class="font-semibold text-slate-800 text-lg">
                Delete Account
            </h3>
            <button type="button"
                class="text-slate-500 hover:text-slate-700 transition btn-cancel-delete-account">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <form class="space-y-5 px-6 py-5 delete-account-form" method="POST" action="/admin/accounts/delete">
            <?= csrf_field() ?>
            <input type="hidden" name="id" class="delete-account-id" value="<?= esc($account->id ?? '') ?>" />

            <p class="text-gray-600 text-sm">
                You are about to permanently delete the following account.
                <strong>This action cannot be undone.</strong>
            </p>

            <div class="bg-gray-50 p-4 border rounded-lg">
                <div class="mb-1 font-medium text-gray-800 text-sm">Account</div>
                <div class="font-semibold text-gray-900 text-base delete-account-name">
                    <?= esc($account->name ?? '—') ?>
                </div>
                <div class="text-gray-700 text-sm delete-account-email">
                    <?= esc($account->email ?? '') ?>
                </div>
            </div>

            <footer class="flex justify-end gap-2 pt-4 border-t">
                <button type="button"
                    class="hover:bg-gray-100 px-4 py-2 border rounded-lg text-gray-700 transition btn-cancel-delete-account">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 shadow px-4 py-2 rounded-lg text-white transition">
                    Delete
                </button>
            </footer>
        </form>
    </div>
</div>

<script>
    (function() {
        if (window.__deleteAccountModalInit) return;
        window.__deleteAccountModalInit = true;

        document.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-delete-account-id], .js-delete-account-trigger');
            if (!trigger) return;
            e.preventDefault();

            const id = trigger.getAttribute('data-delete-account-id');
            const name = trigger.getAttribute('data-delete-account-name') || '—';
            const email = trigger.getAttribute('data-delete-account-email') || '';

            const container = trigger.closest('td') || trigger.closest('tr') || document;
            const modal = container.querySelector('.delete-account-modal');
            if (!modal) return;

            const inputId = modal.querySelector('.delete-account-id');
            const nameEl = modal.querySelector('.delete-account-name');
            const emailEl = modal.querySelector('.delete-account-email');
            const backdrop = modal.querySelector('.delete-account-backdrop');
            const btnCancel = modal.querySelector('.btn-cancel-delete-account');
            const form = modal.querySelector('.delete-account-form');

            document.body.style.overflow = 'hidden';
            if (inputId) inputId.value = id || '';
            if (nameEl) nameEl.textContent = name.trim();
            if (emailEl) emailEl.textContent = email;
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            function closeModal() {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
                if (inputId) inputId.value = '';
                if (nameEl) nameEl.textContent = '—';
                if (emailEl) emailEl.textContent = '';
            }

            if (backdrop) backdrop.onclick = closeModal;
            if (btnCancel) btnCancel.onclick = closeModal;

            form.onsubmit = async function(ev) {
                ev.preventDefault();
                const fd = new FormData(form);
                if (inputId && inputId.value) fd.set('id', inputId.value);

                const toast = showToast('Deleting account...', 'info');
                try {
                    const resp = await fetch(form.action, {
                        method: 'POST',
                        body: fd
                    });
                    const data = await resp.json().catch(() => null);
                    if (resp.ok && data?.success) {
                        showToast(data.message || 'Account deleted', 'success');
                        setTimeout(() => location.reload(), 700);
                    } else {
                        showToast(data?.message || 'Delete failed', 'error');
                    }
                } catch {
                    showToast('Network or server error', 'error');
                } finally {
                    toast.remove();
                    closeModal();
                }
            };
        });

        function showToast(message, type = 'info') {
            const el = document.createElement('div');
            el.className =
                'fixed top-5 right-5 z-[1000] px-4 py-2 rounded-lg shadow-lg text-white text-sm animate-fade-in';
            el.style.background =
                type === 'error' ? '#dc2626' :
                type === 'success' ? '#16a34a' :
                '#334155';
            el.textContent = message;
            document.body.appendChild(el);
            setTimeout(() => el.remove(), 3000);
            return el;
        }
    })();
</script>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: scale(0.97);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in {
        animation: fade-in .25s ease;
    }
</style>