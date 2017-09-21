<?php

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // update entries
        CS50::query("INSERT INTO comments (comment, user_id, entry_id)
        VALUES(?,?,?)", $_POST["comment_submission"], $_SESSION["id"], $_POST["entry_id"]);            
        
        // get comments
        $rows = CS50::query("SELECT * FROM comments WHERE entry_id = ? ORDER BY time_made ASC", $_POST["entry_id"]);
        if ($rows === false)
        {
            apologize("Can't find comments.");
        }
        
        // Change Number of comments
        CS50::query("UPDATE entries SET number_comments = number_comments + 1 WHERE id = ?",$_POST["entry_id"]);
        
        // Gets votes
        $votes = CS50::query("SELECT * FROM votes2 WHERE entry_id = ? AND user_id = ?", $_POST["entry_id"], $_SESSION["id"]);
        if ($votes === false)
        {
            apologize("Can't find entries.");
        }
        
        // Get Submission
        $ent = CS50::query("SELECT entry FROM entries WHERE id = ?", $_POST["entry_id"]);
        
        // store comments
        $comments = [];
        foreach ($rows as $row)
        {
            $comments[] = [
                "comment" => $row["comment"],
                "comment_score" => $row["comment_score"],
                "id" => $row["id"],
                "time_made" => $row["time_made"],
                "user_id" => $row["user_id"],
                "entry_id" => $row["entry_id"]
            ];
        }
        
        // Get Votes
        $signs = [];
        foreach ($votes as $vote)
        {
            $signs[] = [ 
                "user_id" => $vote["user_id"],
                "entry_id" => $vote["entry_id"],
                "up_down" => $vote["up_down"],
                "comment_id" => $vote["comment_id"]
            ];
        }
        
        // render portfolio
        render("comments_form.php", ["signs" => $signs, "comments" => $comments, "entry_id" => $_POST["entry_id"], "ent" => $ent,  "title" => "Comments"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        
        // get comments
        
        $rows = CS50::query("SELECT * FROM comments WHERE entry_id = ? ORDER BY time_made ASC", $_GET["entry_id"]);
        if ($rows === false)
        {
            apologize("Can't find comments.");
        }
        
        // Gets votes
        $votes = CS50::query("SELECT * FROM votes2 WHERE entry_id = ? AND user_id = ?", $_GET["entry_id"], $_SESSION["id"]);
        if ($votes === false)
        {
            apologize("Can't find entries.");
        }
        
        // Get Submission
        $ent = CS50::query("SELECT entry FROM entries WHERE id = ?", $_GET["entry_id"]);
        
        //store comments
        $comments = [];
        foreach ($rows as $row)
        {
            $comments[] = [
                "comment" => $row["comment"],
                "comment_score" => $row["comment_score"],
                "id" => $row["id"],
                "time_made" => $row["time_made"],
                "user_id" => $row["user_id"],
                "entry_id" => $row["entry_id"]

               
            ];
        }
        
        // Get Votes
        $signs = [];
        foreach ($votes as $vote)
        {
            $signs[] = [ 
                "user_id" => $vote["user_id"],
                "entry_id" => $vote["entry_id"],
                "up_down" => $vote["up_down"],
                "comment_id" => $vote["comment_id"]
            ];
        }
        
        // render portfolio
        render("comments_form.php", ["signs" => $signs, "comments" => $comments, "entry_id" => $_GET["entry_id"], "ent" => $ent, "title" => "Comments"]);
    }
?>