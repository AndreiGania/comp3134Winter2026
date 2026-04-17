<?php
$host = "localhost";
$user = "phpuser";
$pass = "Password123!";
$db   = "wk13";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = isset($_GET['firstname']) ? $_GET['firstname'] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Get Users</title>
</head>
<body>

<h2>Search Users</h2>

<form method="GET">
    <input type="text" name="firstname" placeholder="Enter first name">
    <button type="submit">Search</button>
</form>

<br>

<?php
if ($search != "") {

    $sql = "SELECT * FROM users WHERE firstname = '$search' AND active = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Active</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['active']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found";
    }
}
$conn->close();
?>

</body>
</html>











