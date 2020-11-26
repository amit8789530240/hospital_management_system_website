<?php
session_start();
?>
<?php

$servername="localhost";
$username="root";
$password="";
$dbname="hospital_management";

$conn=new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error)
{
    die("unable to access remote database");
}

$current_user=$_SESSION["patient_id"];
$command="SELECT A.patient_name,A.date,A.appointed_doctor,D.specialization,D.consultation_fee FROM appointment_table A,doctor_table D WHERE A.patient_id='$current_user' AND A.doctor_id=D.doctor_id";
$result=$conn->query($command);
if ($result->num_rows>0)
{
    $table_data=array();
    while ($temp=$result->fetch_assoc())
    {
        array_push($table_data,array("A"=>$temp['patient_name'],"B"=>$temp['date'],"C"=>$temp['appointed_doctor'],"D"=>$temp['specialization'],"F"=>$temp['consultation_fee']));


    }
    echo json_encode($table_data);
}
else
{
    echo "server side error occured";
}

$conn->close();
?>

