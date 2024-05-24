<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style1.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $result = mysqli_query($con, "SELECT * FROM Users WHERE email = '$email' AND password = '$password'") or die("Select error occurred");
                $row = mysqli_fetch_assoc($result);
                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    header("Location: home.php");
                }
                else{
                    echo "<div class='message'>
                    <p>Wrong Username or Password</p></div><br>";
                    echo "<a href='javascript:self.history.back()'><button class='bttn'>Go Back</button></a>";
                }
            } else {
            ?>
            <header>Login</header>
            <form action="" method="POST">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
                <div>
                    Don't have an account? <a href="index.php">Sign Up Now</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
