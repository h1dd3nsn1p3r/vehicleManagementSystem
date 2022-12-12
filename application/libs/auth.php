<?php

class AuthHelper
{

    /**
    *
    * Helper function to check the session status.
    * If the session is not started, start it.
    * 
    */

    static public function startSession() {

        // Check session, if not started, start it.
        if (session_status() == PHP_SESSION_NONE) {

            session_start();
        }
    }


    /**
    *
    * Helper function to check logged-in status.
    * return true if logged in, false if not.
    * @return boolean
    */

    static public function isLoggedIn() {

        // Start session if not started.
        self::startSession();

        // Check if user is logged in.
        return isset($_SESSION['username']) ? true : false;
    }


    /**
    * Get the name of the current logged user.
    * @return string
    */

    static public function getLoggedInUsername() {

        self::startSession(); // Start the session.

        // When false is returned, the user is not logged in.
        return isset($_SESSION["username"]) ? $_SESSION["username"] : false;
    }

    /**
    * Check if full name of logged in user.
    * @parem string $username
    * @return string
    */

    static public function getUserFullName($username) {

        self::startSession(); // Start the session.
    }

    /**
    *
    * Handle direct access.
    * If user is not logged in, redirect to login page.
    */

    static public function handleAccessControl() {

        // Check if user is logged in.
        if (!self::isLoggedIn()) {

            // If user is not logged in, redirect to login page.
            header('location: ' . URL . 'login/unauthorized');
        }
    }
}