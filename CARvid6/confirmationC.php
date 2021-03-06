<!DOCTYPE html>

<!--Confirmation page for Road Closure-->
<html lang="en">
    <head>
        <title>Confirmation page of Entry form</title>
    </head>
  
    <body>
        <?php 
        //get variable from form input for road closure and validate
        $sc_date= filter_input(INPUT_POST, 's_date');
        $ec_date= filter_input(INPUT_POST, 'e_date');
        $cMessage=filter_input(INPUT_POST,'message');
        $cLon = filter_input(INPUT_POST,'lon');
        $cLat = filter_input(INPUT_POST, 'lat');
        $cLocation = filter_input(INPUT_POST, 'location');
        $cPid = filter_input(INPUT_POST, 'pid');
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ip_schema";
        $name=filter_input(INPUT_POST, 'name');
        $email=filter_input(INPUT_POST, 'email');
    
        // Create connection
        $conn1 = new mysqli($servername, $username, $password, $dbname);
        $conn2 = new mysqli($servername, $username, $password, $dbname);
        $conn=$conn1=$conn2;
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }


        $conn1->query("INSERT INTO enter_issue(timestamp, r_date, comments, type, lon, lat, location, pid, icon)"
            . "VALUES (NOW(), NOW(), '$cMessage', 'road closure', '$cLon', '$cLat', '$cLocation', '$cPid', 'assets/geojson/road-closure.png');");


        $iid=$conn1->insert_id;
        $conn2->query("INSERT INTO closure(iid,lane_no) VALUES ($iid,'$sc_date','$ec_date');");


        //print out when form submission is successful
        echo "The submission is successful!<br>";
        echo "Thank you <b>'$name'</b> of PID number <b>'$cPid'</b> with <b>'$email'</b> for the road closure  report.";


        $conn->close();
        ?>  
    </body>
    
</html>
            

