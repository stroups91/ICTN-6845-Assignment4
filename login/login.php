<?php include './view/header.php'; ?>
<main>
    <h1>Login</h1>
    <!-- Error message handling when logging in in. -->
        <?php if ($loginError == 'notvalid' ) { ?>
        <h2><font color ='red'>Error.  Username or password is incorrect</font></h2>
    <?php } else if ($loginError == 'userblank' ) { ?>
        <h2><font color ='red'>Error.  Username is blank.</font></h2>
    <?php } else if ($loginError == 'passblank' ) { ?>
        <h2><font color ='red'>Error.  Password is blank.</font></h2>
    <?php }  ?>
    <form action="index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login_process">
        <fieldset >   
            <label for="username" class="">Username</label> 
            <br>
            <input type="text" name="username" id="username" autofocus="autofocus" autocorrect="off" >
            <br>
            <br>
            <label for="password" >Password</label>
            <br>
            <input type="password" name="password" id="password" maxlength="51" value="">
            <br>
            <br>
            <button type="submit" value="log in">Log in</button> 
        </fieldset>
        <h3>Need an account? 
        <a href="index.php?action=new_user_screen" title="Create an account"> Create an account </a> </h3>
    </form>
    <br>
    <br>
</main>
<?php include './view/footer.php'; ?>