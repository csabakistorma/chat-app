<?php session_start(); ?>

<!DOCTYPE html>
<html lang="hu">
  <?php include('includes/head.php'); ?>
  <body>

    <?php include('includes/header.php'); ?>

    <main>
      <section>
        <article id="chat-back">
          <a href="users.php"><i class="fas fa-chevron-left"></i>Vissza</a>
        </article>
        <article id="chat-messages">
          <?php

            require('includes/db_config.php');

            // A saját és barátom felhasználóneve
            $myUsername = $_SESSION["username"];
            $friendName = $_GET["user"];

            $chatUsernames_1 = $myUsername.",".$friendName;
            $chatUsernames_2 = $friendName.",".$myUsername;

            // Szoba Id
            $queryRoomId = "SELECT id FROM chat WHERE users = '$chatUsernames_1' OR users = '$chatUsernames_2'";
            $resultRoomId = mysqli_query($connection, $queryRoomId) or die(mysqli_error($connection));
            $roomInfo = mysqli_fetch_array($resultRoomId);
            $roomId = $roomInfo["id"];


            // Megjelenitjük a beszélgetések tartalmát
            $sql = "SELECT * FROM messages WHERE chatID = '$roomId'";
            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
            while ($record = mysqli_fetch_array($result)){
              echo '
                <div class="mess-div">
                <span>'.$record["username"].'</span>
                <span>'.$record["date"].'</span>
                <p>'.$record["text"].'</p>
                </div>
              ';
            }

          ?>
        </article>
        <article>
          <!-- Üzenet irás egy felhasználónak -->
          <form action="send_message.php" method="post" id="chat-form">
            <input type="text" name="message" placeholder="Üzenet" required>
            <input type="hidden" name="friendName" value="<?php echo $_GET['user']; ?>">
            <input type="submit" name="send-message" value="Üzenet küldése">
          </form>
        </article>
      </section>
    </main>

  </body>
</html>
