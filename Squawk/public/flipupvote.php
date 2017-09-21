<?php

    // configuration
    require("../includes/config.php"); 

    // Sets the score and database votes appropriately
    CS50::query("UPDATE entries SET entry_score = entry_score + 2 WHERE id = ?", $_GET["id"]);
    CS50::query("DELETE FROM votes WHERE (user_id = ? AND entry_id = ?)", $_SESSION["id"], $_GET["id"]);
    $results = CS50::query("INSERT INTO votes (user_id, entry_id, up_down) VALUES(?,?,?)",$_SESSION["id"],$_GET["id"], 1);
?>