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
    * Public variable to hold the errors array.
    * @var array
    */

    public $errors;


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

            // Check if sessions has been started.
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
           
            $_SESSION["username"] = $_POST["username"];
           
            // Login success: redirect to home page.
            header('location: ' . URL . 'home/index');

        } else {

            // Add error to array.
            $this->errors = "Invalid username or password.";

            Helper::startSession(); // Start the session.

            $_SESSION["errors"] = $this->errors;

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

    public function doLogout() {

        Helper::startSession(); // Start the session.

        // Unset all of the session variables.
        $_SESSION = array();

        // Destroy the session.
        session_destroy();

        // Redirect to login page.
        header('location: ' . URL . 'login/index');
    }

    /**
    * Check if the user is logged in.
    * @return boolean
    */

    public function isUserLoggedIn() {

        Helper::startSession(); // Start the session.

        return isset($_SESSION["username"]) ? true : false; 
    }

    /**
    * Get the name of the current logged user.
    * @return string
    */

    public function getLoggedInUsername() {

        Helper::startSession(); // Start the session.

        // When false is returned, the user is not logged in.
        return isset($_SESSION["username"]) ? $_SESSION["username"] : false;
    }

    /**
    * Check if full name of logged in user.
    * @return boolean
    */

    public function getUserFullName() {

        Helper::startSession(); // Start the session.

        $name = $this->authModel->getUserFullName(

            $_POST["username"], 
        );
    }
}
