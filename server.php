<?php
//details hidden for privacy

try {
    $conn = new PDO("mysql: host={$host}; dbname={$db_name};", $username, $pwd);
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}

if (isset($_POST['save'])) {
    try {
        $query = "INSERT INTO dailytracker SET day=:day, exercise=:exercise, time=:time";
        header('location: index.php');

        $stmt = $conn->prepare($query);
        $day = htmlspecialchars(strip_tags($_POST['day']));
        $exercise = htmlspecialchars(strip_tags($_POST['exercise']));
        $time = htmlspecialchars(strip_tags($_POST['time']));

        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':exercise', $exercise);
        $stmt->bindParam(':time', $time);

        if ($stmt->execute()) {
            echo "<div>Record was saved.</div>";
        } else {
            echo "<div>Unable to save record.</div>";
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
