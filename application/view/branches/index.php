<?php 

    AuthHelper::handleAccessControl(); // Handle direct access.
?>
<div class="uk-container">
    <!-- Add vechile section -->
    <main class="main" id="main">
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>You are in the view: application/view/branches/index.php</p>
        </div>
        <section id="branch-info">
            <div class="uk-flex align-item-center uk-flex-between">
                <div class="block">
                    <span class="total-count">
                        Total branches:
                        <?php echo $amount_of_branches; ?>
                    </span>
                </div>
                <div class="block">
                    <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #add-new-branch-model">Add new branch</button>
                </div>
            </div>
        </section>
        <!-- modal -->
        <div id="add-new-branch-model" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <h4 class="uk-h4">Add a branch</h4>
                <form id="add-new-branch-form" action="<?php echo URL; ?>branches/addBranch" method="POST">
                    <fieldset class="uk-fieldset">
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Name</label>
                                <input type="text" class="uk-input" name="branch_name" value="" placeholder="Koteshowr" required />
                            </div><!-- // uk-width-1-3 -->
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Phone</label>
                                <input type="tel" class="uk-input" name="branch_phone" value="" placeholder="014241270" required />
                            </div><!-- // uk-width-1-3 -->
                        </div><!-- // uk-grid -->
                        <div class="uk-grid uk-margin">
                            <div class="uk-width-1-2">
                                <label class="uk-form-label">Email</label>
                                <input type="email" class="uk-input" name="branch_email" value="" placeholder="kot@toyota.com.np" required />
                            </div>
                        </div><!-- // uk-grid -->
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <input type="submit" name="submit_add_branch" class="uk-button uk-button-primary uk-width-1-1" value="Submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- modal -->
        <section id="branch-list">
            <table class="uk-table uk-table-striped uk-table-middle uk-table-responsive uk-branch-listing">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($branches as $branch) { ?>
                    <tr>
                        <td>
                            <?php if (isset($branch->branch_id)) echo htmlspecialchars($branch->branch_id, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="name">
                            <?php if (isset($branch->branch_name)) echo htmlspecialchars($branch->branch_name, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($branch->branch_phone)) echo htmlspecialchars($branch->branch_phone, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php if (isset($branch->branch_email)) echo htmlspecialchars($branch->branch_email, ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td class="actions">
                            <a href="<?php echo URL . 'branches/editBranch/' . htmlspecialchars($branch->branch_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-primary rounded">
                                <span uk-icon="file-edit"></span>
                            </a>
                            <a href="<?php echo URL . 'branches/deleteBranch/' . htmlspecialchars($branch->branch_id, ENT_QUOTES, 'UTF-8'); ?>" class="uk-button uk-button-danger rounded">
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