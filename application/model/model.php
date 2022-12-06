<?php

class Model
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
    * Get all songs from database
    */
    public function getAllVehicles()
    {
        $sql = "SELECT 
                vec_id, 
                vec_name, 
                vec_price, 
                vec_model, 
                vec_mfd_date 
                FROM vechile_details";
                
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a Vehicle to the database.
     * To save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $vec_name
     * @param string $price
     * @param string $model
     * @param string $mfd_date
     * @param string $color_id
     * @param string $branch_id
     */
    public function addVehicles($vec_name, $price, $model, $mfd_date, $color_id, $branch_id)
    {
        $sql = "INSERT INTO 
            vechile_details 
            (
                vec_name, 
                vec_price, 
                vec_model, 
                vec_mfd_date, 
                vec_color_id, 
                vec_branch_id
            ) VALUES (
                :vec_name, 
                :price, 
                :model, 
                :mfd_date, 
                :color_id, 
                :branch_id
            )";

        $query = $this->db->prepare($sql);

        $parameters = array(

            ':vec_name'     => $vec_name,
            ':price'        => $price,
            ':model'        => $model,
            ':mfd_date'     => $mfd_date,
            ':color_id'     => $color_id,
            ':branch_id'    => $branch_id
            
        );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteVehicle($vec_id)
    {
        $sql = "DELETE FROM vechile_details WHERE vec_id = :vec_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':vec_id' => $vec_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a vehicles from database.
     */
    public function getVehicle($vec_id)
    {
        $sql = "SELECT 
                vec_id, 
                vec_name, 
                vec_price, 
                vec_model, 
                vec_mfd_date, 
                vec_color_id, 
                vec_branch_id 
                FROM vechile_details WHERE vec_id = :vec_id LIMIT 1";
                
        $query = $this->db->prepare($sql);
        $parameters = array(':vec_id' => $vec_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a vehicle in database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $vehicle_name
     * @param string $price
     * @param string $model
     * @param int $mfd_date
     * @param int $color_id
     * @param int $branch_id
     */
    public function updateVehicle($vehicle_name, $price, $model, $mfd_date, $color_id, $branch_id, $vec_id)
    {
        $sql = "UPDATE vechile_details SET
                vec_name        = :vehicle_name, 
                vec_price       = :price, 
                vec_model       = :model, 
                vec_mfd_date    = :mfd_date, 
                vec_color_id    = :color_id, 
                vec_branch_id   = :branch_id  
                WHERE 
                vec_id          = :vec_id";

        $query = $this->db->prepare($sql);

        //UPDATE `vechile_details` SET `vec_price` = '90000', `vec_model` = 'FOST89', `vec_mfd_date` = '12/02/2021', `vec_color_id` = '1', `vec_branch_id` = '1' WHERE `vechile_details`.`vec_id` = 3;

        $parameters = array(
            ':vehicle_name'       => $vehicle_name, 
            ':price'              => $price, 
            ':model'              => $model, 
            ':mfd_date'           => $mfd_date,
            ':color_id'           => $color_id,
            ':branch_id'          => $branch_id,
            ':vec_id'             => $vec_id
            );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfVehicles()
    {
        $sql = "SELECT COUNT(vec_id) AS amount_of_vehicles FROM vechile_details";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_vehicles;
    }
}
