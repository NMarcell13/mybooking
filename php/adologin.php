<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "mybooking";
$loggedUsername;
$loggedPassword;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT * FROM adok WHERE felhasznalonev = '$username'";
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($result);   


if (password_verify($password, $row[2])) {
    echo "<h1><center> Login successful </center></h1>";
    $loggedUsername=$username;
    $loggedPassword=$password;
    session_start();
    $_SESSION["felhasznalo"] = $loggedUsername;
    $_SESSION["vezeteknev"]=$row[3];
    $_SESSION["keresztnev"]=$row[4];
    $_SESSION["email"]=$row[5];
    $_SESSION["telszam"]=$row[6];
    $_SESSION["szak"]=$row[7];

    $_SESSION["titulus"]="ado";
    header("Location: ../fooldal.php");
    
    
    exit();  
} else {
    echo '<script>
    
    if (confirm("Hibás felhasználónév vagy jelszó!")) {
        
        window.open("../index.html","_self")
        
    } else {
       
        window.open("../index.html","_self")
    }
    
    
    </script>';
    
    
    
    
     
}


$conn->close();