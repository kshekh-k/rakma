<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="py-6 lg:py-12 max-w-3xl mx-auto">
    <!-- Renew Plan Heading -->
    <h2 class="text-xl sm:text-3xl text-gray-700 font-semibold mb-2">Renew Current Membership Plan</h2>
    <p class="text-gray-500 text-sm sm:text-base mb-6">
        As per your registration record, below is your current membership option for renewal.
    </p>

    <!-- Plan Selection Box -->
    <div class="flex justify-center items-center gap-3 pt-4 pb-4">
        <label class="flex items-center gap-3 text-left font-medium text-lg text-gray-700 bg-white border-2 border-primary/30 rounded-xl p-4 sm:p-5 shadow-md cursor-pointer hover:border-primary transition duration-150">
            <input type="radio" name="membership" id="renew_membership_radio"
                data-id="<?php echo $membership['id']; ?>"
                data-desc="<?php echo htmlspecialchars($membership['description']); ?>"
                value="<?php echo $membership['price']; ?>"
                class="form-radio h-6 w-6 text-blues focus:ring-blues" checked>
            <span class="font-semibold text-gray-800">
                <?php echo htmlspecialchars($membership['name']); ?>
                <b class="text-secondary ml-2 font-bold text-xl">₹<?php echo htmlspecialchars($membership['price']); ?>/-</b>
            </span>
            <span class="text-xs font-semibold px-2.5 py-1 bg-green-100 text-green-800 rounded-full ml-2">2 Years Validity</span>
        </label>
    </div>

    <!-- Plan Description Details -->
    <?php if (!empty($membership['description'])) { ?>
    <div class="rounded-xl p-5 xs:p-8 bg-white text-left shadow-md border border-gray-200 mt-4">
        <div class="flex items-center gap-2 mb-2 text-gray-700 font-semibold">
            <svg class="w-5 h-5 text-blues" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <span>Plan Details &amp; Privileges</span>
        </div>
        <p class="font-normal text-sm sm:text-base leading-relaxed text-gray-600">
            <?php echo $membership['description']; ?>
        </p>
        <p class="text-secondary font-semibold pt-3 border-t border-gray-100 mt-3 text-sm sm:text-base">
            ₹<?php echo htmlspecialchars($membership['price']); ?>/- Membership renewal fee (Valid for 2 Years from renewal date)
        </p>
    </div>
    <?php } ?>

    <!-- Action Button -->
    <div class="pt-5 flex justify-center">
        <button type="button" id="renew_payment_btn"
            class="rounded-lg flex justify-center items-center font-medium text-white tracking-wider uppercase bg-primary hover:bg-secondary shadow-lg py-4 px-10 text-base sm:text-lg transition duration-150 transform hover:scale-[1.02]">
            Proceed to Pay &amp; Renew (₹<?php echo htmlspecialchars($membership['price']); ?>)
        </button>
    </div>
</div>
