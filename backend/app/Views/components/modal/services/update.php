<?php
// Component: components/modal/services/update.php
// Data contract: $service (array)
?>
<div id="modal-update-<?= $service['id'] ?>" class="hidden z-50 fixed inset-0 justify-center items-center bg-black/40 backdrop-blur-sm">
    <div class="relative bg-white shadow-lg mx-auto p-6 rounded-2xl w-full max-w-md">
        <h2 class="mb-3 font-semibold text-gray-800 text-lg">Edit Service</h2>

        <form action="<?= site_url('admin/services/update/' . $service['id']) ?>" method="post" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label class="block mb-1 font-medium text-gray-700 text-sm">Name</label>
                <input type="text" name="name" value="<?= esc($service['name']) ?>" class="px-3 py-2 border border-gray-300 focus:border-indigo-500 rounded-md focus:ring-2 focus:ring-indigo-500 w-full" required>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700 text-sm">Description</label>
                <textarea name="description" class="px-3 py-2 border border-gray-300 focus:border-indigo-500 rounded-md focus:ring-2 focus:ring-indigo-500 w-full" rows="3"><?= esc($service['description']) ?></textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700 text-sm">Price (₱)</label>
                <input type="number" step="0.01" name="price" value="<?= esc($service['price']) ?>" class="px-3 py-2 border border-gray-300 focus:border-indigo-500 rounded-md focus:ring-2 focus:ring-indigo-500 w-full" required>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active_<?= $service['id'] ?>" value="1" <?= $service['is_active'] ? 'checked' : '' ?> class="border-gray-300 rounded focus:ring-indigo-500 w-4 h-4 text-indigo-600">
                <label for="is_active_<?= $service['id'] ?>" class="ml-2 text-gray-700 text-sm">Active</label>
            </div>

            <div class="flex justify-end gap-3 mt-5">
                <button type="button" onclick="toggleModal('modal-update-<?= $service['id'] ?>', false)" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md font-medium text-gray-700">Cancel</button>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md font-medium text-white">Save</button>
            </div>
        </form>

        <button onclick="toggleModal('modal-update-<?= $service['id'] ?>', false)" class="top-3 right-3 absolute text-gray-400 hover:text-gray-600">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>