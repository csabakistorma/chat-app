<?php

session_start();
require('includes/db_config.php');

// A saját és barátom felhasználóneve
$myUsername = $_SESSION["username"];
$friendName = $_POST["friendName"];

// Az üzenet szövege
$message = $_POST["message"];

// A neveinket összefüzve fogjuk beazonosítani a "chatszobát".
// Ha ezzel a névpárral már létezik szoba az adatbázisban akkor csak beleirjuk az új üzenetet.
// Ha még nem létezik szoba akkor előbb létrehozunk eggyet
// Kétféle sorrendet csinálunk a felhasználónevekből, hogy ugyanazt a szobát használjuk
$chatUsernames_1 = $myUsername.",".$friendName;
$chatUsernames_2 = $friendName.",".$myUsername;

// Megnézzük, hogy a 2 felhasználónak van-e már chatszobája
$sql = "SELECT * FROM chat WHERE users = '$chatUsernames_1' OR users = '$chatUsernames_2'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
if (mysqli_num_rows($result) == 0) {
  // Még nem beszélgettek, ezért létrehozunk egy új szobát
  $createNewChatRoom = "INSERT INTO chat (users) VALUES ('$chatUsernames_1')";
  $successRoom = mysqli_query($connection, $createNewChatRoom) or die(mysqli_error($connection));

  // Ha kész a szoba kell az ID-je
  $queryRoomId = "SELECT id FROM chat WHERE users = '$chatUsernames_1' OR users = '$chatUsernames_2'";
  $resultRoomId = mysqli_query($connection, $queryRoomId) or die(mysqli_error($connection));
  $roomInfo = mysqli_fetch_array($resultRoomId);
  $roomId = $roomInfo["id"];

  // Ha megvan az ID is, akkor az üzenetet írjuk be a messages táblába dátummal ellátva
  $date = date("Y-m-d H:i:s");
  $writeMessage = "INSERT INTO messages (chatID, username, text, date) VALUES ('$roomId', '$myUsername' ,'$message', '$date')";
  $successMessage = mysqli_query($connection, $writeMessage) or die(mysqli_error($connection));
  header("location:chat.php?user=$friendName&roomId=$roomId");
  exit();

} else {
  // Ebben ay esetben már létezik a szoba, de az ID-je akkor is kell
  $queryRoomId = "SELECT id FROM chat WHERE users = '$chatUsernames_1' OR users = '$chatUsernames_2'";
  $resultRoomId = mysqli_query($connection, $queryRoomId) or die(mysqli_error($connection));
  $roomInfo = mysqli_fetch_array($resultRoomId);
  $roomId = $roomInfo["id"];

  // Ha megvan az ID is, akkor az üzenetet írjuk be a messages táblába dátummal ellátva
  $date = date("Y-m-d H:i:s");
  $writeMessage = "INSERT INTO messages (chatID, username, text, date) VALUES ('$roomId', '$myUsername' ,'$message', '$date')";
  $successMessage = mysqli_query($connection, $writeMessage) or die(mysqli_error($connection));
  header("location:chat.php?user=$friendName&roomId=$roomId");
  exit();
}


?>
