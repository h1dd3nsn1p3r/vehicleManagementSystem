<div class="uk-container">
    <!-- update vehicle form -->
    <section id="edit-vehicle">
        <h4 class="uk-h4">Edit:
            <?php echo $vehicle->vec_name; ?>
        </h4>
        <form class="update-vehicle" action="<?php echo URL; ?>vehicles/updateVehicle" method="POST">
            <fieldset class="uk-fieldset">
                <div class="uk-grid uk-margin">
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Name</label>
                        <input type="text" class="uk-input" name="vehicle_name" value="<?php echo htmlspecialchars($vehicle->vec_name, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-3 -->
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Price</label>
                        <input type="text" class="uk-input" name="price" value="<?php echo htmlspecialchars($vehicle->vec_price, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-2 -->
                </div><!-- // uk-grid -->
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Model</label>
                        <input type="text" class="uk-input" name="model" value="<?php echo htmlspecialchars($vehicle->vec_model, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">MFD date</label>
                        <input type="text" class="uk-input" name="mfd_date" value="<?php echo htmlspecialchars($vehicle->vec_mfd_date, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Color</label>
                        <input type="text" class="uk-input" name="color_id" value="<?php echo htmlspecialchars($vehicle->vec_color_id, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Branch</label>
                        <input type="text" class="uk-input" name="branch_id" value="<?php echo htmlspecialchars($vehicle->vec_branch_id, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <input type="hidden" name="vec_id" value="<?php echo htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" class="uk-button uk-button-primary uk-width-1-1" name="submit_update_vehicle" value="Update" />
                    </div>
                </div>
            </fieldset>
        </form>
</div><!-- /inner -->
</div><!-- /container -->