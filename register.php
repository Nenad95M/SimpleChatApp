<?php require_once 'templates/header.php'?>
<section id="register">
<h2 class="title">Register</h2>

<form  method='POST'  action="reg.php" id="registrationForm">

    <input type="text" name="username" id="username" placeholder="username">
    <input type="text" name="firstname" id="firstname" placeholder="firstname">
    <input type="text" name="lastname" id="lastname" placeholder="lastname">
    <input type="email" name="email" id="email" placeholder="email">
    <input type="password" name="password" id="password" placeholder="password">
    <input type="password" name="password2" id="password2" placeholder="repeat password">

    <button type="submit" name="submit">Register</button>
    <div class="formText">
    <em>Already a member?</em>
    <em>Please <a href="./login.php">log in</a> </em>
    </div>
</form>
<div class="messagebox"><p><span id="errorMessage"></span></p></div>

</section>
<?php require_once 'templates/footer.php'?>
