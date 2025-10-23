<?php
// Component: components/modal/inquiries/update.php
// Data contract:
// $requestObj: array | object
// $accountList: array | object
?>

<!-- Trigger Button -->
<div class="flex justify-end mb-2">
    <button type="button"
        class="bg-amber-600/70 hover:bg-amber-600/60 shadow-sm px-3 py-2 rounded-md text-white transition js-update-request-trigger"
        data-request-id="<?= esc($requestObj['id'] ?? '') ?>"
        data-service-id="<?= esc($requestObj['service_id'] ?? '') ?>"
        data-status="<?= esc($requestObj['status'] ?? '') ?>"
        data-first-name="<?= esc($requestObj['first_name'] ?? '') ?>"
        data-last-name="<?= esc($requestObj['last_name'] ?? '') ?>"
        data-date-start="<?= esc($requestObj['date_start'] ?? '') ?>"
        data-date-end="<?= esc($requestObj['date_end'] ?? '') ?>"
        data-phone="<?= esc($requestObj['phone'] ?? '') ?>"
        data-email="<?= esc($requestObj['email'] ?? '') ?>"
        data-additional="<?= esc($requestObj['additional'] ?? '') ?>"
        data-user-id="<?= esc($requestObj['user_id'] ?? '') ?>">
        <i class="fa-pen-to-square fa-solid"></i>
    </button>
</div>

<!-- Modal -->
<div class="hidden z-50 fixed inset-0 flex justify-center items-center update-request-modal">
    <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm update-request-backdrop"></div>

    <div class="relative bg-white opacity-0 shadow-xl rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto scale-95 transition-all transform"
        id="updateRequestModalContent" role="dialog" aria-modal="true" aria-labelledby="updateRequestTitle">

        <header class="flex justify-between items-center px-6 py-4 border-b">
            <h3 id="updateRequestTitle" class="font-semibold text-slate-800 text-lg">Update Inquiry</h3>
            <button type="button" class="text-slate-500 hover:text-slate-700 transition btn-cancel-update-request">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </header>

        <form class="space-y-4 px-6 py-4 update-request-form" method="POST" action="/admin/inquiries/update">
            <?= csrf_field() ?>
            <input type="hidden" name="id">

            <p class="text-gray-600 text-sm">Edit the fields below and click <strong>Update</strong> to save changes.</p>

            <!-- Status -->
            <div>
                <label class="block font-medium text-slate-700 text-sm">Status</label>
                <?php $statuses = ['not open', 'un available', 'called', 'messaged', 'meeting scheduled', 'assigned', 'on going', 'complete']; ?>
                <select name="status" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                    <?php foreach ($statuses as $s): ?>
                        <option value="<?= esc($s) ?>"><?= ucfirst($s) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Service ID -->
            <div>
                <label class="block font-medium text-slate-700 text-sm">Service ID</label>
                <input type="text" name="service_id" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
            </div>

            <!-- Name -->
            <div class="gap-4 grid grid-cols-2">
                <div>
                    <label class="block font-medium text-slate-700 text-sm">First Name</label>
                    <input type="text" name="first_name" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-slate-700 text-sm">Last Name</label>
                    <input type="text" name="last_name" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
            </div>

            <!-- Dates -->
            <div class="gap-4 grid grid-cols-2">
                <div>
                    <label class="block font-medium text-slate-700 text-sm">Start Date</label>
                    <input type="date" name="date_start" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-slate-700 text-sm">End Date</label>
                    <input type="date" name="date_end" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
            </div>

            <!-- Contact -->
            <div class="gap-4 grid grid-cols-2">
                <div>
                    <label class="block font-medium text-slate-700 text-sm">Phone</label>
                    <input type="text" name="phone" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
                <div>
                    <label class="block font-medium text-slate-700 text-sm">Email</label>
                    <input type="email" name="email" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                </div>
            </div>

            <!-- Additional -->
            <div>
                <label class="block font-medium text-slate-700 text-sm">Additional Requests (CSV)</label>
                <input type="text" name="additional" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
            </div>

            <!-- User -->
            <div>
                <label class="block font-medium text-slate-700 text-sm">Assign to User</label>
                <select name="user_id" class="shadow-sm mt-1 px-3 py-2 border border-slate-300 rounded-md focus:ring-2 focus:ring-amber-500 w-full">
                    <option value="">-- Select User --</option>
                    <?php if (!empty($accountList)): ?>
                        <?php foreach ($accountList as $acc): ?>
                            <option value="<?= esc($acc->id) ?>">
                                <?= esc(trim($acc->first_name . ' ' . $acc->last_name)) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <!-- Actions -->
            <footer class="flex justify-end gap-2 pt-4 border-t">
                <?= view('components/buttons/button_secondary', [
                    'label' => 'Cancel',
                    'attributes' => ['type' => 'button', 'class' => 'btn-cancel-update-request']
                ]) ?>

                <?= view('components/buttons/button_primary', [
                    'label' => 'Update',
                    'attributes' => ['type' => 'submit']
                ]) ?>
            </footer>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const triggers = document.querySelectorAll('.js-update-request-trigger');
        const modal = document.querySelector('.update-request-modal');
        const content = document.getElementById('updateRequestModalContent');
        const cancelBtns = modal.querySelectorAll('.btn-cancel-update-request');
        const form = modal.querySelector('.update-request-form');

        function openModal(data) {
            for (const key in data) {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) input.value = data[key] ?? '';
            }
            modal.classList.remove('hidden');
            setTimeout(() => content.classList.remove('scale-95', 'opacity-0'), 10);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 150);
            document.body.style.overflow = '';
        }

        triggers.forEach(btn => {
            btn.addEventListener('click', () => {
                const data = {};
                for (const attr of btn.attributes) {
                    if (attr.name.startsWith('data-') && attr.name !== 'data-update-request-id') {
                        const key = attr.name.replace('data-', '').replace(/-/g, '_');
                        data[key] = attr.value;
                    }
                }
                openModal(data);
            });
        });

        cancelBtns.forEach(btn => btn.addEventListener('click', closeModal));
        modal.querySelector('.update-request-backdrop').addEventListener('click', closeModal);

        form.addEventListener('submit', async e => {
            e.preventDefault();
            const fd = new FormData(form);
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    body: fd
                });
                const result = await res.json();
                if (result.success) {
                    alert(result.message || 'Inquiry updated successfully!');
                    location.reload();
                } else {
                    alert(result.message || 'Update failed.');
                }
            } catch {
                alert('Server or network error.');
            }
        });
    });
</script>