<?php 

    AuthHelper::handleAccessControl(); // Handle direct access.
?>
<div class="uk-container">
    <!-- Add vechile section -->
    <main class="main" id="main">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>You are in the view: application/view/customers/index.php</p>
        </div>
        <section id="customer-info">
            <div class="uk-flex align-item-center uk-flex-between">
                <div class="block">
                    <span class="total-count">
                        Total Customers:
                        <?php echo $numbers_of_customers; ?>
                    </span>
                </div>
                <div class="block">
                    <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #add-new-customer-model">Add new Customer</button>
                </div>
            </div>
        </section>
        <!-- modal -->
        <div id="add-new-customer-model" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h4 class="uk-h4">Add new Customer</h4>
                <form id="add-new-branch-form" action="<?php echo URL; ?>customers/addCustomer" method="POST">
                    <fieldset class="uk-fieldset">
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Full Name</label>
                                <input type="text" class="uk-input" name="cust_name" value="" placeholder="Joe Deo" required />
                            </div><!-- // uk-width-1-3 -->
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Email</label>
                                <input type="email" class="uk-input" name="cust_email" value="" placeholder="hello@email.com" required />
                            </div><!-- // uk-width-1-3 -->
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Phone</label>
                                <input type="tel" class="uk-input" name="cust_phone" value="" placeholder="9860987645" required />
                            </div>
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Address</label>
                                <input type="text" class="uk-input" name="cust_address" value="" placeholder="Koteshowr, Kathmandu" required />
                            </div>
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Vehicle</label>
                                <input type="number" class="uk-input" name="vehicle_id" value="" placeholder="3" required />
                            </div>
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Purchased Date</label>
                                <input type="date" class="uk-input" name="purchased_date" value="" required />
                            </div>
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                        <div class="uk-width-1-2">
                            <label class="uk-form-label">Branch</label>
                            <input type="number" class="uk-input" name="branch_id" value="" placeholder="1" required />
                        </div>
                    </div><!-- // uk-grid -->
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <input type="submit" name="submit_add_customer" class="uk-button uk-button-primary uk-width-1-1" value="Submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- modal -->
        <section id="customers-list">
            <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-branch-listing">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Vehicle</td>
                        <td>Branch</td>
                        <td>Purchased Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) { ?>
                    <tr>
                        <td>
                            <?php if (isset($customer->cust_id)) echo htmlspecialchars($customer->cust_id, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="name">
                            <?php if (isset($customer->cust_name)) echo htmlspecialchars($customer->cust_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->cust_phone)) echo htmlspecialchars($customer->cust_phone, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->cust_email)) echo htmlspecialchars($customer->cust_email, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->cust_address)) echo htmlspecialchars($customer->cust_address, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->vec_name)) echo htmlspecialchars($customer->vec_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->branch_name)) echo htmlspecialchars($customer->branch_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($customer->purchase_date)) echo htmlspecialchars($customer->purchase_date, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="actions">
                            <a href="<?php echo URL . 'customers/editCustomer/' . htmlspecialchars($customer->cust_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-primary rounded">
                                <span uk-icon="file-edit"></span>
                            </a>
                            <a href="<?php echo URL . 'customers/deleteCustomer/' . htmlspecialchars($customer->cust_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-danger rounded">
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