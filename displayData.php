<?php
    function displayInfo() {
        $conn = mysqli_connect("localhost", "root", "root", "project");

        if (!$conn) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Fname, Lname FROM person P JOIN customer C ON P.Ssn=C.Cust_Ssn;";
        $result = $conn->query($sql);

        echo 'Customers'. "<br>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["Fname"] . " " . $row["Lname"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $sql = "SELECT Fname, Lname FROM person P JOIN director D ON P.Ssn=D.D_Ssn;";

        $result = $conn->query($sql);
        echo "<br>";
        echo 'Directors'. "<br>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["Fname"] . " " . $row["Lname"] . "<br>";
            }
        } else {
            echo "0 results";
        }

        $sql = "SELECT Fname, Lname FROM person P JOIN staff S ON P.Ssn=S.S_Ssn";
        $result = $conn->query($sql);
        echo "<br>";
        echo 'Staff'. "<br>";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["Fname"] . " " . $row["Lname"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }

?>
