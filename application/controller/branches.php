<?php

/**
 *
 * Class Branches
 * This is a branch controller to demonstrate the basic CRUD (Create/Read/Update/Delete) actions.
 */
class Branches extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/branches/index
     */
    public function index()
    {
        // Getting all branches and amount of branches
        $branches = $this->branchModel->getAllBranches();
        $amount_of_branches = $this->branchModel->getAmountOfBranches();

       // load views. within the views we can echo out $branches and $amount_of_branches easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/branches/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addBranch
     * This method handles what happens when you move to http://yourproject/branches/addBranch
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a branch" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addBranch()
    {
        // if we have POST data to create a new branch entry.
        if (isset($_POST["submit_add_branch"])) {

            // do branchModel() in model/branch.php
            $this->branchModel->addBranch(

                $_POST["branch_name"], 
                $_POST["branch_phone"], 
                $_POST["branch_email"]
            );
        }

        // where to go after branch has been added
        header('location: ' . URL . 'branches/index');
    }

    /**
     * ACTION: deleteBranch
     * This method handles what happens when you move to http://yourproject/branches/deleteBranch
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a branch" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to branches/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $branch_id
     */
    public function deleteBranch($branch_id)
    {
        // if we have an id of a branch that should be deleted
        if (isset($branch_id)) {
            // do deleteBranch() in model/branch.php
            $this->branchModel->deleteBranch($branch_id);
        }

        // where to go after branch has been deleted
        header('location: ' . URL . 'branches/index');
    }

    /**
    * ACTION: editBranch
    * This method handles what happens when you move to http://yourproject/branches/editBranch
    * @param int $brannch_id
    */
    public function editBranch($branch_id)
    {
        // if we have an id of a branch that should be edited
        if (isset($branch_id)) {
            // do getBranch() in model/branch.php
            $branch = $this->branchModel->getBranch($branch_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/branches/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to branches index page (as we don't have a branch_id)
            header('location: ' . URL . 'branches/index');
        }
    }
    
    /**
     * ACTION: updateBranch
     * This method handles what happens when you move to http://yourproject/branches/updateBranches
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a branch" form on branches/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to branches/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateBranch()
    {

        // if we have POST data to branch detail entry.
        if (isset($_POST["submit_update_branch"])) {
            // do updateBranch() from model/branch.php
            $this->branchModel->updateBranch(
                $_POST["branch_name"], 
                $_POST["branch_phone"],  
                $_POST["branch_email"], 
                $_POST["branch_id"] // We need ID to update data in model.
            );
        }

        // where to go after branch has been updated.
        header('location: ' . URL . 'branches/index');
    }

}
