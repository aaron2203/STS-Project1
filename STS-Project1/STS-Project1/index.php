<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<?php
      include("php/config.php");
      if(isset($_POST["Register"])){
        $Name = $_POST["name"];
        $email = $_POST["email"];
        $Password = $_POST["password"];

        $verify_query = mysqli_query($con, "SELECT email FROM Users WHERE email = '$email'");
        if(mysqli_num_rows($verify_query) != 0){
          echo "<div class='message'>
          <p>This email us used. Try another one please.</p></div><br>";
          echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        } else {
          mysqli_query($con, "INSERT INTO Users(Name, email, Password) VALUES('$Name', '$email', '$Password')") or die ("Error Occurred");
          echo "<div class='message'>
          <p>Registered Successfully!</p></div><br>";
          echo "<a href='login.php'>Go back</a>";
        }
      }
    else { ?>
  <div id="register-page">
    <div id="box">
      <h1>Create Account</h1>
      <form action="" method="post">
        <div class="elem">
          <span class="material-symbols-outlined"> person </span>
          <input type="text" name="name" id="name" placeholder="Name" required />
          <span class="tooltip_hover" id="nametooltip">
            <ul>
              <li class="maxlen">8
                <span class="material-symbols-outlined cross"> close </span>
                <span class="material-symbols-outlined check"> check </span>
                <p>Maximum 30 characters long</p>
              </li>
              <li class="charonly">
                <span class="material-symbols-outlined cross"> close </span>
                <span class="material-symbols-outlined check"> check </span>
                <p>No Special Characters [{($#@!^&*^)}]</p>
              </li>
            </ul>
          </span>
        </div>
        <div class="elem">
          <span class="material-symbols-outlined"> mail </span>
          <input type="email" name="email" id="email" placeholder="someone@something.com" required />
          <span class="tooltip_hover" id="emailtooltip">
            <ul>
              <li class="emailonly">
                <span class="material-symbols-outlined cross">close</span>
                <span class="material-symbols-outlined check"> check </span>
                <p>Must follow someone@something.com</p>
              </li>
            </ul>
          </span>
        </div>
        <div class="elem">
                    <span class="material-symbols-outlined"> lock </span>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <span class="tooltip_hover" id="passwordTooltip">
                        <ul>
                            <li class="minlen">
                                <span class="material-symbols-outlined cross">close</span>
                                <span class="material-symbols-outlined check"> check </span>
                            <p>At least 8 characters long.</p>
                            </li>
                            <li class="upper">
                                <span class="material-symbols-outlined cross">close</span>
                                <span class="material-symbols-outlined check"> check </span>
                                <p>At least one uppercase letter.</p>
                            </li>
                            <li class="lower">
                                <span class="material-symbols-outlined cross">close</span>
                                <span class="material-symbols-outlined check"> check </span>
                                <p>At least one lowercase letter.</p>
                            </li>
                            <li class="num">
                                <span class="material-symbols-outlined cross">close</span>
                                <span class="material-symbols-outlined check"> check </span>
                                <p>At least one number.</p>
                            </li>
                            <li class="special">
                                <span class="material-symbols-outlined cross">close</span>
                                <span class="material-symbols-outlined check"> check </span>
                                <p>At least one special character.</p>
                            </li>
                        </ul>
                    </span>
                </div>
                <br><br>
        <button type="submit" class="button-36" name="Register" role="button">Register</button>
        <div>
                    Already have an account ? <a href="login.php">Go to Login</a>
            </div>
    </div>
</form>
    <?php } ?>
  </div>
  <script src="script.js"></script>
</body>
</html>
