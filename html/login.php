<?php
session_start();
$password = $_GET['pass'];
$username = $_GET['uname'];

$con = mysqli_connect('localhost', 'user1', 'pass123', 'recruitment') or die("Failure");
if (mysqli_connect_errno()) {
    echo "Failure: " . mysqli_connect_error();
} else {
    $query = "SELECT username, password FROM users WHERE username='$username' AND password='$password'";
    $query1 = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($password === "nimda!@" && $username === "admin") {
            echo '<body style="background-color:black">';
            echo '<h2 style="color:green;font-family:monospace;"> &gt p3nt3&t({w1Com3_70_tHe_DarK_5Ide}</h2>';
        } else {
            $result1 = mysqli_query($con, $query1);
            echo "<center>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Username</th>";
            echo "<th>Password</th>";
            echo "</tr>";
            
            while ($row = mysqli_fetch_assoc($result1)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</center>";
        }
    } else {
        echo "<script>alert(' You are just not that good at being a Jedi');</script>";
        exit;
    }
}

session_destroy();
?>
