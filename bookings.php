<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/navbar2.css">
    <link rel="stylesheet" href="./style/bookings.css">
    <link rel="stylesheet" href="./style/footer.css">
    <!-- <link rel="stylesheet" href="./style/index2.css"> -->
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>SkyKosovo</title>
</head>

<body>
    <?php include("common/navbar.php"); ?>

    <h1>My bookings</h1>
    <?php
    // Include config file
    require_once "./common/config.php";

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $userID = $_SESSION["id"];

        if ($userID == '13') {
            // Attempt select query execution
            $sql = "SELECT * FROM reservations";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=2;>";
                    echo "<tr><th>Reservation ID</th> <th>Fare choice</th> <th>Departure location</th> <th>Arrival location</th> <th>Departure date</th> <th>Return date</th> <th>Adults</th> <th>Children</th> <th>Infants</th> <th>Actions</th> </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['reservationID'] . "</td>";
                        echo "<td>" . $row['fare_choice'] . "</td>";
                        echo "<td>" . $row['departure_location'] . "</td>";
                        echo "<td>" . $row['arrival_location'] . "</td>";
                        echo "<td>" . $row['departure_date'] . "</td>";
                        echo "<td>" . $row['return_date'] . "</td>";
                        echo "<td>" . $row['adults'] . "</td>";
                        echo "<td>" . $row['children'] . "</td>";
                        echo "<td>" . $row['infants'] . "</td>";
                        echo "<td class='actions'> <form action='./updateData.php' method='POST'><input type='hidden' name='reservationID' value='" . $row['reservationID'] . "'</input><button id='myBtn'>Edit</button></form> <form action='./common/deleteData.php' method='POST'><input type='hidden' name='reservationID' value='" . $row['reservationID'] . "'</input><button>Delete</button></form>";
                        // echo "<td> <button id='myBtn'>Edit</button> <form action='./common/deleteData.php' method='POST'><input type='hidden' name='reservationID' value='" . $row['reservationID'] . "'</input><button>Delete</button></form>";
                        // echo "<td> <button class='edit-btn'>Edit</button> <form action='./common/deleteData.php' method='POST'><input type='hidden' name='reservationID' value='" . $row['reservationID'] . "'</input><button>Delete</button></form>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "You haven't done any reservations yet.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            

        } else {
            $sql = "SELECT * FROM reservations WHERE userID = '$userID'";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border=2;>";
                    echo "<tr><th>Reservation ID</th> <th>Fare choice</th> <th>Departure location</th> <th>Arrival location</th> <th>Departure date</th> <th>Return date</th> <th>Adults</th> <th>Children</th> <th>Infants</th> </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['reservationID'] . "</td>";
                        echo "<td>" . $row['fare_choice'] . "</td>";
                        echo "<td>" . $row['departure_location'] . "</td>";
                        echo "<td>" . $row['arrival_location'] . "</td>";
                        echo "<td>" . $row['departure_date'] . "</td>";
                        echo "<td>" . $row['return_date'] . "</td>";
                        echo "<td>" . $row['adults'] . "</td>";
                        echo "<td>" . $row['children'] . "</td>";
                        echo "<td>" . $row['infants'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "You haven't done any reservations yet.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }
        

    }



    // Close connection
    mysqli_close($link);
    ?>


    <script src="./js/modal.js"></script>
</body>

</html>