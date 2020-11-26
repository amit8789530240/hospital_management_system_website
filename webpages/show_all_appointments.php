<?php
session_start();
?>
<?php


?>

<div class="w3-container">
    <table class="w3-table-all">
        <thead>
        <tr class="w3-teal">
            <th>Patient's Name</th>
            <th>Mobile No.</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Address</th>
            <th>Date</th>
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

        $current_user=$_SESSION["doctor_id"];

        $command = "select p.name,p.mobile_no,p.gender,p.age,p.address,a.date from patient_table p,appointment_table a where p.patient_id=a.patient_id AND a.doctor_id='$current_user'";
        $result = $conn->query($command);
        if($result->num_rows<=0)
        {
            echo "<tr><td><p class='w3-panel w3-red ' style='font-weight: bolder;height: 50px;text-align: center'>NO APPOINTMENTS TODAY</p></td></tr>";
        }
        else {
            while ($temp = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $temp['name'] . "</td>";
                echo "<td>" . $temp['mobile_no'] . "</td>";
                echo "<td>" . $temp['gender'] . "</td>";
                echo "<td>" . $temp['age'] . "</td>";
                echo "<td>" . $temp['address'] . "</td>";
                echo "<td>" . $temp['date'] . "</td>";
                echo "</tr>";
            }
        }
        $conn->close();
        ?>
    </table>
    <a href='#'><button class='w3-button w3-hover-indigo w3-teal w3-round-large w3-margin'>Goto Dashboard</button></a>
</div>
