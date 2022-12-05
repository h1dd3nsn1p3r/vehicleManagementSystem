<?php

/**
 * Class Vehicles
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Vehicles extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // getting all songs and amount of songs
        $vehicles = $this->model->getAllVehicles();
        $amount_of_vehicles = $this->model->getAmountOfVehicles();

       // load views. within the views we can echo out $songs and $amount_of_vehicles easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/vehicles/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addVehicles
     * This method handles what happens when you move to http://yourproject/vehicles/addVehicles
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addVehicles()
    {
        // if we have POST data to create a new vehicle entry.
        if (isset($_POST["submit_add_vechile"])) {

            // do addVehicles() in model/model.php
            $this->model->addVehicles(

                $_POST["vec_name"], 
                $_POST["model"],  
                $_POST["price"], 
                $_POST["mfd_date"], 
                $_POST["color_id"], 
                $_POST["branch_id"]
            );
        }

        // where to go after song has been added
        header('location: ' . URL . 'vehicles/index');
    }

    /**
     * ACTION: deleteVehicle
     * This method handles what happens when you move to http://yourproject/vehicles/deleteVehicle
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
    public function deleteVehicle($vec_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($vec_id)) {
            // do deleteSong() in model/model.php
            $this->model->deleteVehicle($vec_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'vehicles/index');
    }

     /**
     * ACTION: editSong
     * This method handles what happens when you move to http://yourproject/songs/editsong
     * @param int $song_id Id of the to-edit song
     */
    public function editSong($song_id)
    {
        // if we have an id of a song that should be edited
        if (isset($song_id)) {
            // do getSong() in model/model.php
            $song = $this->model->getSong($song_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/songs/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'vehicles/index');
        }
    }
    
    /**
     * ACTION: updateSong
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateSong()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_song"])) {
            // do updateSong() from model/model.php
            $this->model->updateSong($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'vehicles/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * @since 1.0.0
     */
    public function ajaxGetStats()
    {
        $amount_of_vehicles = $this->model->getAmountOfVehicles();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_vehicles;
    }

}
