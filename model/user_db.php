<?php
function get_users() {
    global $db;
    $query = 'SELECT * FROM id17695512_assignment3.accounts
              ORDER BY createDateTime DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    return $users;
}

function validate_user($username, $password) {
    global $db;
    $query = 'SELECT * FROM id17695512_assignment3.accounts
              WHERE username = :username
              AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $validateInd = $statement->fetchAll();
    $statement->closeCursor();
    return $validateInd;
}

function validate_ifexist($username) {
    global $db;
    $query = 'SELECT * FROM id17695512_assignment3.accounts
              WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $validateInd = $statement->fetchAll();
    $statement->closeCursor();
    return $validateInd;
}

function add_user($username, $password) {
    global $db;
    $query = 'INSERT INTO id17695512_assignment3.accounts
                 (username, password, createDateTime)
              VALUES
                 (:username, :password, now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>