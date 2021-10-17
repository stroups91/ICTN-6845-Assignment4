<?php include './view/header.php'; ?>
<div id="main">
    <h1 class="top">Error</h1>
    <p class="first_paragraph"><?php echo $error; ?></p>
    <br>
    <a href="./index.php?action=list_comments">Click here to return to the comments page.</a>
    <br>
    <br>
</div>
<?php include './view/footer.php'; ?>