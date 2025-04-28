<?php
$login_action = $LOGICAL_LINKS['login_attempt'];
$register_action = $LOGICAL_LINKS['register_attempt'];
?>

<div class="container">
    <form action=<?php echo "${login_action}";?> method="post">
        <h2>Bejelentkezés</h2>
        <div class="input-group">
        <label for="login_username">Felhasználónév</label>
        <input type="text" id="login_username" name="login_username" required>
        </div>
        <div class="input-group">
        <label for="login_password">Jelszó</label>
        <input type="password" id="login_password" name="login_password" required>
        </div>
        <button type="submit" class="btn">Bejelentkezés</button>
    </form>
</div>
<div class="container">
    <form id="signup_form" action=<?php echo "${register_action}";?> method="post">
      <h2>Regisztráció</h2>
      <div class="input-group">
        <label for="username">Felhasználónév</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="family">Családnév</label>
        <input type="text" id="family" name="family" required>
      </div>
      <div class="input-group">
        <label for="given">Keresztnév</label>
        <input type="text" id="given" name="given" required>
      </div>
      <div class="input-group">
        <label for="email">Email cím</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Jelszó</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <label for="password_repeat">Jelszó ismét</label>
        <input type="password" id="password_repeat" name="password_repeat" required>
      </div>
      <button type="button" onclick="submitRegistration('signup_form', 'username', 'family', 'given', 'email', 'password', 'password_repeat')" class="btn">Regisztráció</button>
    </form>
</div>