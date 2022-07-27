<?php require_once 'templates/header.php'?>

<?php require_once 'templates/error_msg.php'?>

<section id="login">


<form action="log_user.php" method="POST" id="loginForm">
    <h2 class="title">Please log in</h2>

    <input name="username" id="username" type="text" placeholder="User name" >
    <input name="password" id="password" type="password" placeholder="Password" >
    <button class="btn primary-color" id="subBtn" type="submit" name="submit">Log IN</button>
    <div class="formText">
        <em>Not a member?</em>
        <em>Please <a href="./register.php">register</a> </em>
    </div>
</form>
</section>

<!-- poruka o gresci -->

<?php require_once 'templates/footer.php'?>
