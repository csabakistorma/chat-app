<?php session_start(); ?>

<!DOCTYPE html>
<html lang="hu">
  <?php include('includes/head.php'); ?>
  <body>

    <?php include('includes/header.php'); ?>

    <main id="users">
      <section>
        <article id="user-list">
          <ul>
            <?php

              require('includes/db_config.php');
              $myName = $_SESSION["username"];

              // Kilistázzuk az összes felhasználót, kivéve saját magunkat!
              // A neveket a listából link formájában jelenítjük meg, melyhez csatoljuk a felhasználónevet,
              // melyet ezután felhasználunk
              $sql = "SELECT * FROM users WHERE NOT username = '$myName'";
              $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
              while ($record = mysqli_fetch_array($result)){
                echo "<li><a href='chat.php?user=".$record["username"]."'><i class='far fa-user-circle'></i>".$record["username"]."</a></li>";
              }

            ?>
          </ul>
        </article>
        <article id="log-out">
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kijelentkezés</a>
        </article>
      </section>
    </main>



  </body>
</html>
