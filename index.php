<?php
  require('functions.php');
  $info = userLogin();
?>

<!DOCTYPE html>
<html lang="hu">
  <?php include('includes/head.php'); ?>
  <body>

    <?php include('includes/header.php'); ?>

    <main id="user-login">
      <section>
        <!-- Bejelentkezés a chat használatához -->
        <h2 id="login-message">Az alkalmazás használatához kérjük jelentkezzen be!</h2>

        <?php if ($info == 1): ?>
          <div id="reg-error">
            <h3>Sikertelen bejelentkezés! Hibás E-mail cím vagy jelszó!</h3>
          </div>
        <?php endif; ?>

        <form method="post" id="login-form">
          <input type="email" name="email" placeholder="E-mail" required>
          <input type="password" name="password" placeholder="Jelszó" required>
          <input type="submit" name="log-btn" value="Bejelentkezés">
        </form>
        <a href="register.php" id="reg-link">Regisztráció</a>
      </section>
    </main>

  </body>
</html>
