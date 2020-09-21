<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ContactUS Form</title>
    <script>
        if (window.history.replaceState)
        {
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
    <script src="../angularjs_scripts/angular_script.js"></script>
    <link rel="stylesheet" href="../css/W3Schools.css">
    <link rel="stylesheet" href="../css/w3_fonts_and_css.css">
    <style>
        body{
            background-color: #caffdf;
        }

        .form_contents{
            width: 50%;
            float: left;


            /*overflow-x: hidden;*/

        }
        #messagebox{
            display: inline;
            float: left;

            width: 47%;
            height: 350px;

        }
        #greeting_msg{
            height: 40px;
            color: black;
            /*font-family: "Eras Bold ITC";*/
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button{
            -webkit-appearance: none;
            margin: 0;
        }



    </style>

</head>
<body  ng-app="" ng-init="shall_show=false">
<a href="../default.html" style="float: left"><img src="../media/home.jpg" height="60px" width="60px" class="w3-margin w3-round-xxlarge"></a>
<div class="w3-container w3-right" style="width: 93%;">

    <div class="w3-panel w3-blue  w3-round-xxlarge">
        <p class="w3-xlarge">please fill the following form! :) </p>
    </div>
</div>

<div class="w3-container">
<div class="form_contents w3-left" >
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" name="contactusform">
    <h2 class="w3-center">Contact Us</h2>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><img src="../media/user%20icon.ico" height="40px" width="40px" alt=""></div>
        <div class="w3-rest">
            <label>
                <input class="w3-input w3-border" name="fullname" type="text" placeholder="Full Name" ng-model="fullname" ng-blur="shall_show=true" required>
            </label>
        </div>
    </div>
    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><img src="../media/email.ico" height="40px" width="40px"></div>
        <div class="w3-rest">
            <input class="w3-input w3-border" name="email" type="text" placeholder="Email" required>
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><img src="../media/phone.ico" height="40px" width="40px"></div>
        <div class="w3-rest">
            <input class="w3-input w3-border" name="phone" type="number" placeholder="Phone" required ng-model="phone" >
            
        </div>
    </div>

    <div class="w3-row w3-section">
        <div class="w3-col" style="width:50px"><img src="../media/comment.ico" height="40px" width="40px"></div>
        <div class="w3-rest">
            <input class="w3-input w3-border" name="message" type="text" placeholder="Message" required>
        </div>
    </div>

    <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Send</button>

</form>
</div>
<div class="w3-card-4 w3-gray w3-margin" id="messagebox">
    <img src="../media/box-img2.jpg" width="100%" height="290">
    <footer class="w3-card-4 w3-blue" ng-if="shall_show" >
        <p class="w3-center" id="greeting_msg" ><b>hello {{fullname}} .. thanks for your interest. we will reach you soon</b> </p>
    </footer>
</div>
</div>

<?php
$success_msg='<div class="finalmsg">
<div class="w3-panel w3-display-container w3-green w3-round-xxlarge w3-right">
  <span onclick="this.parentElement.style.display=\'none\'"
        class="w3-button w3-display-topright w3-round-xxlarge w3-hover-green">X</span>
    <h2>QUERY SUBMITTTED SUCCESSFULLY &nbsp &nbsp &nbsp &nbsp</h2>
</div>
</div>';

$error_msg='<div class="finalmsg">
    <div class="w3-panel w3-display-container w3-red w3-round-xxlarge w3-right">
  <span onclick="this.parentElement.style.display=\'none\'"
        class="w3-button w3-display-topright w3-round-xxlarge w3-hover-red">X</span>
        <h2>DATABASE RELATED ERROR OCCURED &nbsp &nbsp &nbsp &nbsp</h2>
    </div>
</div>';

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
    echo $error_msg;
    echo "connection prblem";
    die();
    $conn->close();
    exit();
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$mobile=$email=$message="";
    $name=test_input($_POST["fullname"]);
    $mobile=test_input($_POST["phone"]);
    $email=test_input($_POST["email"]);
    $message=test_input($_POST["message"]);

    $sql="INSERT INTO query_table(name,mobile,email,query) values('$name','$mobile','$email','$message')";
    if ($conn->query($sql)===TRUE)
    {
        echo $success_msg;
        $conn->close();
        exit();
    }
    else
    {
        echo $error_msg;
        echo "insert probelm";
        $conn->close();
        exit();
    }
}
?>

</body>
</html>
