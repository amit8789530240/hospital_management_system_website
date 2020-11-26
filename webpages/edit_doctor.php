<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button{
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Document</title>

<link rel="stylesheet" href="../css/W3Schools.css">
<script>
function make_editable()
{
if(document.getElementById('change').value!="Make Changes")
{
    document.getElementById('change').type='submit';
}
else
{
document.doctor.name.disabled=false;
document.doctor.doctor_id.disabled=false;
document.getElementById('03').disabled=false;
document.getElementById('04').disabled=false;
document.getElementById('05').disabled=false;

document.getElementById('change').value="Confirm change";
}
}
</script>
</head>
<body class="w3-light-gray">

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("unable to access remote database".mysqli_error());
}



$did=$_GET['did'];
$command = "SELECT * FROM doctor_table WHERE doctor_id='$did'";
$result = $conn->query($command);
if($result->num_rows<=0)
{
    echo "<tr><td><p class='w3-panel w3-red ' style='font-weight: bolder;height: 50px;text-align: center'>Server side error occured :(</p></td></tr>";
}
else
{

   $temp = $result->fetch_assoc();

    echo "<br><br><br><div style='width: 34%' class=\"w3-container w3-light-blue w3-round-xxlarge w3-center w3-display-middle w3-card-4\"><br><br><form name='doctor' method='POST' action="."complete_edit_doctor.php".">
    
        Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input id='01' type=\"text\" name=\"name\" disabled value=\"".$temp['name']."\"><br>
        <br>User Id &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input id='02' type=\"text\" name=\"doctor_id\" disabled value=\"".$temp['doctor_id']."\"><br>
        <br>Mobile No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input id='03' type=\"number\" name=\"mobile_no\" disabled value=\"".$temp['mobile_no']."\"><br>
        <br>Specialization &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input id='04' type=\"text\" name=\"specialization\" disabled value=\"".$temp['specialization']."\"><br>
        <br>Consulation Fee &nbsp&nbsp&nbsp&nbsp: <input id='05' type=\"number\" name=\"consultation_fee\" disabled value=\"".$temp['consultation_fee']."\"><br>
 <br><br><input style='float:left;' type='button' id='change' class='w3-button w3-green w3-hover-shadow w3-hover-teal w3-round-xxlarge' value='Make Changes' onclick='make_editable()'>  
 <input type='hidden' name='did' value='$did'>
</form> 
<a style='float: right' href='admin_login.php#!/manage_doctor'><button  class='w3-button w3-green w3-hover-shadow w3-hover-teal w3-round-xxlarge'>Done</button></a>
<br><br>
</div>";

}


?>




</body>
</html>
