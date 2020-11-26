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

$command="SELECT * FROM patient_table WHERE patient_id='$current_user'";
$result=$conn->query($command);
if ($result->num_rows<=0)
{
    echo "<h2>no records found!!!</h2>";
    exit();
}
else{
    $row=$result->fetch_assoc();
    $GLOBALS["x"] =$row["name"];
    $GLOBALS["y"] =$row['patient_id'];

}






$conn->close();
?>


<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <script src="../angularjs_scripts/angular_script.js"></script>-->
<!---->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="../css/w3css_LATEST.css">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body ng-app="myapp4" ng-controller='myctrl4' >-->
<!---->
<!--<script>-->
<!---->
<!---->
<!--    var app=angular.module("myapp4",[]);-->
<!---->
<!--    app.controller("myctrl4",function ($scope,$http) {-->
<!---->
<!--        $http.get("fetch_appointments.php").-->
<!--        then(function (response) {-->
<!--            $scope.fetched_table=response.data;-->
<!---->
<!---->
<!--        })-->
<!---->
<!---->
<!--    })-->
<!--</script>-->
<!--{{ 10+20}}-->
<!--<body>-->
<div class='w3-card-4  w3-light-grey w3-animate-zoom' style="margin-top: 6%" >
    <br><br>
    <span style="margin-left: 10%; font-weight: bolder" class="w3-text-blue"><b>Name:</b> <?php echo $GLOBALS["x"]; ?></span>

    <br><br>
    <span style="margin-left: 10%;font-weight: bolder" class="w3-text-blue"><b>user_id:</b>  <?php echo $GLOBALS["y"]; ?></span>
    <br><br>
    <span style="margin-left: 10%;font-weight: bolder;font-size: 40px" class="w3-text-blue-gray">Appointments</span>

<!--        {{fetched_table}}-->

    <table class="w3-table-all w3-centered" style="width: auto;margin-left: 10%">
        <thead>
        <tr class="w3-green w3-card-4">
            <th>Patient's Name</th>
            <th>Appointment Date [yyyy-mm-dd]</th>
            <th>Appointed Dcotor</th>
            <th>Specialization</th>
            <th>Fee</th>
            <th>&nbsp</th>
        </tr>
        </thead>
        <tr ng-repeat="x in fetched_table">
            <td>{{x.A}}</td>
            <td>{{x.B}}</td>
            <td>{{x.C}}</td>
            <td>{{x.D}}</td>
            <td>{{x.F}}</td>
            <td>
                <form id="del" method="POST" action="delete_appointment_record.php">
                <input type="hidden" name="pid" value="<?php echo $_SESSION['patient_id'] ?>">
                <input type="hidden" name="appointment_date" value={{x.B}}>
                <input type="hidden" name="appointed_doctor" value={{x.C}}>
                <input type="button" onclick="if(confirm('Confirm Appointment Cancellation !!!'))document.getElementById('del').submit()" class="w3-button w3-blue w3-round-xxlarge w3-hover-indigo" style="border: hidden" value="Cancel Appointment">
                </form>
            </td>
        </tr>



    </table>
    
    <br><br><br><br><br><br><br><br><br><br><br><br>

</div>
<!--</body>-->
<!--</html>-->
