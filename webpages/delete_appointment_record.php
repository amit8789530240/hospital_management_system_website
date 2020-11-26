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
    die("unable to access remote database");
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $pid=test_input($_POST['pid']);
    $appointment_date=test_input($_POST['appointment_date']);
    $appointed_doctor=test_input($_POST['appointed_doctor']);
    $command="DELETE FROM appointment_table WHERE patient_id='$pid' AND date='$appointment_date' AND appointed_doctor='$appointed_doctor'";
    if($conn->query($command)===TRUE)
    {
        $conn->close();
        echo "<script>history.back()</script>";
    }
    else{
        $conn->close();
        echo "<script>if(confirm('failed to acces remote database'))history.back();else history.back()</script>";
    }
}
?>

