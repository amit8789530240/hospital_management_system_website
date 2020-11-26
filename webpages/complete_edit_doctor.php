<?php
session_start()
?>

<?php
function test_input($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("unable to access remote database".mysqli_error());
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $did=test_input($_POST['did']);
    $name=test_input($_POST['name']);
    $doctor_id=test_input($_POST['doctor_id']);
    $mobile_no=test_input($_POST['mobile_no']);
    $specialization=test_input($_POST['specialization']);
    $consultation_fee=test_input($_POST['consultation_fee']);

    $update_cmd="UPDATE doctor_table SET name='$name',doctor_id='$doctor_id',mobile_no='$mobile_no',specialization='$specialization',consultation_fee='$consultation_fee' WHERE doctor_id='$did'";
    if ($conn->query($update_cmd)===TRUE)
    {

        $conn->close();
        echo "<script>alert('Details updated')</script>";
        if(strcmp($did,$doctor_id)==0)
       echo "<script>history.back()</script>";
        else
        echo "<script>window.location.href='admin_login.php#!/manage_doctor'</script>";
    }
}
else
{
    $conn->close();
}



?>
