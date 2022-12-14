<?php 

    AuthHelper::handleAccessControl(); // Handle direct access.
?>
<div class="uk-container">
    <!-- Add vechile section -->
    <main class="main" id="main">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>You are in the view: application/view/vehicles/index.php</p>
        </div>
        <section id="vehicle-info">
            <div class="uk-flex align-item-center uk-flex-between">
                <div class="block">
                    <span class="total-count">
                        Total vehicles:
                        <?php echo $amount_of_vehicles; ?>
                    </span>
                </div>
                <div class="block">
                    <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #add-new-vehicle-model">Add new vehicle</button>
                </div>
            </div>
        </section>
        <!-- modal -->
        <div id="add-new-vehicle-model" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h4 class="uk-h4">Add vehicle</h4>
                <form id="add-new-vehicle-form" action="<?php echo URL; ?>vehicles/addVehicles" method="POST">
                    <fieldset class="uk-fieldset">
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Name</label>
                                <input type="text" class="uk-input" name="vec_name" value="" placeholder="Fortuner" required />
                            </div><!-- // uk-width-1-3 -->
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Price</label>
                                <input type="text" class="uk-input" name="price" value="" placeholder="470000" required />
                            </div><!-- // uk-width-1-3 -->
                        </div><!-- // uk-grid -->
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Model</label>
                                <input type="text" class="uk-input" name="model" value="" placeholder="HW310" required />
                            </div>
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">MFD Date</label>
                                <input type="date" name="mfd_date" value="" required />
                            </div>
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Color ID</label>
                                <input type="text" class="uk-input" name="color_id" value="" placeholder="1" required />
                            </div>
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Branch ID</label>
                                <input type="text" class="uk-input" name="branch_id" value="" placeholder="2" required />
                            </div>
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-1">
                                <input type="submit" name="submit_add_vechile" class="uk-button uk-button-primary uk-width-1-1" value="Submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- modal -->
        <section id="vehicles-list">
            <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-vehicle-listing">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Model</td>
                        <td>Price</td>
                        <td>Color</td>
                        <td>MFD Date</td>
                        <td>Branch</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehicles as $vehicle) { ?>
                    <tr>
                        <td>
                            <?php if (isset($vehicle->vec_id)) echo htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="name">
                            <?php if (isset($vehicle->vec_name)) echo htmlspecialchars($vehicle->vec_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($vehicle->vec_model)) echo htmlspecialchars($vehicle->vec_model, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            ₹<?php if (isset($vehicle->vec_price)) echo htmlspecialchars($vehicle->vec_price, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($vehicle->color_name)) echo htmlspecialchars($vehicle->color_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($vehicle->vec_mfd_date)) echo htmlspecialchars($vehicle->vec_mfd_date, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($vehicle->branch_name)) echo htmlspecialchars($vehicle->branch_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="actions">
                            <a href="<?php echo URL . 'vehicles/editVehicle/' . htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-primary rounded">
                                <span uk-icon="file-edit"></span>
                            </a>
                            <a href="<?php echo URL . 'vehicles/deleteVehicle/' . htmlspecialchars($vehicle->vec_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-danger rounded">
                                <span uk-icon="trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</div><!-- // uk-container -->