<?php
//I had to add this statement because 000webhost was throwing cannot modify header information
//this is suppose flush the header information
ob_start();
//Start session management. Session is terminated if user logs out or closes browser.
session_start();

//include database functions to connect to db, save comments, and create/validate user accounts
require('./model/database.php');
require('./model/comment_db.php');
require('./model/user_db.php');

//set default action.  Basically if user is logged in then their default action is showing the comments
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_comments';
    }
}
// If the user isn't creating a new account or logged in, then change default action to login screen action
 if ($action != 'new_user_screen' AND $action != 'create_user_account') {
    if (!isset($_SESSION['is_logged_in']) ) {
        $action = 'login_process';
    }
}

//set default loginError indicators
//loginError is use to let the user know that their user name or password is null or not validated
$loginError = filter_input(INPUT_POST, 'loginError');
if ($loginError == NULL) {
    $loginError = filter_input(INPUT_GET, 'loginError');
    if ($loginError == NULL) {
        $loginError = 'N';
    }
}


//Action logic
// login page
if ($action == 'login_process') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    //If the $username was neverset then send to log in screen
    if (!isset($username ))  {
            include('login/login.php');
    } else {
            //Check that user populated username else send back to login process with an error
            if ($username == NULL ) {
                header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=login_process&loginError=userblank");
            //Check that user populated password else send back to login process with an error
            } else if ($password == NULL ) {
                header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=login_process&loginError=passblank");
            //All fields populated, continue with login process               
            } else { 
                $validateInd = validate_user($username, $password);
                if ($validateInd == NULL ) {
                    header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=login_process&loginError=notvalid");  
                } else {  
                  //If user is validated then set session is logged in to true 
                  //and set the user session to the user name from the loggin form.
                  //Note:  session variable user will be used by the insert database commands to 
                  //properly associate the user who entered the comment to the record.
                  $_SESSION['is_logged_in'] = true;
                  $_SESSION['user'] = $username;
                  header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=list_comments");    
                }  
            }
    }
    
//log out action / log out page
} else if ($action == 'logout_screen') {
        //Kill session by clearing array and then dstroying the session id
        $_SESSION = array();
       session_destroy();
    include('login/login.php');  
    
//create new user page    
} else if ($action == 'new_user_screen') {
    include('login/new_user.php');  
    
//create new user action    
} else if ($action == 'create_user_account') {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $retype_pass = filter_input(INPUT_POST, 'retype_pass');
    if ($username == NULL ) {
        header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=new_user_screen&loginError=userblank");  
    } else if ($password == NULL ) {
        header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=new_user_screen&loginError=passblank");  
    } else if ($retype_pass == NULL ) {
        header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=new_user_screen&loginError=retype_passblank");  
    } else { 
          validate_user($username, $password);
          $validateInd = validate_ifexist($username);
          if ($validateInd == NULL ) {
            add_user($username, $password);
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user'] = $username;
            header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=list_comments");  
          } else {  
            header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=new_user_screen&loginError=userExist");  
          }
    }

//list comments
} else if ($action == 'list_comments') {
    $comments = get_comments();
    include('comment_poster/comment_list.php');   

//add comment
} else if ($action == 'add_comment') {
    $commentText = filter_input(INPUT_POST, 'commentText');
    if ($commentText == NULL ) {
        $error = "No comment was provided.";
        include('./errors/commentErrors.php');
    } else { 

        add_comments($commentText);
//Switch if hosted on on-prem
          header("Location: https://itcs6845assignment3.000webhostapp.com/index.php?action=list_comments");
    }
}
?>
