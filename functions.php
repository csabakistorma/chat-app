<?php

session_start();

// Ellenőrizzük, hogy létezik-e már a felhasználónév vagy jelszó az adatbázisban
// Összehasonlítjuk a jelszavakat
// Ha minden rendben md5-el titkosítjuk a jelszót és beirjuk az adatokat a táblába
// Ha volt hiba az bekerült az $error válltozóba amelyet visszaadunk és kiíratunk
function userRegister() {
  if(isset($_POST["reg-btn"])) {

    require('includes/db_config.php');

    $uname = $_POST["username"];
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];
    $md5_pass = md5($password_1); // Ez a jelszó kerül be az adatbázisba

    $reg_info = "";

    if($password_1 != $password_2) {
      $reg_info = 1; // Nem eggyezik a jelszó
    } else {
      // Felhasználónév ellenőrzés
      $query = "SELECT username FROM users WHERE username = '$uname'";
      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      if (mysqli_num_rows($result) > 0) {
        $reg_info = 2; // A felhasználónév már foglalt
      }

      // E-mail cím ellenőrzés
      $query2 = "SELECT email FROM users WHERE email = '$email'";
      $result2 = mysqli_query($connection, $query2) or die(mysqli_error($connection));
      if (mysqli_num_rows($result2) > 0) {
        $reg_info = 3; // Az email cím már foglalt
      }

      // Ha nincs hiba a felhasználó adatainak regisztrálása
      if (empty($reg_info)) {
        $userReg = "INSERT INTO users (username, firstname,  lastname,  email, password)
   			    VALUES ('$uname', '$fname', '$lname', '$email','$md5_pass')";
        $regQuery = mysqli_query($connection, $userReg) or die(mysqli_error($connection));
        $reg_info = 4; // Sikeres regisztráció
      }
    }
    return $reg_info;
  }
}


// Bejelentkezés
function userLogin() {
  if(isset($_POST["log-btn"])) {

    require('includes/db_config.php');

    $email = $_POST["email"];
    $password = $_POST["password"];
    $md5_pass = md5($password);
    $log_info = "";

    // Felhasználó keresése a kapott adatok alapján
    // Ha nincs találat hibával tér vissza
    // Ha pedig van egy session-be teszi a nevét és átirányit a users.php-ra
    $query = "SELECT username FROM users WHERE email = '$email' AND password = '$md5_pass'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    if (mysqli_num_rows($result) == 0) {
      $log_info = 1; // Nem létezik ilyen felhasználó
      return $log_info;
    } else {
      $userdata = mysqli_fetch_array($result);
      $username = $userdata["username"];
      $_SESSION["username"] = $username;
      $log_info = 2; // Sikeres belépés
    }
    // Mivel sikeres a belépés átirányitás a felhasználók listájához
    if($log_info == 2) {
      header("location:users.php");
      exit();
    }
  }
}


?>
