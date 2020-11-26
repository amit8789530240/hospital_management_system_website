<?php
session_start();
?>

<br>
<br>
<br>
<div class="w3-container">
    <table class="w3-table-all w3-centered">
        <thead>
        <tr class="w3-teal">
            <th>Patient's Name</th>
            <th>Patient's Id</th>
            <th>Mobile No</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Address</th>
            <th>&nbsp</th>

        </tr>
        </thead>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("unable to access remote database".mysqli_error());
}



$command = "SELECT * FROM patient_table";
$result = $conn->query($command);
if($result->num_rows<=0)
{
    echo "<tr><td><p class='w3-panel w3-red ' style='font-weight: bolder;height: 50px;text-align: center'>NO MORE PATIENTS</p></td></tr>";
}
else {
    while ($temp = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $temp['name'] . "</td>";
        echo "<td>" . $temp['patient_id'] . "</td>";
        echo "<td>" . $temp['mobile_no'] . "</td>";
        echo "<td>" . $temp['gender'] . "</td>";
        echo "<td>" . $temp['age'] . "</td>";
        echo "<td>" . $temp['address'] . "</td>";
        echo "<td></form><form id='del' action='delete_patient.php' method='POST'><input type='hidden' name='pid' value=".$temp['patient_id']."><input type=\"button\" onclick=\"if(confirm('Confirm REMOVAL of patient !!!'))document.getElementById('del').submit()\" class=\"w3-button w3-blue w3-round-xxlarge w3-hover-shadow w3-hover-red\" style=\"border: hidden\" value=\"Remove\"></form></td>";
        echo "</tr>";
    }
}
$conn->close();
?>
    </table>
    <a href='#'><button class='w3-button w3-hover-indigo w3-teal w3-round-large w3-margin'>Goto Dashboard</button></a>
</div>
