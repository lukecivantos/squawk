<script>
    
    // When up is clicked connects to the file that queries
    function upClick(postId, entry_id) {
        
        var parameters = {
            id: postId,
            entry_id: entry_id
            
        };
        // Checks whether the like/dislike buttons are clicked
        if (document.getElementById("upForm" + postId).getAttribute("src") != "/img/up2.png")
        {
            if(document.getElementById("downForm" + postId).getAttribute("src") != "/img/down2.png")
            {
                // Connects to upvote.php
                $.get("upvotec.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                
                        // Changes image
                        document.getElementById("upForm" + postId).src = "/img/up2.png";
                       
                        // Updates the score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) + 1);
                    
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });  
            }
            else
            {
                // Connects to upvote.php
                $.get("flipupvotec.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                
                    // Changes image
                    document.getElementById("upForm" + postId).src = "/img/up2.png";
                    document.getElementById("downForm" + postId).src = "/img/up.png";
                   
                    // Updates the score
                    var current_score = $("#post_" + postId + " .score").text();
                    $("#post_" + postId + " .score").text(parseInt(current_score) + 2);
                
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }
        }  
        else
        {
            // Connects to unupvote for comments
            $.get("unupvotec.php", parameters)
            .done(function(data, textStatus, jqXHR) {
                        
            // Changes logo thing
            document.getElementById("upForm" + postId).src="/img/up.png";
            
            // Updates score
            var current_score = $("#post_" + postId + " .score").text();
            $("#post_" + postId + " .score").text(parseInt(current_score) - 1);
            })
                
            // Check if JSON fails
            .fail(function(jqXHR, textStatus, errorThrown) {
                
                // log error to browser's console
                console.log(errorThrown.toString());
                    
            });
        }
    }
    
    // Connects if down is clicked
    function downClick(postId, entry_id) {
        
        var parameters = {
            id: postId,
            entry_id: entry_id
        };
        // Checks if the like/dislike buttons are clicked
        if (document.getElementById("downForm" + postId).getAttribute("src") != "/img/down2.png")
        {
            if (document.getElementById("upForm" + postId).getAttribute("src") != "/img/up2.png")
            {
                
                // Connects to downvote.php
                $.get("downvotec.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                        
                        // Changes logo thing
                        document.getElementById("downForm" + postId).src="/img/down2.png";
                
                        // Updates score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) - 1);
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }    
            else
            {
                // Connects to flipdownvote for comments
                $.get("flipdownvotec.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                        
                        // Changes logo thing
                        document.getElementById("upForm" + postId).src="/img/up.png";
                        document.getElementById("downForm" + postId).src="/img/down2.png";

                        // Updates score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) - 2);
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }
        }
        else
        {
            // Connects to undownvote for comments
            $.get("undownvotec.php", parameters)
            .done(function(data, textStatus, jqXHR) {
                        
                // Changes logo thing
                document.getElementById("downForm" + postId).src="/img/down.png";
                
                // Updates score
                var current_score = $("#post_" + postId + " .score").text();
                $("#post_" + postId + " .score").text(parseInt(current_score) + 1);
            })
                
            // Check if JSON fails
            .fail(function(jqXHR, textStatus, errorThrown) {
                
                // log error to browser's console
                console.log(errorThrown.toString());
                    
            });
        }
    }
</script>






<form action="comments.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="comment_submission" placeholder="Add a comment..." type="text"/>
            <?php 
                // Sends the entry id to comments.php
                printf("<input type=\"hidden\" name=\"entry_id\" value=\"%d\">", $entry_id);
            ?>
            <?php
                // Connects each post to a comments button
                for ($i = 0; $i < sizeof($comments); $i++) 
                {
                    printf("<input type=\"hidden\" name=\"entry_id\" value=\"%d\"\>", $comments[$i]["entry_id"]);
                }
            ?>
        </div>
    </fieldset>
</form>

<table class="table table-striped">
    
    <tbody>
        <?php
            // Prints the header file
            printf("<th>" . htmlspecialchars($ent[0]["entry"]) . "</th>");
            foreach ($comments as $comment)
            {
                // Create source variables
                $voteup = "/img/up.png";
                $votedown = "/img/down.png";
                // Check for updown
                foreach ($signs as $sign)
                {
                    // checks for comment ids to locate it
                    if ($sign["comment_id"] == $comment["id"])
                    {
                        // Checks if up
                        if ($sign["up_down"] == 1)
                        {
                            $voteup = "/img/up2.png";
                            $votedown = "/img/down.png";
                            break;
                        }
                        // Checks if down
                        else if ($sign["up_down"] == 2)
                        {
                            $voteup = "/img/up.png";
                            $votedown = "/img/down2.png";
                            break;
                        }
                        else
                        {
                            $voteup = "/img/up.png";
                            $votedown = "/img/down.png";
                            break;
                        }
                    }    
                }
                // Posts each part of the table. 
                printf("<tr id=post_%d>", htmlspecialchars($comment["id"]));
                printf("<td>%s</td>", getElapsedTime($comment["time_made"]));
                printf("<td>%s</td>", htmlspecialchars($comment["comment"]));
                printf("<td><input type=\"image\" onclick=\"upClick(%d, %d)\" src=\"%s\" name=\"saveForm\" class=\"btTxt submit\" id=\"upForm%d\"/></td>", htmlspecialchars($comment["id"]), $comment["entry_id"], $voteup, htmlspecialchars($comment["id"]));
                printf("<td class='score'>%s</td>", htmlspecialchars($comment["comment_score"]));
                printf("<td><input type=\"image\" onclick=\"downClick(%d, %d)\" src=\"%s\" name=\"saveForm\" class=\"btTxt submit\" id=\"downForm%d\"/></td>", htmlspecialchars($comment["id"]), $comment["entry_id"], $votedown, htmlspecialchars($comment["id"]));
                printf("</tr>");
            }
            
            // This function makes it so that the time is displayed as how much has passed
            function getElapsedTime($eventTime)
            {   
                $totaldelay = time() - strtotime($eventTime);
                if($totaldelay <= -1)
                {
                    return '';
                }
                // Checks how much has passed to decide what units to use
                else
                {
                    if($days=floor($totaldelay/86400))
                    {
                        $totaldelay = $totaldelay % 86400;
                        return $days.' days ago';
                    }
                    if($hours=floor($totaldelay/3600))
                    {
                        $totaldelay = $totaldelay % 3600;
                        return $hours.' hours ago';
                    }
                    if($minutes=floor($totaldelay/60))
                    {
                        $totaldelay = $totaldelay % 60;
                        return $minutes.' minutes ago';
                    }
                    if($seconds=floor($totaldelay/1))
                    {
                        $totaldelay = $totaldelay % 1;
                        return $seconds.' seconds ago';
                    }
                }
            }

        ?>
    </tbody>
</table>
<div class= "help">
    <a href="mailto:squawkhelp@gmail.com">Report Offensive Content</a>
</div>
