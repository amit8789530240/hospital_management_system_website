<?php
session_start();
?>
<?php
function test_input($data)
{
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}


$servername="localhost";
$username="root";
$password="";
$dbname="hospital_management";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error)
{
die("cannot connected to remote database:".mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$date=$patient_id=$patient_name=$appointed_doctor=$doctor_id="";
$date=test_input($_POST["appointment_date"]);
$patient_id=test_input($_POST["pid"]);
$patient_name=test_input($_POST["pname"]);
$appointed_doctor=test_input($_POST["appointed_doctor"]);
$doctor_id=test_input($_POST["doctor_id"]);

$sql="INSERT INTO appointment_table(date,patient_id,patient_name,appointed_doctor,doctor_id) values('$date','$patient_id','$patient_name','$appointed_doctor','$doctor_id')";
if ($conn->query($sql)===TRUE)
{

$conn->close();
echo "<script>alert('Appointment Booked')</script>";
echo "<script>history.back()</script>";
}
else
{
echo "<script>alert('cannot have same appointments on the same date')</script>";

$conn->close();
echo "<script>history.back()</script>";

}
}
?>
