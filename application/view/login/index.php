<main class="main">
    <div class="uk-container">

        <div id="login-page">
            <h1 class="uk-h1 login-page-heading">
                Login.
            </h1>
            <p>
                Please use username as <em>anujsubedi</em> & password as <em>password</em> to demonstrate the successful login.
            </p>
            <?php

            /*
            * Error message.
            * We are storing message in session. So we can access it from anywhere.
            * 
            */

            AuthHelper::startSession(); // Start the session.

            if ( isset($_SESSION['message']) ) { ?>

                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p><?php echo $_SESSION['message']; ?></p>
                </div>

            <?php } unset($_SESSION['message']); ?>

            <div id="login-form-block">
                <form id="login-form" action="<?php echo URL; ?>login/checkAuth" method="POST">
                    <fieldset class="uk-fieldset">
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <label class="uk-form-label">Username</label>
                                <input type="text" class="uk-input" name="username" value="" / required>
                            </div><!-- // uk-width-1-3 -->
                            <div class="uk-width-1-1 uk-margin">
                                <label class="uk-form-label">Password</label>
                                <input type="password" class="uk-input" name="password" value="" / required>
                            </div><!-- // uk-width-1-2 -->
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <input type="submit" class="uk-button uk-button-primary uk-width-1-1" name="submit_login" value="Login" />
                                </div>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div><!-- // login-page -->
    </div><!-- // uk-container -->
</main><!-- // main -->