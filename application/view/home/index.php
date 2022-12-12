<div class="uk-container">
    <main class="main">
        <section id="logged-screen">
            Hello 
            <?php 
                session_start();
                var_dump($_SESSION);
                //echo $this->login->getLoggedUsername(); 
            ?>
        </section>
    </main>
</div><!-- // uk-container -->