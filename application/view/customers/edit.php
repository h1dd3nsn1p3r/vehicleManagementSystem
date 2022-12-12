<div class="uk-container">
    <!-- update customer form -->
    <section id="edit-customer">
        <h4 class="uk-h4">Editing Customer:
            <?php echo $customer->cust_name; ?>
        </h4>
        <form class="update-customer" action="<?php echo URL; ?>customers/updateCustomer" method="POST">
            <fieldset class="uk-fieldset">
                <div class="uk-grid uk-margin">
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Name</label>
                        <input type="text" class="uk-input" name="cust_name" value="<?php echo htmlspecialchars($customer->cust_name, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-3 -->
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Email</label>
                        <input type="email" class="uk-input" name="cust_email" value="<?php echo htmlspecialchars($customer->cust_email, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-2 -->
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Phone</label>
                        <input type="tel" class="uk-input" name="cust_phone" value="<?php echo htmlspecialchars($customer->cust_phone, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div><!-- // uk-grid -->

                <div class="uk-grid uk-margin">
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Address</label>
                        <input type="text" class="uk-input" name="cust_address" value="<?php echo htmlspecialchars($customer->cust_address, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-3 -->
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Vehicle</label>
                        <input type="text" class="uk-input" name="vehicle_id" value="<?php echo htmlspecialchars($customer->vechile_id, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-2 -->
                    <div class="uk-width-1-3">
                        <label class="uk-form-label">Branch</label>
                        <input type="text" class="uk-input" name="branch_id" value="<?php echo htmlspecialchars($customer->branch_id, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div><!-- // uk-grid -->

                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <input type="hidden" name="cust_id" value="<?php echo htmlspecialchars($customer->cust_id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" class="uk-button uk-button-primary uk-width-1-1" name="submit_update_customer" value="Update" />
                    </div>
                </div>
            </fieldset>
        </form>
</div><!-- /inner -->
</div><!-- /container -->