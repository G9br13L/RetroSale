<?php
// Component: components/modals/update.php
// Renders a modal dialog for updating an inquiry/request
?>

<div id="updateModal" class="hidden z-50 fixed inset-0 flex justify-center items-center bg-black bg-opacity-40">
    <div class="bg-white opacity-0 shadow-lg mx-4 rounded-2xl w-full max-w-lg scale-95 transition-all transform" id="updateModalContent">
        <div class="flex justify-between items-center p-4 border-slate-200 border-b">
            <h3 class="font-semibold text-slate-800 text-lg">Update Inquiry</h3>
            <button id="closeUpdateModal" class="text-slate-500 hover:text-slate-700 transition">
                ✕
            </button>
        </div>

        <form id="updateForm" class="space-y-4 p-5">
            <!-- Hidden ID -->
            <input type="hidden" name="request_id" id="update_request_id">

            <div>
                <label for="update_service" class="block mb-1 font-medium text-slate-700 text-sm">Service</label>
                <input type="text" id="update_service" name="service" readonly
                    class="bg-slate-50 shadow-sm px-3 py-2 border border-slate-300 rounded-md focus:outline-none w-full">
            </div>

            <div>
                <label for="update_name" class="block mb-1 font-medium text-slate-700 text-sm">Client Name</label>
                <input type="text" id="update_name" name="name" readonly
                    class="bg-slate-50 shadow-sm px-3 py-2 border border-slate-300 rounded-md focus:outline-none w-full">
            </div>

            <div>
                <label for="update_date" class="block mb-1 font-medium text-slate-700 text-sm">Preferred Date</label>
                <input type="date" id="update_date" name="preferred_date"
                    class="shadow-sm px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
            </div>

            <div>
                <label for="update_status" class="block mb-1 font-medium text-slate-700 text-sm">Status</label>
                <select id="update_status" name="status"
                    class="shadow-sm px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
                    <option value="not open">Not Open</option>
                    <option value="un available">Unavailable</option>
                    <option value="called">Called</option>
                    <option value="messaged">Messaged</option>
                    <option value="meeting scheduled">Meeting Scheduled</option>
                    <option value="assigned">Assigned</option>
                    <option value="on going">On Going</option>
                    <option value="complete">Complete</option>
                </select>
            </div>

            <div>
                <label for="update_message" class="block mb-1 font-medium text-slate-700 text-sm">Message / Notes</label>
                <textarea id="update_message" name="message" rows="4"
                    class="shadow-sm px-3 py-2 border border-slate-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full"></textarea>
            </div>

            <div class="flex justify-end gap-2 pt-2 border-slate-200 border-t">
                <?= view('components/buttons/button_secondary', [
                    'label' => 'Cancel',
                    'attributes' => ['id' => 'cancelUpdateModal']
                ]) ?>

                <?= view('components/buttons/button_primary', [
                    'label' => 'Save Changes',
                    'attributes' => ['type' => 'submit', 'id' => 'saveUpdateModal']
                ]) ?>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
                const modal = document.getElementById('updateModal');
                const modalContent = document.getElementById('updateModalContent');
                const closeBtn = document.getElementById('closeUpdateModal');
                const cancelBtn = document.getElementById('cancelUpdateModal');
                const form = document.getElementById('updateForm');

                function openUpdateModal(data) {
                    modal.classList.remove('hidden');
                    setTimeout(() => modalContent.classList.remove('scale-95', 'opacity-0'), 10);

                    // Prefill fields if provided
                    document.getElementById('update_request_id').value = data.id || '';
                    document.getElementById('update_service').value = data.service || '';
                    document.getElementById('update_name').value = data.name || '';
                    document.getElementById('update_date').value = data.preferred_date || '';
                    document.getElementById('update_status').value = data.status || 'not open';
                    document.getElementById('update_message').value = data.message || '';
                }

                function closeUpdateModal() {
                    modalContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => modal.classList.add('hidden'), 150);
                }

                closeBtn.addEventListener('click', closeUpdateModal);
                cancelBtn.addEventListener('click', closeUpdateModal);

                // You can bind this open function globally for table buttons
                window.openUpdateModal = openUpdateModal;