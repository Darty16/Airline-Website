
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./style/navbar2.css">
		<link rel="stylesheet" href="./style/index2.css">
		<link rel="stylesheet" href="./style/footer.css">
		<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css
			integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

		<title>SkyKosovo</title>
	</head>

	<body>
		<?php include("common/navbar.php"); ?>

		<div class="banner">
			<!-- <h1>Fly higher!</h1> -->
			<div class="booking-form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="formValidation()">
					<h2>Book your next flight</h2>
					<div class="fareChoice">
						<h6>Select your Fare <span style="color: red;">*</span></h6>
						<ul>
							<!-- fix it in the database se del vec on -->
							<li>
								<input type="radio" id="a-option" name="fare_choice" value="one-way" onchange="checkReturn()">
								<label for="a-option">One Way</label>
							</li>
							<li>
								<input type="radio" id="b-option" name="fare_choice" value="round-trip" onchange="checkReturn()">
								<label for="b-option">Round-Trip</label>

							</li>
						</ul>

					</div>
					<div class="doubleRow">
						<div class="doubleInput">
							<select class="form-control" id="departureLocation" name="departure_location" required>
								<option value="">From</option>
								<option value="Tirana">Tirana</option>
								<option value="Pristina">Pristina</option>
								<option value="Rome">Rome</option>
								<option value="Berlin">Berlin</option>
								<option value="Paris">Paris</option>
								<option value="Zagreb">Zagreb</option>
							</select>
							<p id="departureLocationError">error message</p>
						</div>
						<div class="doubleInput">
							<select class="form-control" id="arrivalLocation" name="arrival_location" required>
								<option value="">To</option>
								<option value="Tirana">Tirana</option>
								<option value="Pristina">Pristina</option>
								<option value="Rome">Rome</option>
								<option value="Berlin">Berlin</option>
								<option value="Paris">Paris</option>
								<option value="Zagreb">Zagreb</option>
							</select>
							<p>error message</p>

						</div>
					</div>

					<div class="doubleRow">
						<div class="doubleInput">
							<input id="departureDate" name="departure_date" type="date" placeholder="Departure Date" min="<?php echo date('Y-m-d'); ?>"
								class="datepicker" required>
							<p>error message</p>

						</div>
						<div class="doubleInput">
							<input type="date" id="returnDate" name="return_date" placeholder="Return Date" 
								class="datepicker">
							<p>error message</p>

						</div>
					</div>

					<div class="passengerData">
						<div class="passenger">
							<select class="form-control" id="adults" name="adults" required>
								<option value="">Adult(12+ Yrs)</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
						</div>
						<div class="passenger">
							<select class="form-control" id="children" name="children" disabled>
								<option value="">Children(2-11 Yrs)</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
						</div>
						<div class="passenger">
							<select class="form-control" id="infants" name="infants" disabled>
								<option value="">Infant(under 2Yrs)</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						
					</div>
					<small>Children and infants must be accompanied by at least one adult</small><br>
                    <input type="hidden" id="userID" name="userID" >

					<input type="submit" value="Submit"
						class="<?php echo (isset($_SESSION["loggedin"])) ? "activated" : "disabled" ?>">
					<p class="notify"
						style="<?php echo (isset($_SESSION["loggedin"])) ? "opacity: 0" : "opacity: 1" ?>">Please log in
						to make a reservation</p>

				</form>
			</div>
		</div>

		<div class="advantages">
			<div class="container">
				<div class="reasons">
					<div class="reason">
						<div class="icon">
							<i class="fa-solid fa-route"></i>
						</div>
						<div class="description">
							<div class="descTitle">Extensive Route Network</div>
							<div class="descParagraph">SkyKosovo offers an extensive route network covering a wide range
								of destinations, both domestic and international, providing travelers with more options
								to choose from and the flexibility to plan their travel as per their convenience.</div>
						</div>
					</div>
					<div class="reason">
						<div class="icon">
						<i class="fa-solid fa-dollar-sign"></i>
						</div>
						<div class="description">
							<div class="descTitle">Competitive Fares</div>
							<div class="descParagraph">SkyKosovo offers competitive fares, ensuring that travelers get
								the best value for their money. With its affordable pricing strategy, it has made air
								travel more accessible to a wider range of travelers, including budget-conscious
								travelers.</div>
						</div>
					</div>
					<div class="reason">
						<div class="icon">
						<i class="fa-solid fa-phone"></i>
						</div>
						<div class="description">
							<div class="descTitle">Top Customer Service</div>
							<div class="descParagraph">SkyKosovo takes pride in its exceptional customer service. Its
								dedicated customer support team is available 24/7 to assist travelers with their queries
								and concerns, ensuring a hassle-free travel experience from start to finish.</div>
						</div>
					</div>
					<div class="reason">
						<div class="icon">
						<i class="fa-solid fa-plane-up"></i>
						</div>
						<div class="description">
							<div class="descTitle">Modern Fleet and Comfort</div>
							<div class="descParagraph">SkyKosovo boasts of a modern fleet of aircraft equipped with the
								latest technology and amenities to provide travelers with a comfortable and safe
								journey. We ensure that every traveler has a memorable flying experience.</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include("common/footer.php"); ?>

		<script src="js/reservation.js">
			
		</script>
	</body>
</html>

<?php 

// Include config file
require_once "./common/config.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    
    // Process form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userID = $_SESSION["id"];

        // header("location: offers.php");
        // exit;
        $fare_choice = $_POST["fare_choice"];
        $departure_location = $_POST["departure_location"];
        $arrival_location = $_POST["arrival_location"];
        $departure_date = $_POST["departure_date"];
        $return_date = $_POST["return_date"];
        $adults = $_POST["adults"];
        $children = $_POST["children"];
        $infants = $_POST["infants"];

        // Prepare an insert statement
        $sql = "INSERT INTO reservations (userID, fare_choice, departure_location, arrival_location, departure_date, return_date, adults, children, infants) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "isssssiii", $userID, $fare_choice, $departure_location, $arrival_location, $departure_date, $return_date, $adults, $children, $infants);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to success page
                header("location: bookings.php");
				// exit();
            } else {
                echo "Error: " . mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
	}
}
// Close connection
mysqli_close($link);

?>