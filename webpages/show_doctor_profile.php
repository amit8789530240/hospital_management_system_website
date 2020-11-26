<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("unable to access remote database".mysqli_error());
}

$current_user=$_SESSION["doctor_id"];

$command = "SELECT * FROM doctor_table WHERE doctor_id='$current_user'";
$result = $conn->query($command);
$result=$result->fetch_assoc();

echo "<div class='w3-container w3-card-4 w3-border w3-round-large w3-border-cyan w3-animate-top w3-rightbar w3-leftbar' style='margin-top: -5%'>";
echo "<br>";
echo "<p align='center' style='font-weight: bolder' class='w3-text-teal'>Personnel Details..</p>";
echo "<br>";
echo "<label class='w3-text-purple' style='font-weight: bolder'>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>";
echo "<span class='w3-text-brown' style='font-weight: bold'>&nbsp&nbsp&nbsp".$result["name"]."</span><br><br>";
echo "<label class='w3-text-purple' style='font-weight: bolder'>Email / User Id &nbsp&nbsp&nbsp&nbsp:</label>";
echo "<span class='w3-text-brown' style='font-weight: bold'>&nbsp&nbsp&nbsp".$result["doctor_id"]."</span><br><br>";

echo "<label class='w3-text-purple' style='font-weight: bolder'>Specialization&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label>";
echo "<span class='w3-text-brown' style='font-weight: bold'>&nbsp&nbsp&nbsp".$result["specialization"]."</span><br><br>";
echo "<label class='w3-text-purple' style='font-weight: bolder'>Contact Number&nbsp&nbsp&nbsp:</label>";
echo "<span class='w3-text-brown' style='font-weight: bold'>&nbsp&nbsp&nbsp".$result["mobile_no"]."</span><br><br>";
echo "<label class='w3-text-purple' style='font-weight: bolder'>Consultation Fee&nbsp&nbsp:</label>";
echo "<span class='w3-text-brown' style='font-weight: bold'>&nbsp&nbsp&nbsp".$result["consultation_fee"]."</span><br><br>";
echo "<br>";
echo "<a href='#'><button class='w3-button w3-hover-indigo w3-teal w3-round-large w3-margin'>Goto Dashboard</button></a>";
echo "</div>";
$conn->close();
?>

