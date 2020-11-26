<?php
session_start();
?>

<div class='w3-card-4  w3-light-grey w3-animate-zoom w3-container' style="margin-top: 6%;width: auto;height: 550px">
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="hospital_management";

    $conn=new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error) {
        die("failed to login");
    }
    $x=$conn->query("SELECT name FROM patient_table WHERE patient_id='$_SESSION[patient_id]'");
    $x=$x->fetch_assoc();
    $x=$x['name'];


    $command="SELECT * FROM doctor_table";
    $result=$conn->query($command);
    if($result->num_rows>0)
    {
        echo "<h3 class='w3-text-blue-grey' style='margin-left: 0%;font-weight: bolder'>Available Doctors' List</h3>";
        echo "<table class='w3-table-all w3-left' style='width: auto;margin-top: inherit'>
    <thead>
    <tr class='w3-teal w3-card-4 '>
       <th>Name</th>
       <th>Contact</th>
       <th>Email</th>
       <th>Specialization</th>
       <th>Consultation Fee</th>
       <th>&nbsp&nbsp&nbsp Date </th>
       
    </tr>
    </thead>";
//     $prompt_msg="Do you really want to book appointment?";
        while($temp=$result->fetch_assoc())
        {

            echo "<tr>";

            echo "<td>".$temp['name']."</td>";
            echo "<td>".$temp['mobile_no']."</td>";
            echo "<td>".$temp['doctor_id']."</td>";
            echo "<td>".$temp['specialization']."</td>";
            echo "<td>".$temp['consultation_fee']."</td>";
            echo "<td><form onsubmit='return confirm(\" Do you really want to Book APPOINTMNET?\"  )' action=".htmlspecialchars('complete_appointment_booking.php')." method='POST' id='book'><input type='date' name='appointment_date' required>";

            echo "<input type='hidden' name='pid' value=".$_SESSION['patient_id'].">
<input type='hidden' name='pname' value="."\"".$x."\"".">
<input type='hidden' name='appointed_doctor' value="."\"".$temp['name']."\"".">
<input type='hidden' name='doctor_id' value=".$temp['doctor_id']."><button class='w3-button w3-blue w3-round-xxlarge w3-hover-indigo' style='border: none' >Book Appointment</button></form></td> ";
            echo "</tr>";

        }
        echo "</table>";
    }

    ?>




