<?php
// Database connection settings
$servername = "sql110.infinityfree.com";
$username = "if0_37126505";
$password = "Innocentbaro7";
$dbname = "if0_37126505_db_innoba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO finance (day, date, cash_in, cash_out, balance) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssddd", $day, $date, $cash_in, $cash_out, $balance);

// Process each row of data
for ($i = 0; $i < count($_POST['day']); $i++) {
    $day = $_POST['day'][$i];
    $date = $_POST['date'][$i];
    $cash_in = $_POST['cash_in'][$i];
    $cash_out = $_POST['cash_out'][$i];
    $balance = $_POST['balance'][$i];

    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "Data saved successfully!";
?>
