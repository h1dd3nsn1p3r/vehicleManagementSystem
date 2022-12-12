<?php

class CustomerModel
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
    * Get all customers from database.
    */
    public function getAllCustomers()
    {
        $sql = "SELECT 
                cust_id, 
                cust_name, 
                cust_phone, 
                cust_email,
                cust_address,
                vechile_id,
                purchase_date,
                branch_id
                FROM customer_details";
                
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a Customer to the database.
     * To save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $cust_name
     * @param string $cust_email
     * @param string $cust_phone
     * @param string $cust_address
     * @param string $vehicle_id
     * @param string $purchase_date
     * @param string $branch_id
     */
    public function addCustomer($cust_name, $cust_email, $cust_phone, $cust_address, $vehicle_id, $branch_id)
    {
        $sql = "INSERT INTO 
            customer_details 
            (
                cust_name, 
                cust_email, 
                cust_phone,
                cust_address,
                vechile_id,
                branch_id
            ) VALUES (
                :cust_name, 
                :cust_email, 
                :cust_phone,
                :cust_address,
                :vehicle_id,
                :branch_id
            )";

        $query = $this->db->prepare($sql);

        $parameters = array(

            ':cust_name'    => $cust_name,
            ':cust_email'   => $cust_email,
            ':cust_phone'   => $cust_phone,
            ':cust_address' => $cust_address,
            ':vehicle_id'   => $vehicle_id,
            ':branch_id'    => $branch_id
        );

        // useful for debugging: you can see the SQL behind above construction by using:
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a customer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $cust_id
     */
    public function deleteCustomer($cust_id)
    {
        $sql = "DELETE FROM customer_details WHERE cust_id = :cust_id";
        
        $query = $this->db->prepare($sql);

        $parameters = array(
            
            ':cust_id' => $cust_id
        );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a customer from database.
     */
    public function getCustomer($cust_id)
    {
        $sql = "SELECT 
                cust_id, 
                cust_name,
                cust_phone, 
                cust_email,
                cust_address,
                vechile_id,
                purchase_date,
                branch_id 
                FROM customer_details WHERE cust_id = :cust_id LIMIT 1";
                
        $query = $this->db->prepare($sql);
        $parameters = array(':cust_id' => $cust_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a customer in database
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $cust_name
     * @param string $cust_email
     * @param string $cust_phone
     * @param string $cust_address
     * @param string $vehicle_id
     * @param string $purchase_date
     * @param string $branch_id
     */
    public function updateCustomer( $cust_name, $cust_email, $cust_phone, $cust_address, $vehicle_id, $branch_id, $cust_id )
    {
        $sql = "UPDATE customer_details SET
                cust_name        = :cust_name,
                cust_email       = :cust_email,
                cust_phone       = :cust_phone,
                cust_address     = :cust_address,
                vechile_id       = :vehicle_id,
                branch_id        = :branch_id
                WHERE 
                cust_id          = :cust_id";

        $query = $this->db->prepare($sql);

        $parameters = array(
            
            ':cust_name'    => $cust_name,
            ':cust_email'   => $cust_email,
            ':cust_phone'   => $cust_phone,
            ':cust_address' => $cust_address,
            ':vehicle_id'   => $vehicle_id,
            ':branch_id'    => $branch_id,
            ':cust_id'      => $cust_id
        );

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/customer.php for more)
     */
    public function getNumberOfCustomers()
    {
        $sql = "SELECT COUNT(cust_id) AS getNumberOfCustomers FROM customer_details";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->getNumberOfCustomers;
    }
}
