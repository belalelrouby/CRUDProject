<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "all star test";

    // Create connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, username, password, email FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>id</th><th>name</th><th>username</th><th>password</th><th>email</th><th>mobile</th><th>gender</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . " " . $row["username"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

</body>

</html>




<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "all star test";

/////////Make or create a connection /////////////////
$conn = new mysqli($serverName, $userName, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo("Connected sucussfully");

///////create on the user table///////////////

$sql = "INSERT INTO user (name, username, email)
VALUES ('belal', 'elrouby', 'belo@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

///////////////////Update on the user table////////////

$sql = "UPDATE user SET name='belal' WHERE id=5";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

/////////////////////Delete from the user table//////////////

$sql = "DELETE FROM user WHERE id=7";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


//////////////////////////Read from the user table////////////


// load the data from the table
$sql = "SELECT name, username, password FROM user";
//echo $conn->server_info;
$result = $conn->query($sql);
if ($result) {
    echo "Table was found";
} else echo "no";
while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["password"] . "<br />";
}
//print $result["name"];// ": Number of Rows!" ;
// if ($result->num_rows > 0) {
// output data of each row