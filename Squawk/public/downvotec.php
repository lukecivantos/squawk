<?php

    // configuration
    require("../includes/config.php"); 

    // Sets the score and database votes appropriately
    CS50::query("UPDATE comments SET comment_score = comment_score - 1 WHERE id = ?", $_GET["id"]);
    CS50::query("DELETE FROM votes2 WHERE (user_id = ? AND entry_id = ? AND comment_id = ?)", $_SESSION["id"], $_GET["entry_id"], $_GET["id"]);
    $results = CS50::query("INSERT INTO votes2 (user_id, entry_id, comment_id, up_down) VALUES(?,?,?,?)", $_SESSION["id"], $_GET["entry_id"], $_GET["id"], 2);
?>