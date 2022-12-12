<?php

/**
 *
 * Class Login
 * This is a Auth controller to that checks the login.
 */
class Login extends Controller
{

    /**
    *
    * Public variable to hold the message.
    * @var array
    */

    public $message;


    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/login/index
    */
    public function index()
    {

       // load views. 
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: unauthorized
     * This method handles what happens when you move to http://yourproject/login/unauthorized
     * Redirect user to unauthorized page if login fails.
     */
    public function unauthorized()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/login/unauthorized.php';
        require APP . 'view/_templates/footer.php';
    }
   
    /**
    *
    * Checks if the user is logged in.
    *
    */
    public function checkAuth() {

        $auth = $this->authModel->checkAuth(

            $_POST["username"], 
            $_POST["password"]
        );

        // Check if username & password is valid.
        if ($auth) {

            AuthHelper::startSession(); // Start the session.
           
            $_SESSION["username"] = $_POST["username"];
           
            // Login success: redirect to home page.
            header('location: ' . URL . 'home/index');

        } else {

            // Add error to array.
            $this->message = "Invalid username or password!!";

            AuthHelper::startSession(); // Start the session.

            $_SESSION["message"] = $this->message;

            // Login failed: Redirect to login page. 
            //header('location: ' . URL . 'login/unauthorized');
            header('location: ' . URL . 'login/index');
        }
    }

    /**
     * PAGE: logout
     * This method handles what happens when you move to http://yourproject/login/index
     * Destroy the session and redirect to login page.
     */

    public function logout() {

        AuthHelper::startSession(); // Start the session.

        // Unset all of the session variables.
        $_SESSION = array();

        // Add error to array.
        $this->message = "You have been logged out.";
        
        $_SESSION["message"] = $this->message;

        // Redirect to login page.
        header('location: ' . URL . 'login/index');
    }
}
