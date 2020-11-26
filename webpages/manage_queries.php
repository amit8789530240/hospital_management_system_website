<?php
session_start();
?>

<div class="w3-container">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital_management";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("unable to access remote database".mysqli_error());
    }



    $command = "SELECT * FROM query_table";
    $result = $conn->query($command);
    if($result->num_rows<=0)
    {
        echo "<tr><td><p class='w3-panel w3-red ' style='font-weight: bolder;height: 50px;text-align: center'>NO RECRUITMENT OF DOCTORS</p></td></tr>";
    }
    else {
            while ($temp = $result->fetch_assoc())
            {
                echo "<div class=\"w3-panel w3-pale-blue w3-leftbar w3-round-xlarge w3-border-blue\">
                       <p>Name:".$temp['name']."</p>
                       <p>Mobile No:".$temp['mobile']."</p>
                       <p>Email:".$temp['email']."</p>
                       <label>Query:</label>
                       <textarea readonly rows='2' cols='80' style='resize: none;vertical-align: middle' >".$temp['query']."</textarea>
                       <a href='mailto:".$temp['email']."'><button>Reply/ Email</button></a>
                     </div>";

            }
    }
    ?>
<a href="#" ><button class="w3-button w3-blue w3-hover-indigo w3-hover-shadow w3-round-xxlarge">Goto Dashboard</button></a>
</div>
