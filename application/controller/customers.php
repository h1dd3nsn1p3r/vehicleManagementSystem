<?php

/**
 *
 * Class Customers
 * This is a Customer controller to demonstrate the basic CRUD (Create/Read/Update/Delete) actions.
 */
class Customers extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/customers/index
     */
    public function index()
    {
        // Getting all customers and numbers of customers
        $customers = $this->customerModel->getAllCustomers();
        $numbers_of_customers = $this->customerModel->getNumberOfCustomers();

       // load views. within the views we can echo out $customers and $numbers_of_customers easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/customers/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addCustomer
     * This method handles what happens when you move to http://yourproject/customers/addCustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a customer" form on customers/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addCustomer()
    {
        // if we have POST data to create a new customer entry.
        if (isset($_POST["submit_add_customer"])) {

            // do customerModel() in model/customer.php
            $this->customerModel->addCustomer(

                $_POST["cust_name"], 
                $_POST["cust_email"],
                $_POST["cust_phone"],
                $_POST["cust_address"],
                $_POST["vehicle_id"],
                $_POST["branch_id"]  
            );
        }

        // Where to go after Customer has been added
        header('location: ' . URL . 'customers/index');
    }

    /**
     * ACTION: deleteCustomer
     * This method handles what happens when you move to http://yourproject/customer/deleteCustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a customer" button on customers/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $cust_id
     */
    public function deleteCustomer($cust_id)
    {
        // if we have an id of a customer that should be deleted
        if (isset($cust_id)) {
            
            $this->customerModel->deleteCustomer($cust_id);
        }

        // Where to go after customer has been deleted.
        header('location: ' . URL . 'customers/index');
    }

    /**
    * ACTION: editCustomer
    * This method handles what happens when you move to http://yourproject/customers/editCustomer
    * @param int $cust_id
    */
    public function editCustomer($cust_id)
    {
        // if we have an id of a customer that should be edited
        if (isset($cust_id)) {
            // do editCustomer() in model/customer.php
            $customer = $this->customerModel->getCustomer($cust_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $customers easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/customers/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // Redirect user to customers index page (as we don't have a cust_id)
            header('location: ' . URL . 'customers/index');
        }
    }
    
    /**
     * ACTION: updateCustomer
     * This method handles what happens when you move to http://yourproject/customers/updateCustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a customer" form on customers/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateCustomer()
    {

        // if we have POST data to customer detail entry.
        if (isset($_POST["submit_update_customer"])) {
            // do updateCustomer() from model/customer.php
            $this->customerModel->updateCustomer(
                $_POST["cust_name"], 
                $_POST["cust_email"], 
                $_POST["cust_phone"],
                $_POST["cust_address"],
                $_POST["vehicle_id"],
                $_POST["branch_id"], 
                $_POST["cust_id"] // We need ID to update data in model.
            );
        }

        // Where to go after customer has been updated.
        header('location: ' . URL . 'customers/index');
    }
}
