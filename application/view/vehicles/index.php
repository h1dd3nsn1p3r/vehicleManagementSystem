<div class="container">
    <h2>You are in the View: application/view/vehicles/index.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div class="box">
        <h3>Add a Vechile</h3>
        <form action="<?php echo URL; ?>vehicles/addVehicles" method="POST">
            <label>Name</label>
            <input type="text" name="name" value="" required />
            <label>Model</label>
            <input type="text" name="model" value="" required />
            <label>Price</label>
            <input type="text" name="price" value="" />
            <label>MFD Date</label>
            <input type="text" name="mfd_date" value="" />
            <input type="submit" name="submit_add_vechile" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of vechiles (data from second model)</h3>
        <div>
            <?php echo $amount_of_vehicles; ?>
        </div>
        <h3>Amount of vechile (via AJAX)</h3>
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of songs via Ajax (will be displayed in #javascript-ajax-result-box)</button>
            <div id="javascript-ajax-result-box"></div>
        </div>
        <h3>List of vechiles (data from first model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Model</td>
                <td>Price</td>
                <td>MFD Date</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vehicles as $vehicle) { ?>
                <tr>
                    <td>
                        <?php if (isset($vehicle->vec_id)) echo htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?php if (isset($vehicle->vec_name)) echo htmlspecialchars($vehicle->vec_name, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?php if (isset($vehicle->vec_model)) echo htmlspecialchars($vehicle->vec_model, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?php if (isset($vehicle->vec_price)) echo htmlspecialchars($vehicle->vec_price, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                     <td>
                        <?php if (isset($vehicle->vec_mfd_date)) echo htmlspecialchars($vehicle->vec_mfd_date, ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <a href="<?php echo URL . 'vehicles/deleteVehicle/' . htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>">
                            Delete
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo URL . 'vehicles/editvehicle/' . htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
