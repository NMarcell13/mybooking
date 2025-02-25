<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="kepek/MyBookinglco.ico" type="image/x-icon">
    <title>Időpontfoglalás - MyBooking</title>
    <style>
        body {
            background-color: #f0f8ff;
        }
        .bg-light-blue {
            background-color: #e6f3ff;
        }
        .logo-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        .navbar-nav .btn {
            color: #007bff;
            border-color: #007bff;
        }
        .navbar-nav .btn:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        .doctor-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        .doctor-info {
            padding: 1.5rem;
        }
        .doctor-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .time-slots {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        .time-slot {
            margin-bottom: 1rem;
        }
        .custom-date {
            margin-top: 2rem;
        }
        .book-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .book-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
  <?php 
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "mybooking";
    session_start();
    $conn = new mysqli($servername, $username, $password, $dbname);

   

    if ($conn->connect_error) {
      die("Kapcsolódási hiba: " . $conn->connect_error);
  }

    $_add_hidden="hidden";
    $_add_disabled="";
    
    if ($_SESSION["titulus"] == "admin") {
      $adatprofil = "adminprofil.php";
      $_add_hidden="";
      $_add_disabled="";


    } elseif ($_SESSION["titulus"] == "ugyfel") {
      $adatprofil = "profil.php";
      $_add_hidden="hidden";
      $_add_disabled="";

    } elseif ($_SESSION["titulus"] == "ado") {
      $adatprofil = "adoprofil.php";
      

    }

    if(isset($_POST["nev"])) {
      $nev = $_POST["nev"];
    }

    $sql = "SELECT * FROM adok WHERE felhasznalonev = '" . $nev . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if ($_SESSION["titulus"]=="ado") {
      if ($_SESSION["felhasznalo"]==$nev) {
        $_add_hidden="";
        $_add_disabled="disabled";
      }
    }


   
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light-blue">
    <div class="container">
      <div class="navbar-nav w-100 justify-content-between align-items-center">
        <a class="nav-link btn btn-outline-primary" href="rolunk.html">Rólunk</a>
        <a class="navbar-brand" href="fooldal.php">
          <div class="logo-circle">
            <img src="kepek/MyBookinglogo.png" alt="MyBooking Logo" height="60" />
          </div>
        </a>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle btn btn-outline-primary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["vezeteknev"] . " " . $_SESSION["keresztnev"]; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo $adatprofil; ?>">Adatok</a></li>
            <li><a class="dropdown-item" href="logout.php">Kijelentkezés</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <div class="doctor-card">
          <img src="<?php echo  $kepecske = trim($row['kep'], '\.\.\/'); ?>" alt="<?php echo $row['felhasznalonev'] ?>" class="doctor-image">
          <div class="doctor-info">
            <h2><?php echo $row['vezeteknev']. " ". $row['keresztnev'] ?></h2>
            <p><strong>Leírás: <br></strong> <?php echo $row['leiras'] ?></p>
            <p><strong>Telefonszám:</strong> <?php echo $row['telszam'] ?></p>
            <p><strong>Email:</strong> <?php echo $row['email'] ?></p>
            <p><strong>Helyszín:</strong> <?php echo $row['hely'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="time-slots">
          <h3 class="mb-4">Válasszon időpontot</h3>
          <form>
            <div class="row">
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot1" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot1">2025. március 20. 10:00</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot2" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot2">2025. július 15. 12:00</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot3" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot3">2025. augusztus 10. 11:00</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot4" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot4">2026. szeptember 3. 10:00</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot5" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot5">2026. január 22. 11:00</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="time-slot">
                  <input type="radio" class="btn-check" name="appointment" id="slot6" autocomplete="off">
                  <label class="btn btn-outline-primary w-100" for="slot6">2026. február 22. 12:00</label>
                </div>
              </div>
            </div>

            <div class="custom-date mt-4" >
              <label for="custom-time" class="form-label">Egyedi időpont választása:</label>
              <input type="datetime-local" 
                    class="form-control"
                     id="custom-time"
                     name="custom-time" 
                     min="2025-02-22T00:00"
                     max="2026-12-31T00:00">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-4" <?php echo $_add_disabled ?>>Időpont foglalása</button>
            
            
            
            
          </form>
        </div>
      </div>
      <div class="col-md-4" <?php echo $_add_hidden ?>>
        <div class="time-slots">
          <form action="idopontos.php" method="post">
          <input type="datetime-local" class="form-control" id="custom-time" name="ido_plus" id="ido_plus">
          <button type="submit"  class="btn btn-primary w-100 mt-4" id="add"  onclick="i_hozzaadas()">Időpont hozzáadása</button>

          </form>

          
          
          
          
        </div>
         </div>
    </div>
  </div>
  <script>
    function i_hozzaadas() {
      document.getElementById("datumado").innerHTML +=' <br> '
    }
    
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

