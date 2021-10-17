<?php include './view/header.php'; ?>
<div id="main">
    <h1>Database Error</h1>
    <p class="first_paragraph">Error connecting to the database.</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</div><!-- end main -->
<?php include './view/footer.php'; ?>