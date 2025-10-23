<?php
// Component: components/modal/accounts/update.php
// Data contract:
// $account: object|array
?>

<!-- Update Account Button -->
<button type="button"
    <?= isset($account->id) ? 'data-update-account-id="' . esc($account->id) . '"' : '' ?>
    <?= isset($account->type) ? 'data-update-account-type="' . esc($account->type) . '"' : '' ?>
    class="inline-flex justify-center items-center bg-amber-500 hover:bg-amber-600 shadow px-3 py-2 rounded-lg text-white transition duration-200 js-update-account-trigger"
    title="Update Account">
    <i class="fa-pen-to-square fa-solid"></i>
</button>

<!-- Update Modal -->
<div class="hidden z-50 fixed inset-0 flex justify-center items-center update-account-modal">
    <!-- Modal backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm update-account-backdrop"></div>

    <!-- Modal container -->
    <div class="relative bg-white shadow-xl rounded-2xl w-full max-w-lg max-h-[90vh] overflow-auto animate-fade-in">
        <header class="flex justify-between items-center bg-amber-500/10 px-6 py-4 border-b">
            <h3 id="updateAccountTitle" class="font-semibold text-slate-800 text-lg">Update Account</h3>
            <button type="button" class="text-slate-500 hover:text-slate-700 transition btn-cancel-update-account">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <div class="space-y-4 px-6 py-5 update-account-content">
            <form class="space-y-5 update-account-form" method="POST" action="/admin/accounts/update">
                <?= csrf_field() ?>
                <input type="hidden" name="id" class="update-account-id" value="<?= esc($account->id ?? '') ?>" />

                <p class="text-gray-600 text-sm">Change the user’s account type below, then click <strong>Update</strong> to save changes.</p>

                <div>
                    <label class="block mb-1 font-medium text-gray-800 text-sm">Account Type</label>
                    <select name="type"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-400 w-full transition update-account-type-input">
                        <?php
                        $types = ['client', 'embalmer', 'driver', 'florist', 'manager', 'staff'];
                        foreach ($types as $typeOption):
                            $selected = (isset($account->type) && $account->type === $typeOption) ? 'selected' : '';
                            echo "<option value='$typeOption' $selected>" . ucfirst($typeOption) . "</option>";
                        endforeach;
                        ?>
                    </select>
                </div>

                <footer class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button"
                        class="hover:bg-gray-100 px-4 py-2 border rounded-lg text-gray-700 transition btn-cancel-update-account">Cancel</button>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 shadow px-4 py-2 rounded-lg text-white transition">Update</button>
                </footer>
            </form>
        </div>
    </div>
</div>

<!-- Modal Script -->
<script>
    (function() {
        if (window.__updateAccountModalInit) return;
        window.__updateAccountModalInit = true;

        document.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-update-account-id], .js-update-account-trigger');
            if (!trigger) return;
            e.preventDefault();

            const id = trigger.getAttribute('data-update-account-id');
            const type = trigger.getAttribute('data-update-account-type') || '';

            const container = trigger.closest('td') || trigger.closest('tr') || document;
            const modal = container.querySelector('.update-account-modal');
            if (!modal) return;

            const inputId = modal.querySelector('.update-account-id');
            const typeInput = modal.querySelector('.update-account-type-input');
            const backdrop = modal.querySelector('.update-account-backdrop');
            const btnClose = modal.querySelector('.btn-cancel-update-account');
            const form = modal.querySelector('.update-account-form');

            document.body.style.overflow = 'hidden';
            if (inputId) inputId.value = id || '';
            if (typeInput) typeInput.value = type || '';
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            function closeModal() {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
                if (inputId) inputId.value = '';
                if (typeInput) typeInput.value = '';
            }

            if (backdrop) backdrop.onclick = closeModal;
            if (btnClose) btnClose.onclick = closeModal;

            form.onsubmit = async function(ev) {
                ev.preventDefault();

                const fd = new FormData(form);
                if (inputId && inputId.value) fd.set('id', inputId.value);

                const toast = showToast('Updating account...', 'info');
                try {
                    const resp = await fetch(form.action, {
                        method: 'POST',
                        body: fd
                    });
                    const data = await resp.json().catch(() => null);
                    if (resp.ok && data?.success) {
                        showToast(data.message || 'Updated successfully', 'success');
                        setTimeout(() => location.reload(), 700);
                    } else {
                        showToast(data?.message || 'Update failed', 'error');
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
    /* === RetroSale Modal Enhancements === */
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