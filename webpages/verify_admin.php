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
$uname=$psw="";
$uname=strtolower(test_input($_POST["uname"]));
$psw=test_input($_POST["psw"]);


//uname
//psw         ........coming from client side

// to be continued







$command="SELECT * FROM password_table WHERE user_id='$uname'";
$result=$conn->query($command);
if ($result->num_rows>0)
{
    $_SESSION["admin_id"]=$uname;
    $row=$result->fetch_assoc();
    if (strcmp($psw,$row["password"])==0 and strcmp($row[identity],"admin")==0)
    {
//        echo true;
        header("Location:admin_login.php");
    }
    else
    {
       echo "<script> if(confirm('WRONG CREDENTIALS')){history.back();} else{history.back()}</script>";
    }
}

}//dont remove this brace
$conn->close();
?>





