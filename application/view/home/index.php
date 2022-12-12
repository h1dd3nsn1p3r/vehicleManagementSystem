<?php 

    AuthHelper::handleAccessControl(); // Handle direct access.
?>
<div class="uk-container">
    <main class="main">
        <section id="logged-screen">
           <h5><span id="greetings"></span> <?php echo AuthHelper::getLoggedInUsername(); ?>,</h5>
           <p>Welcome back to Toyota vehicle management system. You are now logged-in to the system. </p>
        </section>
    </main>
</div><!-- // uk-container -->
<script>

const greet = () => {

    // Get the current time.
    const date = new Date();
    const hour = date.getHours();

    if (hour >= 6 && hour < 12) {

        return '🌤 Good Morning';
    } 
    
    else if (hour >= 12 && hour < 18) {

        return '☀️ Good Afternoon';
    }

    else {

        return '🌛 Good Evening';
    }
};

document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('greetings').innerHTML = greet(); // Append the greeting to the greetings element.
});

</script>