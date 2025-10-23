<?php
// Component: components/modal/services/delete.php
// Data contract: $service (array)
?>
<div id="modal-delete-<?= $service['id'] ?>" class="hidden z-50 fixed inset-0 justify-center items-center bg-black/40 backdrop-blur-sm">
    <div class="relative bg-white shadow-lg mx-auto p-6 rounded-2xl w-full max-w-sm text-center">
        <h2 class="mb-3 font-semibold text-gray-800 text-lg">Delete Service</h2>
        <p class="mb-6 text-gray-600">
            Are you sure you want to delete <strong><?= esc($service['name']) ?></strong>?
        </p>
        <form action="<?= site_url('admin/services/delete/' . $service['id']) ?>" method="post" class="flex justify-center gap-3">
            <?= csrf_field() ?>
            <button type="button" onclick="toggleModal('modal-delete-<?= $service['id'] ?>', false)" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md font-medium text-gray-700">Cancel</button>
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md font-medium text-white">Delete</button>
        </form>
        <button onclick="toggleModal('modal-delete-<?= $service['id'] ?>', false)" class="top-3 right-3 absolute text-gray-400 hover:text-gray-600">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>