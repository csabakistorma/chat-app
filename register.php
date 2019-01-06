<?php
  require('functions.php');
  $info = userRegister();
?>

<!DOCTYPE html>
<html lang="hu">
  <?php include('includes/head.php'); ?>
  <body>

    <?php include('includes/header.php'); ?>

    <main id="user-reg">
      <section>
        <article>

          <!-- Hiba esetén mejelenítjük azt, ellenkező esetben pedig üdvözlő üzenet jelenik meg
               A sikeres regisztrációhoz -->
          <?php if ($info == 1): ?>
            <div id="reg-error">
              <h3>A jelszó nem eggyezik! Kérjük próbálja újra!</h3>
            </div>
          <?php elseif ($info == 2): ?>
            <div id="reg-error">
              <h3>Ez a felhasználónév már foglalt! Kérjük próbáljon másikat!</h3>
            </div>
          <?php elseif ($info == 3): ?>
            <div id="reg-error">
              <h3>Ez az E-mail cím már foglalt! Kérjük próbáljon másikat!</h3>
            </div>
          <?php elseif ($info == 4): ?>
            <div id="reg-success">
              <h3>Sikeres regisztráció! Bejelentkezés után máris használhatja az alkalmazást!</h3>
            </div>
          <?php endif; ?>

          <form method="post" id="reg-form">
            <input type="text" name="username" placeholder="Felhasználónév" required>
            <input type="text" name="firstname" placeholder="Vezetéknév" required>
            <input type="text" name="lastname" placeholder="Keresztnév" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password_1" placeholder="Jelszó" required>
            <input type="password" name="password_2" placeholder="Jelszó ismét" required>
            <input type="submit" name="reg-btn" value="Regisztrálok">
          </form>
        </article>
        <article id="reg-back">
          <a href="index.php"><i class="fas fa-chevron-left"></i>Vissza</a>
        </article>
      </section>
    </main>

  </body>
</html>
