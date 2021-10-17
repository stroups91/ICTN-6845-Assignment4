<?php include './view/header.php'; ?>
<main>
    <h1>Comment board</h1>
    <p>Post your comments to Scotty Stroup's ICTN 6845 Assignment 4 website.</p>
    <br>
    <table class="tableBorder" width="100%">
        <tr class="trBorder">
            <th class="tdBorder">Comment</th>
            <th class="tdBorder">Date</th>
            <th class="tdBorder">User</th>
        </tr>
        <?php foreach ($comments as $comment) : ?>
        <tr class="trBorder">
            <td width="75%" class="tdBorder"><?php echo htmlspecialchars($comment['commentText']); ?></td>
            <td width="25%" class="tdBorder"><?php echo $comment['createDateTime']; ?></td>
            <td width="25%" class="tdBorder"><?php echo $comment['username']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table> 
    <br>
    <form action="index.php" method="post" id="add_comment_form">
        <input type="hidden" name="action" value="add_comment">
        <label>Enter a comment to post to this site:</label>
        <br>
        <textarea rows="5" cols="60" name="commentText" placeholder=""></textarea>
        <br>
        <input type="submit" value="Add Comment" />
        <br>
        <br>
    </form>
</main>
<?php include './view/footer.php'; ?>