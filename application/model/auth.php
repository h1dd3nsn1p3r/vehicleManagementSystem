<?php

class AuthModel
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
    * Query to check the user login.
    * how to use more than one model in a controller (see application/controller/auth.php for more)
    */ 
    public function checkAuth($username, $password)
    {
        $sql = "SELECT 
                id FROM users 
                WHERE 
                username = :username 
                AND 
                password = :password";

        $query = $this->db->prepare($sql);
        $parameters = array(
                    
                ':username' => $username, 
                ':password' => md5( $password )
        );

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        //return $query->fetch();

        // Check if the username and password are correct.
        if ($query->rowCount() == 1) {
            // If the user exists get user_id from database using fetch.
            $result = $query->fetch();
           
            return true;
        } else {
            // Return false if username and password are not correct.
            return false;
        }
    }

    /**
    * Query to check user full name.
    * @param string $username
    * @returns string
    */

    public function getUserFullName($username) {

        $sql = "SELECT 
                name FROM users 
                WHERE 
                username = :username";

        $query = $this->db->prepare($sql);
        $parameters = array(
                    
            ':username' => $username
        );

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }
}
