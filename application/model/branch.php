<?php

class BranchModel
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
    * Get all branches from database
    */
    public function getAllBranches()
    {
        $sql = "SELECT 
                branch_id, 
                branch_name, 
                branch_phone, 
                branch_email
                FROM branches";
                
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a Branch to the database.
     * To save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $branch_name
     * @param string $branch_phone
     * @param string $branch_email
     */
    public function addBranch($branch_name, $branch_phone, $branch_email)
    {
        $sql = "INSERT INTO 
            branches 
            (
                branch_name, 
                branch_phone, 
                branch_email
            ) VALUES (
                :branch_name, 
                :branch_phone, 
                :branch_email
            )";

        $query = $this->db->prepare($sql);

        $parameters = array(

            ':branch_name'     => $branch_name,
            ':branch_phone'    => $branch_phone,
            ':branch_email'    => $branch_email,
        );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a branch in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $branch_id Id of branch
     */
    public function deleteBranch($branch_id)
    {
        $sql = "DELETE FROM branches WHERE branch_id = :branch_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':branch_id' => $branch_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a branch from database.
     */
    public function getBranch($branch_id)
    {
        $sql = "SELECT 
                branch_id, 
                branch_name, 
                branch_phone, 
                branch_email 
                FROM branches WHERE branch_id = :branch_id LIMIT 1";
                
        $query = $this->db->prepare($sql);
        $parameters = array(':branch_id' => $branch_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a branch in database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $branch_name
     * @param string $branch_phone
     * @param string $branch_email
     */
    public function updateBranch($branch_name, $branch_phone, $branch_email, $branch_id)
    {
        $sql = "UPDATE branches SET
                branch_name        = :branch_name, 
                branch_phone       = :branch_phone, 
                branch_email       = :branch_email 
                WHERE 
                branch_id          = :branch_id";

        $query = $this->db->prepare($sql);

        $parameters = array(
            ':branch_name'        => $branch_name, 
            ':branch_phone'       => $branch_phone, 
            ':branch_email'       => $branch_email, 
            ':branch_id'          => $branch_id
            );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfBranches()
    {
        $sql = "SELECT COUNT(branch_id) AS amount_of_branches FROM branches";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_branches;
    }
}
