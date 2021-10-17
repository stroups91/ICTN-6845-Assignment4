<?php include './view/header.php'; ?>
<main>
    <h1>New User</h1>
    <!-- Error message handling when logging in in. -->
    <?php if ($loginError == 'notvalid' ) { ?>
        <h2><font color ='red'>Error.  Username or password is incorrect</font></h2>
    <?php } else if ($loginError == 'userblank' ) { ?>
        <h2><font color ='red'>Error.  Username is blank.</font></h2>
    <?php } else if ($loginError == 'passblank' ) { ?>
        <h2><font color ='red'>Error.  Password is blank.</font></h2>
    <?php } else if ($loginError == 'retype_passblank' ) { ?>
        <h2><font color ='red'>Error.  Your password did not match.</font></h2>
    <?php } else if ($loginError == 'userExist' ) { ?>
        <h2><font color ='red'>Error.  User name already exists.  Enter a different name.</font></h2>
    <?php }  ?>
    <form action="index.php" method="post" id="create_form">
        <input type="hidden" name="action" value="create_user_account">
        <fieldset >   
            <label for="username" class="">Enter username</label> 
            <br>
            <input type="text" name="username" id="username" autofocus="autofocus" autocorrect="off" >
            <br>
            <br>
            <label for="password" >Enter password</label>
            <br>
            <input type="password" name="password" id="password" maxlength="51" value="">
            <br>
            <br>
            <label for="password" >Reenter password</label>
            <br>
            <input type="password" name="retype_pass" id="retype_pass" maxlength="51" value="">
            <br>
            <br>
            <button type="submit" value="create account">Create Account</button> 
        </fieldset>
        <h3>Already have an account? 
        <a href="index.php?action=login_screen" title="Go back to login screen"> Go back to login screen </a> </h3>
    </form>
    <br>
    <br>
</main>
<?php include './view/footer.php'; ?>