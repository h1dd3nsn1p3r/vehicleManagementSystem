<div class="uk-container">
    <!-- update branch form -->
    <section id="edit-branch">
        <h4 class="uk-h4">Editing branch:
            <?php echo $branch->branch_name; ?>
        </h4>
        <form class="update-branch" action="<?php echo URL; ?>branches/updateBranch" method="POST">
            <fieldset class="uk-fieldset">
                <div class="uk-grid uk-margin">
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Name</label>
                        <input type="text" class="uk-input" name="branch_name" value="<?php echo htmlspecialchars($branch->branch_name, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-3 -->
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Phone</label>
                        <input type="tel" class="uk-input" name="branch_phone" value="<?php echo htmlspecialchars($branch->branch_phone, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div><!-- // uk-width-1-2 -->
                    <div class="uk-width-1-2">
                        <label class="uk-form-label">Email</label>
                        <input type="email" class="uk-input" name="branch_email" value="<?php echo htmlspecialchars($branch->branch_email, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div><!-- // uk-grid -->
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <input type="hidden" name="branch_id" value="<?php echo htmlspecialchars($branch->branch_id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" class="uk-button uk-button-primary uk-width-1-1" name="submit_update_branch" value="Update" />
                    </div>
                </div>
            </fieldset>
        </form>
</div><!-- /inner -->
</div><!-- /container -->