<?php
// require the configuration file
require_once "./config.php";

if (isset($_POST['reservationID'])) {
    // get the reservationID variable
    
    $reservationID = $_POST["reservationID"];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get form values
        $fare_choice =$_POST['fare_choice'];
        $departure_location = $_POST['departure_location'];
        $arrival_location = $_POST['arrival_location'];
        $departure_date = $_POST['departure_date'];
        $return_date = $_POST['return_date'];
        $adults = $_POST['adults'];
        // $children = $_POST['children'];
        // $infants = $_POST['infants'];

        if (isset($_POST['children'])) {
            $children = $_POST['children'];
        } else {
            $children = 0; // or whatever default value you want
        }
        
        if (isset($_POST['infants'])) {
            $infants = $_POST['infants'];
        } else {
            $infants = 0; // or whatever default value you want
        }

        // $children = $_POST['children'];

        // update the reservation with the given reservation ID
        $sql = "UPDATE reservations SET fare_choice='$fare_choice', departure_location='$departure_location', arrival_location='$arrival_location', departure_date='$departure_date', return_date='$return_date', adults='$adults', children='$children', infants='$infants' WHERE reservationID = '$reservationID'";

        // execute the update query
        if (mysqli_query($link, $sql)) {
            // echo "Reservation updated successfully.";
            // echo "<script>alert($departure_location, $adults, $infants, $children)</script>";
            header('location: ../bookings.php');
        } else {
            echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
        }
    }
} else {
    // show if there is no reservation with that id
    echo "No reservationID received.";
}


mysqli_close($link);

?>