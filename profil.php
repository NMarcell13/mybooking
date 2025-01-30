<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adatok</title>
</head>
<body>
<?php session_start() ?>
<h1>Adatok</h1>
<br>
<h3>Vezetéknév: <?php echo $_SESSION["vezeteknev"] ?></h3>

<h3>Keresztnév: <?php echo $_SESSION["keresztnev"] ?></h3>

<h3>Email: <?php echo $_SESSION["email"] ?></h3>

<h3>Telefonszán: <?php echo $_SESSION["telszam"] ?></h3>

<h3>Születési idő: <?php echo $_SESSION["szul_ido"] ?></h3>

<h3>Születési hely: <?php echo $_SESSION["szul_hely"] ?></h3>

<h3>Nem: <?php echo $_SESSION["nem"] ?></h3>

<h3>Lakcím: <?php echo $_SESSION["lakcim"] ?></h3>

<h3>Tajszám: <?php echo $_SESSION["tajszam"] ?></h3>

<h3>Anyja neve: <?php echo $_SESSION["a_neve"] ?></h3>





    
</body>
</html>
