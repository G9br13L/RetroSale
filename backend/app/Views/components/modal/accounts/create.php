<?php
// Component: components/modal/accounts/create.php
// Data contract:
// $errors: array|null
// $old: array|null
// $fieldErrors: array|null
?>
<?php
$errors = $errors ?? [];
$old = $old ?? [];
$fieldErrors = $fieldErrors ?? [];
?>

<div class="flex justify-end mb-4">
    <?= view('components/buttons/button_primary', [
        'id' => 'btnCreateAccount',
        'label' => '<i class="fa-solid fa-plus"></i> Create account',
        'attributes' => 'type="button"',
    ]) ?>
</div>

<div id="createAccountModal" class="hidden z-50 fixed inset-0 justify-center items-center m-0" aria-hidden="true">
    <div class="absolute inset-0 bg-black opacity-50" id="createAccountModalBackdrop"></div>

    <div class="relative bg-white shadow-lg mx-4 my-8 rounded w-full max-w-2xl max-h-[90vh] overflow-auto" role="dialog" aria-modal="true" aria-labelledby="createAccountTitle">
        <header class="px-6 py-4 border-b">
            <h3 id="createAccountTitle" class="font-semibold text-lg">Create account</h3>
        </header>

        <form id="createAccountForm" class="space-y-4 px-6 py-4" method="POST" action="/admin/accounts/create" enctype="multipart/form-data" aria-labelledby="createAccountTitle">
            <?= csrf_field() ?>

            <div class="gap-4 grid grid-cols-1 md:grid-cols-3">
                <div>
                    <label for="first_name" class="block font-medium text-gray-700 text-sm">First name</label>
                    <input id="first_name" name="first_name" required class="block mt-1 px-3 py-2 border rounded w-full" value="<?= esc($old['first_name'] ?? '') ?>" />
                    <div class="mt-2 text-red-500 text-sm"><?= esc($fieldErrors['first_name'] ?? '') ?></div>
                </div>

                <div>
                    <label for="middle_name" class="block font-medium text-gray-700 text-sm">Middle name</label>
                    <input id="middle_name" name="middle_name" class="block mt-1 px-3 py-2 border rounded w-full" value="<?= esc($old['middle_name'] ?? '') ?>" />
                </div>

                <div>
                    <label for="last_name" class="block font-medium text-gray-700 text-sm">Last name</label>
                    <input id="last_name" name="last_name" required class="block mt-1 px-3 py-2 border rounded w-full" value="<?= esc($old['last_name'] ?? '') ?>" />
                    <div class="mt-2 text-red-500 text-sm"><?= esc($fieldErrors['last_name'] ?? '') ?></div>
                </div>

                <div class="col-span-3">
                    <label for="email" class="block font-medium text-gray-700 text-sm">Email</label>
                    <input id="email" name="email" type="email" required class="block mt-1 px-3 py-2 border rounded w-full" value="<?= esc($old['email'] ?? '') ?>" />
                    <div class="mt-2 text-red-500 text-sm"><?= esc($fieldErrors['email'] ?? '') ?></div>
                </div>

                <div class="flex gap-4 col-span-3">
                    <div class="w-1/2">
                        <label for="password" class="block font-medium text-gray-700 text-sm">Password</label>
                        <input id="password" name="password" type="password" required minlength="8" class="block mt-1 px-3 py-2 border rounded w-full" />
                    </div>
                    <div class="w-1/2">
                        <label for="password_confirm" class="block font-medium text-gray-700 text-sm">Confirm password</label>
                        <input id="password_confirm" name="password_confirm" type="password" required minlength="8" class="block mt-1 px-3 py-2 border rounded w-full" />
                        <div class="mt-2 text-red-500 text-sm" id="passwordConfirmError"></div>
                    </div>
                </div>

                <div class="flex col-span-3">
                    <ul id="passwordRequirements" class="space-y-1 grid grid-cols-1 md:grid-cols-2 text-sm">
                        <li id="req-upper" class="text-gray-500">• At least 1 uppercase letter</li>
                        <li id="req-lower" class="text-gray-500">• At least 1 lowercase letter</li>
                        <li id="req-number" class="text-gray-500">• At least 1 number</li>
                        <li id="req-special" class="text-gray-500">• At least 1 special character (e.g. !@#$%)</li>
                        <li id="req-minlen" class="text-gray-500">• Minimum 8 characters</li>
                    </ul>
                </div>

                <div>
                    <label for="type" class="block font-medium text-gray-700 text-sm">Type</label>
                    <select id="type" name="type" class="block mt-1 px-3 py-2 border rounded w-full">
                        <option value="client">Client</option>
                        <option value="embalmer">Embalmer</option>
                        <option value="driver">Driver</option>
                        <option value="florist">Florist</option>
                        <option value="manager">Manager</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div>
                    <label for="gender" class="block font-medium text-gray-700 text-sm">Gender</label>
                    <select id="gender" name="gender" class="block mt-1 px-3 py-2 border rounded w-full">
                        <option value="">Prefer not to say</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="col-span-3">
                    <label for="profile_image" class="block font-medium text-gray-700 text-sm">Profile image</label>
                    <input id="profile_image" name="profile_image" type="file" accept="image/*" class="block mt-1 px-3 py-2 border rounded w-full" />
                    <img id="profilePreview"
                        data-placeholder="<?= base_url('images/placeholder-profile.jpg') ?>"
                        class="bg-gray-100 mt-2 rounded w-full h-64 object-contain"
                        alt="profile preview"
                        src="<?= base_url('images/placeholder-profile.jpg') ?>" />
                </div>

                <input type="hidden" name="newsletter" value="1" />
            </div>

            <footer class="flex justify-end space-x-2 pt-4 border-t">
                <?= view('components/buttons/button_secondary', [
                    'id' => 'btnCancelCreateAccount',
                    'label' => 'Cancel',
                    'attributes' => 'type="button"',
                ]) ?>
                <?= view('components/buttons/button_primary', [
                    'id' => 'btnSubmitCreateAccount',
                    'label' => 'Create',
                    'attributes' => 'type="submit" disabled',
                ]) ?>
            </footer>
        </form>
    </div>
</div>

<script src="<?= base_url('js/account_create.js') ?>"></script>