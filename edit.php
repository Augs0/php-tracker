<?php
include('server.php');

$id = $_GET['id'];

$query = "SELECT * FROM dailytracker WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $id]);
$record = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['update'])) {
    $day = $_POST['day'];
    $exercise = $_POST['exercise'];
    $time = $_POST['time'];

    $query = 'UPDATE dailytracker SET day=:day, exercise=:exercise, time=:time WHERE id=:id';
    header('Location: index.php');
    $stmt = $conn->prepare($query);

    if ($stmt->execute([':day' => $day, ':exercise' => $exercise, ':time' => $time, ':id' => $id])) {
        echo '<div>Record updated</div>';
    } else {
        echo '<div>Unable to update record</div>';
    }
}

?>


<html>

<head>
    <title>Exercise Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="nav-wrapper purple">
            <div class="container">
                <a href="index.php" class="brand-logo">Exercise Tracker</a>
                <ul class="right hide-on-med-and-down">
                    <li>Suggested workouts</li>
                </ul>
                <a href="#" data-target="responsive-menu" class="sidenav-trigger right">
                    <i class="material-icons">menu</i>
                </a>
            </div>
        </nav>
        <ul id="responsive-menu" class="sidenav right">
            <li><a href="workouts.php">Suggested workouts</a></li>
        </ul>
    </header>
    <div class="container">
        <h1>Update exercise tracker</h1>
        <form method="POST">
            <div class="input-field">
                <label for="day" class="active">Day</label>
                <input type="text" name="day" class="day" required value="<?= $record->day; ?>">
            </div>
            <div class="input-field">
                <label for="exercise" class="active">Exercise</label>
                <input type="text" name="exercise" class="exercise" required value="<?= $record->exercise; ?>">
            </div>
            <div class="input-field">
                <label for="time" class="active">Time</label>
                <input type="number" name="time" class="time" required value="<?= $record->time; ?>">
            </div>
            <button type="submit" class="btn-large waves-effect waves-yellow purple darken-4" name="update">Update</button>
        </form>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    M.AutoInit();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {
            edge: 'right'
        });
    });
</script>

</html>