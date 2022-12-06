<div class="container">
    <!-- update vehicle form -->
    <div class="inner">
        <h3>Edit: </h3>
        <form class="update-vehicle" action="<?php echo URL; ?>vehicles/updateVehicle" method="POST">
            <label>Name</label>
            <input type="text" name="vehicle_name" value="<?php echo htmlspecialchars($vehicle->vec_name, ENT_QUOTES, 'UTF-8'); ?>" />

            <label>Price</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($vehicle->vec_price, ENT_QUOTES, 'UTF-8'); ?>" />

            <label>Model</label>
            <input type="text" name="model" value="<?php echo htmlspecialchars($vehicle->vec_model, ENT_QUOTES, 'UTF-8'); ?>" />

             <label>MFD date</label>
            <input type="text" name="mfd_date" value="<?php echo htmlspecialchars($vehicle->vec_mfd_date, ENT_QUOTES, 'UTF-8'); ?>" />

            <label>Color</label>
            <input type="text" name="color_id" value="<?php echo htmlspecialchars($vehicle->vec_color_id, ENT_QUOTES, 'UTF-8'); ?>" />

            <label>Branch</label>
            <input type="text" name="branch_id" value="<?php echo htmlspecialchars($vehicle->vec_branch_id, ENT_QUOTES, 'UTF-8'); ?>" />

            <input type="hidden" name="vec_id" value="<?php echo htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>" />

            <input type="submit" name="submit_update_vehicle" value="Update" />
        </form>
    </div><!-- /inner -->
</div><!-- /container -->

