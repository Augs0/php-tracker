<?php
include('server.php');
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
                    <li><a href="index.php">Home</a></li>
                </ul>
                <a href="#" data-target="responsive-menu" class="sidenav-trigger right">
                    <i class="material-icons">menu</i>
                </a>
            </div>
        </nav>
        <ul id="responsive-menu" class="sidenav right">
            <li><a href="index.php">Home</a></li>
        </ul>
    </header>
    <div class="container">
        <h1>Suggested workouts</h1>
        <div class="aerobic">
            <h2>Aerobic</h2>
            <ul>
                <li>Swimming</li>
                <li>Cycling</li>
                <li>Team sports (e.g. football, netball, baseball, etc.)</li>
                <li>Running</li>
                <li>HIIT</li>
                <li>Dance</li>
            </ul>
        </div>
        <div class="strength">
            <h2>Strength</h2>
            <ul>
                <li>Weight lifting</li>
                <li>Push ups</li>
                <li>Resistance (e.g. rubber bands)</li>
            </ul>
        </div>
        <div class="flexibility">
            <h2>Flexibility</h2>
            <ul>
                <li>Yoga</li>
                <li>Pilates</li>
                <li>Tai Chi</li>
            </ul>
        </div>
        <div class="balance">
            <h2>Balance</h2>
            <ul>
                <li>Bosu ball exercises</li>
                <li>General balancing and reaching exercises</li>
            </ul>
        </div>
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