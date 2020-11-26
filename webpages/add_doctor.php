<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button{
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div style="margin-left: 20%;margin-right: 20%" class="w3-panel w3-pale-blue w3-leftbar w3-topbar w3-round-xxlarge w3-border-blue">
            <table class="w3-margin" style="border-collapse: separate;border-spacing: 0 15px">
                <tr>
                    <td >Doctor's Name &nbsp&nbsp:</td>
                    <td ><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Doctor's Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
                    <td><input type="email" name="doctor_id" required></td>
                </tr>
                <tr>
                    <td>Mobile No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
                    <td><input type="number" name="mobile_no" required></td>
                </tr>

                <tr>
                    <td>Specialization &nbsp&nbsp&nbsp:</td>
                    <td><input type="text" name="specialization" required></td>
                </tr>
                <tr>
                    <td>Consultation Fee:</td>
                    <td><input type="number" name="consultation_fee" required></td>
                </tr><tr>
                    <td>Password:</td>
                    <td><input type="text" name="password" required></td>
                </tr>


            </table>
            <button type="submit" class="w3-button w3-teal w3-round-xxlarge">Add Doctor</button>
            <a href="#"><button class="w3-button w3-teal w3-round-xxlarge">Goto dashboard</button></a>
        </div>
    </form>
</div>

</body>
</html>
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
    die("unable to connect to remote database !!!!");
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $name=test_input($_POST['name']);
    $doctor_id=test_input($_POST['doctor_id']);
    $mobile_no=test_input($_POST['mobile_no']);
    $specialization=test_input($_POST['specialization']);
    $consultation_fee=test_input($_POST['consultation_fee']);
    $password=test_input($_POST['password']);
    $command="INSERT INTO doctor_table(name,doctor_id,mobile_no,specialization,consultation_fee) VALUES('$name','$doctor_id','$mobile_no','$specialization','$consultation_fee')";
    $command2="INSERT INTO password_table(identity,user_id,password) VALUES('doctor','$doctor_id','$password')";

    if($conn->query($command)==TRUE && $conn->query($command2)==TRUE)
    {
        $conn->close();
//            echo "<script>if(confirm('you are succesfully registered')){document.myform.reset()}else{document.myform.reset()}</script>";
        echo "<script>if(confirm('SUCCESSFULLY REGISTERED')){history.back()}else{history.back()}</script>";
    }
    else
    {
        $conn->close();
        echo "<script>alert('FAILED TO REGISTER')</script>";
    }
}

?>