<?php
// Component: components/modal/accounts/email_verification.php
// Data contract: Uses session data - requires 'user' array in session with 'id' and 'email'
$userSession = session()->get('user');
$sessionUserId = $userSession['id'] ?? null;
$sessionEmail = $userSession['email'] ?? null;
?>

<div class="flex justify-end mb-4">
    <?= view('components/buttons/button_primary', [
        'id' => 'btnTriggerEmailVerification',
        'label' => '<i class="fa-solid fa-envelope-circle-check"></i>',
        'attributes' =>
        'type="button" ' .
            ($sessionUserId ? 'data-verify-user-id="' . esc($sessionUserId) . '" ' : '') .
            ($sessionEmail ? 'data-verify-user-email="' . esc($sessionEmail) . '" ' : '') .
            'class="js-verify-email-trigger"',
    ]) ?>
</div>

<div class="hidden z-50 fixed inset-0 justify-center items-center m-0 email-verification-modal">
    <div class="absolute inset-0 bg-black opacity-50 email-verification-backdrop"></div>

    <div class="relative bg-white shadow-lg mx-4 my-8 rounded w-full max-w-md max-h-[90vh] overflow-auto" role="dialog" aria-modal="true" aria-labelledby="emailVerificationTitle">
        <header class="px-6 py-4 border-b">
            <h3 id="emailVerificationTitle" class="font-semibold text-lg">Email Verification</h3>
        </header>

        <div class="space-y-6 px-6 py-6">
            <div class="text-center">
                <div class="flex justify-center items-center bg-blue-100 mx-auto mb-4 rounded-full w-12 h-12">
                    <i class="text-blue-600 fa-solid fa-envelope"></i>
                </div>
                <p class="text-gray-700 text-sm">
                    We've sent a 6-character verification code to:
                </p>
                <p class="mt-1 font-medium text-gray-900 verification-email"><?= esc($sessionEmail ?? 'your email') ?></p>
            </div>

            <form class="space-y-6 email-verification-form" method="POST" action="/settings/verify-email">
                <?= csrf_field() ?>
                <input type="hidden" name="user_id" class="verification-user-id" value="<?= esc($sessionUserId ?? '') ?>" />

                <!-- Code Input Section -->
                <div class="space-y-4">
                    <label class="block font-medium text-gray-700 text-sm text-center">
                        Enter Verification Code
                    </label>

                    <div class="flex justify-center space-x-2">
                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center uppercase verification-code-input" data-index="0" />
                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center uppercase verification-code-input" data-index="1" />

                        <div class="flex justify-center items-center w-4">
                            <div class="bg-gray-400 w-2 h-0.5"></div>
                        </div>

                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center verification-code-input" data-index="2" />
                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center verification-code-input" data-index="3" />
                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center verification-code-input" data-index="4" />
                        <input type="text" maxlength="1" class="border-2 border-gray-300 focus:border-blue-500 rounded-lg focus:ring-2 focus:ring-blue-200 w-12 h-12 font-bold text-lg text-center verification-code-input" data-index="5" />
                    </div>

                    <input type="hidden" name="verification_code" class="full-verification-code" />
                </div>

                <!-- Timer and Resend Section -->
                <div class="space-y-3 text-center">
                    <div class="timer-section">
                        <p class="text-gray-600 text-sm">
                            Code expires in: <span class="font-mono font-semibold text-blue-600 countdown-timer">01:00</span>
                        </p>
                    </div>

                    <div class="hidden resend-section">
                        <?= view('components/buttons/button_link', [
                            'id' => 'resendCodeBtn',
                            'label' => 'Resend Code',
                            'attributes' => 'type="button" class="text-sm resend-code-btn"',
                        ]) ?>
                        <p class="mt-1 text-gray-500 text-xs">
                            Resent: <span class="resend-counter">0</span>/5 times
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <footer class="flex justify-end space-x-2 pt-4 border-t">
                    <?= view('components/buttons/button_secondary', [
                        'id' => 'btnCancelVerification',
                        'label' => 'Cancel',
                        'attributes' => 'type="button" class="btn-cancel-verification"',
                    ]) ?>

                    <?= view('components/buttons/button_primary', [
                        'id' => 'btnVerifyCode',
                        'label' => 'Verify',
                        'attributes' => 'type="submit" class="verify-code-btn" disabled',
                    ]) ?>
                </footer>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('js/email_verification.js') ?>"></script>