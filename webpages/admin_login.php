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
    <script src="../angularjs_scripts/angular_script.js"></script>
    <script src="../angularjs_scripts/angular_routing_script.js"></script>
    <link rel="stylesheet" href="../css/W3Schools.css">
    <link rel="stylesheet" href="../css/w3_fonts_and_css.css">
    <title>ADMINISTRATOR</title>
    <script>
        var app=angular.module("myapp",["ngRoute"]);
        app.config(function ($routeProvider) {
            $routeProvider
                .when("/",{
                    templateUrl:"admin_dashboard.html",

                })
                .when("/manage_doctor",{
                    templateUrl: "manage_doctor.php",
                })
                .when("/edit_doctor",{
                    templateUrl: "edit_doctor.php",
                    queryParams:{'did':'sumit909190@gmail.com'}
                })
                .when("/manage_queries",{
                    templateUrl: "manage_queries.php"
                })
                .when("/manage_patients",{
                    templateUrl: "manage_patients.php"
                })
                .when("/manage_appointments",{
                    templateUrl: "manage_appointments.php"
                })
                .when("/add_doctor",{
                    templateUrl: "add_doctor.php"
                })




        });
        app.controller("myctrl",function ($scope) {
            $scope.check_password=function () {
                if (!(angular.equals($scope.x,$scope.y)))
                {
                    $scope.errmsg="please confirm the password";
                    $scope.shouldDisable=true;

                }
                else{
                    $scope.shouldDisable=false;

                    $scope.errmsg="";
                }

            }
        })
    </script>
    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "12%";
            document.getElementById("mySidebar").style.width = "12%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }
        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "block";
        }
    </script>
</head>
<body ng-app="myapp" ng-controller="myctrl" ng-init="header_msg='Admin Dashboard'">


<div class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-text-white w3-teal" style="display:none; background-color: #009973" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large w3-hover-blue-gray"
            onclick="w3_close()">Close &times;</button>
    <br>
    <a href="#" class="w3-bar-item w3-button w3-hover-indigo"><b>Dashboard</b></a>
    <a href="#!add_doctor" class="w3-bar-item w3-button w3-hover-indigo"><b>Add Doctors</b></a>
    <a href="../default.html" class="w3-bar-item w3-button w3-hover-indigo"><b>Log Out</b></a>
</div>

<div id="main">

    <div class="w3-teal" style="height: 80px;position: fixed;width: 100%">
        <button id="openNav"   class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <h1 style="display: inline; margin-left: 50px;position: fixed" class="w3-top">{{header_msg}}</h1>
            <div class="w3-dropdown-hover w3-right" style="margin-top:-10px" >
                <img src="../media/admin.jpg" style="position:-webkit-sticky" class=" w3-round-xxlarge w3-margin" width="55px" height="55px">


                <div class="w3-dropdown-content w3-bar-block w3-card-4 " style="position:-webkit-sticky">
                    <button style="width: auto" onclick="document.getElementById('chngpswd').style.display='block'" class="w3-button w3-bar-item  w3-hover-teal" >Change Password</button>
<!--                    <a href="#" class="w3-bar-item w3-button" >Change Passowrd</a>-->
                    <a href="../default.html" class="w3-bar-item w3-button">Log Out</a>

                </div>
            </div>
        </div>
    </div>
    <div class="w3-container w3-card-4" style="width: 100%;margin-top: initial;height: 70ex">
        <br>
        <br>
        <br>
        <br>
        <ng-view>

        </ng-view>
    </div>
</div>



    <div id="chngpswd" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:30%">

            <div class="w3-center"><br>
                <span onclick="document.getElementById('chngpswd').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <img src="../media/change_password.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
            </div>

            <form class="w3-container" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="w3-section">
                    <label><b>Old password</b></label>
                    <input class="w3-input w3-border w3-margin-bottom w3-round-xxlarge" type="password" placeholder="Enter old password" name="oldpswd" required>
                    <label><b>New Password</b></label>
                    <input class="w3-input w3-border w3-round-xxlarge" type="password" ng-model="x" ng-change="check_password()" placeholder="Enter new password" name="newpswd" required>
                    <label><b>Re-enter new Password</b></label>
                    <input class="w3-input w3-border w3-round-xxlarge" type="password" ng-model="y" ng-change="check_password()" placeholder="Confirm new password" name="confirmnewpswd" required>
                    <span class="w3-red">{{errmsg}}</span>
                    <button ng-disabled='shouldDisable' class="w3-button w3-block w3-green w3-section w3-padding w3-hover-indigo w3-round-xxlarge" type="submit" >Proceed</button>

                    <!--                <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me-->
                </div>
            </form>

            <!--        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">-->
            <button onclick="document.getElementById('chngpswd').style.display='none'" type="button" class="w3-round-xxlarge w3-button w3-red w3-margin w3-round-xxlarge">Cancel</button>
            <!--            <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>-->
            <!--        </div>-->

        </div>
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
    die("unable to access remote database");
}



if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $current_user=$_SESSION["admin_id"];
    $command="SELECT password FROM password_table WHERE user_id='$current_user'";
    $current_password=test_input($_POST["oldpswd"]);
//    echo $current_password;
    $new_password=test_input($_POST["newpswd"]);
//    echo $new_password;
    $result=$conn->query($command);
    $temp=$result->fetch_assoc();
    if(strcmp($current_password,$temp['password'])==0)
    {
        $command="UPDATE password_table SET password='$new_password' WHERE user_id='$current_user'";
        if(mysqli_query($conn,$command))
            echo "<script>alert('password succesgfully changed')</script>";
        else
            echo "<script>alert('CANNOT ACCESS DATABASE !!!!')</script>";
    }
    else
        echo "<script>alert('INVALID CREDENTIALS !!!')</script>";

}
//else
//    echo "<script>alert('INSECURED OBJECTS RECEIVED... cannot process further :(')</script>";

$conn->close();
?>

