<?php
// RetroSale Modal: Create Service
// This version matches your DB schema + retro aesthetic
$errors = $errors ?? [];
$old = $old ?? [];
$fieldErrors = $fieldErrors ?? [];
?>

<div class="flex justify-end mb-4">
    <button id="btnCreate"
        class="bg-gradient-to-r from-pink-500 hover:from-pink-600 to-rose-400 hover:to-rose-500 shadow-md px-4 py-2 rounded-lg font-medium text-white transition-all duration-300">
        <i class="mr-1 fa-solid fa-plus"></i>
        Create Service
    </button>
</div>

<!-- MODAL -->
<div id="createServiceModal"
    class="hidden z-50 fixed inset-0 justify-center items-center backdrop-blur-sm"
    aria-hidden="true">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-40" id="createServiceModalBackdrop"></div>

    <!-- Modal Box -->
    <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 shadow-2xl mx-4 my-8 border border-gray-200/70 rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-auto animate-fadeIn">
        <header class="bg-gradient-to-r from-pink-400/20 to-rose-300/10 px-6 py-4 border-gray-300 border-b rounded-t-2xl">
            <h3 id="createServiceTitle" class="font-semibold text-gray-800 text-lg">
                <i class="mr-2 text-pink-500 fa-solid fa-wrench"></i> New Service
            </h3>
        </header>

        <form id="createServiceForm"
            class="space-y-4 px-6 py-5"
            method="POST"
            action="/admin/services/create"
            enctype="multipart/form-data"
            aria-labelledby="createServiceTitle">

            <?= csrf_field() ?>

            <!-- Service Name -->
            <div>
                <label for="name" class="block font-medium text-gray-700 text-sm">Service Name</label>
                <input id="name" name="name" required
                    value="<?= esc($old['name'] ?? '') ?>"
                    class="block shadow-sm mt-1 border-gray-300 focus:border-pink-400 rounded-lg focus:ring focus:ring-pink-200 w-full" />
                <div class="mt-1 text-red-500 text-sm"><?= esc($fieldErrors['name'] ?? '') ?></div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block font-medium text-gray-700 text-sm">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="block shadow-sm mt-1 border-gray-300 focus:border-pink-400 rounded-lg focus:ring focus:ring-pink-200 w-full"><?= esc($old['description'] ?? '') ?></textarea>
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block font-medium text-gray-700 text-sm">Price (₱)</label>
                <input id="price" name="price" type="number" step="0.01" min="0" required
                    value="<?= esc($old['price'] ?? '') ?>"
                    class="block shadow-sm mt-1 border-gray-300 focus:border-pink-400 rounded-lg focus:ring focus:ring-pink-200 w-full" />
                <div class="mt-1 text-red-500 text-sm"><?= esc($fieldErrors['price'] ?? '') ?></div>
            </div>

            <!-- Availability -->
            <div class="flex items-center space-x-3">
                <input type="checkbox" id="is_active" name="is_active" value="1"
                    class="focus:ring-pink-300 text-pink-500 form-checkbox" />
                <label for="is_active" class="text-gray-700">Mark as Active</label>
            </div>

            <footer class="flex justify-end space-x-2 pt-5 border-gray-300 border-t">
                <button type="button" id="btnCancelCreate"
                    class="hover:bg-gray-100 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 transition-all duration-200">
                    Cancel
                </button>
                <button type="submit" id="btnSubmitCreate"
                    class="bg-gradient-to-r from-pink-500 to-rose-400 shadow-md hover:shadow-lg px-5 py-2 rounded-lg font-medium text-white transition-all duration-300">
                    Create
                </button>
            </footer>
        </form>
    </div>
</div>

<!-- Toast + Modal Script -->
<script src="<?= base_url('js/toast.js') ?>"></script>
<script>
    (function() {
        const btnCreate = document.getElementById('btnCreate');
        const modal = document.getElementById('createServiceModal');
        const backdrop = document.getElementById('createServiceModalBackdrop');
        const btnCancel = document.getElementById('btnCancelCreate');
        const form = document.getElementById('createServiceForm');
        const submitBtn = document.getElementById('btnSubmitCreate');
        let canClose = true;

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!canClose) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
            form.reset();
        }

        if (btnCreate) btnCreate.addEventListener('click', openModal);
        if (backdrop) backdrop.addEventListener('click', closeModal);
        if (btnCancel) btnCancel.addEventListener('click', closeModal);

        // Submit via fetch
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const fd = new FormData(form);

                canClose = false;
                submitBtn.disabled = true;
                submitBtn.textContent = 'Creating...';
                toast('Creating service — please wait', 'info');

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json'
                        },
                        body: fd,
                    })
                    .then(async (res) => {
                        const data = await res.json().catch(() => null);
                        if (res.ok && data && data.success) {
                            toast(data.message || 'Service created successfully!', 'success');
                            setTimeout(() => location.reload(), 800);
                        } else {
                            toast(data?.message || 'Failed to create service.', 'error');
                        }
                    })
                    .catch(() => {
                        toast('Network error while creating service.', 'error');
                    })
                    .finally(() => {
                        canClose = true;
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Create';
                    });
            });
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
        });
    })();
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.97);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }
</style>