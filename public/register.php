<?php
  // Include header
  include "../config/config.php";
  require "../view/header.php";
?>

<main>
  <h2>Register</h2>
  <form method="POST" action="do_register.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Name: <input type="text" name="name" required><br>
    <input type="submit" value="Register">
  </form>
</main>

<?php
  // Include footer
  require "../view/footer.php";
?>
