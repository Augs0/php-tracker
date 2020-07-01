<?php include('server.php'); ?>

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
                <a href="#" class="brand-logo">Exercise Tracker</a>
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
        <form action="server.php" method="POST">
            <div class="input-field">
                <label for="day" class="active">Day</label>
                <input type="text" name="day" class="day" required>
            </div>
            <div class="input-field">
                <label for="exercise" class="active">Exercise</label>
                <input type="text" name="exercise" class="exercise" required>
            </div>
            <div class="input-field">
                <label for="time" class="active">Time (in minutes)</label>
                <input type="number" name="time" class="time" required>
            </div>
            <button type="submit" class="btn-large waves-effect waves-purple purple darken-4" name="save">Add a workout</button>
        </form>
    </div>
    <div class=" container">
        <h2>Read records</h2>
        <?php
        include('server.php');

        $query = "SELECT id, day, exercise, time FROM dailytracker ORDER BY id ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $numOfRows = $stmt->rowCount();

        if ($numOfRows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Day</th>";
            echo "<th>Type of Exercise</th>";
            echo "<th>Time (in minutes)</th>";
            echo "</tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$day}</td>";
                echo "<td>{$exercise}</td>";
                echo "<td>{$time}</td>";
                echo "<td>";
                echo "<a name='edit' href='edit.php?id=${id}' class='edit btn-small yellow waves-light'>Edit</a>";
                echo "<a name ='delete' href='delete.php?id=${id}' class='delete btn-small grey darken-3 waves-light'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            };
            echo "</table>";
        } else {
            echo "No records found";
        }

        ?>
    </div>

</body>

</html>
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