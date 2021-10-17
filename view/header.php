<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>ICTN 6845 - Assignment 4</title>
    <link rel="stylesheet" type="text/css"
          href="./main.css">
</head>

<!-- the body section -->
<body>
    <header>
        <table width="100%">
            <tr>
                <td><h1>ICTN 6845 - Assignment 4 - Scotty Stroup</h1></td>
                <td align="right">
                    <!-- Logout link handler for when on comment page -->
                    <?php if ($action == 'list_comments' ) { ?>
                    <b><?php echo $_SESSION['user']; ?></b>
                    &nbsp;
                    &nbsp;
                    (<a href="./index.php?action=logout_screen">Logout</a>)
                    <?php }  ?>
                </td>
            </tr>
        </table>
    </header>
