<?php
function get_comments() {
    global $db;
    $query = 'SELECT * FROM id17695512_assignment3.comments
              ORDER BY createDateTime DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $comments = $statement->fetchAll();
    $statement->closeCursor();
    return $comments;
}


function add_comments($commentText) {

    global $db;
    $query = 'INSERT INTO id17695512_assignment3.comments
                 (commentText, createDateTime, username)
              VALUES
                 (:commentText, now(), :sessionUsername)';
    $statement = $db->prepare($query);
    $statement->bindValue(':commentText', $commentText);
    $statement->bindValue(':sessionUsername', $_SESSION['user']);
    $statement->execute();
    $statement->closeCursor();

}

?>

