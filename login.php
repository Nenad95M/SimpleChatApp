<?php require_once 'templates/header.php'?>


<form action="log_user.php" method="POST" id="loginForm">
    <h3>Please log in</h3>

    <input name="username" id="username" type="text" placeholder="User name" >
    <input name="password" id="password" type="password" placeholder="Password" >
    <button id="subBtn" type="submit" name="submit">Log IN</button>
    <div class="formText">
        <em>Not a member?</em>
        <em>Please <a href="./register.php">register</a> </em>
    </div>
</form>

<div class="messagebox"><p><span id="errorMessage"></span></p></div>


<?php require_once 'templates/footer.php'?>
