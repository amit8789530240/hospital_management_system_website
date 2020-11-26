<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../angularjs_scripts/angular_script.js"></script>


    <link rel="stylesheet" href="../css/w3css_LATEST.css">
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button{
            -webkit-appearance: none;
            margin: 0;
        }
        textarea{
            resize: none;
        }
    </style>
    <script>
        if (window.history.replaceState)
        {
            window.history.replaceState(null,null,window.location.href);
        }
        angular.module("myapp2",[]).controller("myctrl2",function ($scope) {
            $scope.check_password=function () {
                if (!(angular.equals($scope.x,$scope.y)))
                {
                    $scope.msg="Passowrd Mismatch";
                    $scope.should_disable=true;

                }
                else{
                    $scope.should_disable=false;

                    $scope.msg="";
                }

            }

        })
    </script>
</head>
<body ng-app="myapp2" ng-controller="myctrl2" ng-init="shall_show=false;should_disable=false">

<div class="w3-card-4 w3-margin" >
    <div class="w3-container w3-teal w3-round-large">
        <h2>New User Registration</h2>
    </div>
    <form class="w3-container" name="myform" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> style="margin-top: 2%" >
    <div style="float: left;width:100%;display: inline" >
        <p >
            <label class="w3-text-brown"><b>Full Name</b></label>
            <input class="w3-input w3-border-blue w3-light-grey" name="name" ng-model="fname" ng-blur="shall_show=true" type="text" required style="width: 45%"></p>
        <p>
            <label class="w3-text-brown"><b>User Id</b></label>
            <input class="w3-input w3-border-blue w3-light-gray" placeholder=" enter email as user id" style="width: 45%" required name="patient_id" type="text"></p>

        <p >
            <label class="w3-text-brown"><b>Password:</b></label>
            <input class="w3-input w3-border-blue w3-light-grey" name="pswd" ng-model="x" ng-change="check_password()"  type="password" required style="width: 45%"></p>
        <p>
        <p >
            <label class="w3-text-brown"><b>Confirm Password</b></label>
            <input class="w3-input w3-border-blue w3-light-grey" name="cpswd" ng-model="y" ng-change="check_password()"  type="password" required style="width: 45%">
            <span class="w3-red">{{msg}}</span>
        </p>



        <!--    <p>-->


        <p>
            <label class="w3-text-brown"><b>Mobile No</b></label>
            <input name="mobile_no" ng-minlength="10" ng-maxlength="10" ng-init="number_error_show=0" ng-focus="number_error_show=1" ng-change="number_error_show=number_error_show+1;" ng-model="mobile_no" required placeholder="enter 10 digit mobile number only" class="w3-input w3-border-blue w3-light-gray"  type="number" style="width: 45%">
            <span ng-show="number_error_show>0 && myform.mobile_no.$error.required || myform.mobile_no.$error.number" class="w3-red">invalid input..plz enter numbers only</span>
            <span ng-show="number_error_show>0 && ((myform.mobile_no.$error.minlength || myform.mobile_no.$error.maxlength) && myform.mobile_no.$dirty )" class="w3-red">mobile number should be of 10 digits.</span>

        </p>


        <br>
        <br>


        <!--        <p>-->
        <!--            <button type="reset" class="w3-btn w3-right w3-round-xxlarge w3-teal w3-hover-cyan w3-large" style="margin-top: -5%;margin-left: 1%">Reset</button>-->
        <!--            <button type="submit" ng-disabled="(number_error_show>0 && ((myform.mobile_no.$error.minlength || myform.mobile_no.$error.maxlength) && myform.mobile_no.$dirty )) || should_disable " class="w3-btn w3-right w3-round-xxlarge w3-teal w3-hover-cyan w3-large" style="margin-top: -5%;margin-right: 7%;">Register</button></p>-->
        <br><br>
    </div>
    <div style="float: right;margin-top: -40%;width: 50%">
            <p>
                <label class="w3-text-brown"><b>Gender&nbsp</b></label>
                <select name="gender" class="w3-border-blue w3-light-gray" required>
                    <option disabled selected value>-- select--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="transgender">Transgender</option>
                </select>
            </p>
                <!--            <input class="w3-input w3-border w3-sand" name="last" type="text"></p>-->
            <p>
                <label class="w3-text-brown"><b>Age &nbsp &nbsp &nbsp</b></label>
                <input class="w3-border-blue w3-light-grey" name="age" type="number" min="1" max="100" required style="width: 9%">
            </p>
            <p>
                <label class="w3-text-brown"><b>Address</b></label>
                <textarea name="address" cols="60" rows="7" required style="vertical-align: middle;display: inline" class="w3-light-grey"></textarea>
                <!--            <input class="w3-input w3-border w3-light-grey" name="address" type=""></p>-->
            </p>

           <div ng-if="shall_show" class="w3-panel w3-round-xxlarge w3-pale-green w3-bottombar w3-border-green w3-border " style="width: 80%;margin-top: 4%">
                <p>hello <b>{{fname}}</b> You are signing up with patient privileges</p>
           </div>
           <p>
           <button type="reset" class="w3-btn w3-right w3-round-xxlarge w3-teal w3-hover-cyan w3-large" style="margin-top: 5%;margin-left: 1%">Reset</button>
           <button type="submit" ng-disabled="(number_error_show>0 && ((myform.mobile_no.$error.minlength || myform.mobile_no.$error.maxlength) && myform.mobile_no.$dirty )) || should_disable " class="w3-btn w3-right w3-round-xxlarge w3-teal w3-hover-cyan w3-large" style="margin-top: 5%;margin-right: 7%;">Register</button>
           </p>
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

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$patient_id=$mobile_no=$gender=$age=$address=$pswd="";
    $name=strtolower(test_input($_POST["name"]));
    $patient_id=strtolower(test_input($_POST["patient_id"]));
    $mobile_no=strtolower(test_input($_POST["mobile_no"]));
    $gender=strtolower(test_input($_POST["gender"]));
    $age=strtolower(test_input($_POST["age"]));
    $address=strtolower(test_input($_POST["address"]));
    $pswd=test_input($_POST["pswd"]);

    $sql="INSERT INTO patient_table(name,patient_id,mobile_no,gender,age,address) values('$name','$patient_id','$mobile_no','$gender','$age','$address')";
    if ($conn->query($sql)===TRUE)
    {
        $sql="INSERT INTO password_table(identity,user_id,password) values('patient','$patient_id','$pswd')";
        if ($conn->query($sql)===TRUE)
        {
            $conn->close();
//            echo "<script>if(confirm('you are succesfully registered')){document.myform.reset()}else{document.myform.reset()}</script>";
            echo "<script>if(confirm('SUCCESSFULLY REGISTERED')){window.location.href='../default.html'}else{window.location.href='../default.html'}</script>";
        }

    }
    else
    {

        $conn->close();
        echo "<script>alert('failed to save data in remote server');history.back()</script>";
    }
}


?>