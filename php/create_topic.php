<link rel="stylesheet" href="../hermit-hub-fix/css/TopicStyle.css" />

<?php
    include 'connect.php';
    include 'header.php';


    if(isset($_SESSION['signed_in'])==false)
    {
        echo '<div class="popup">
        Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.
        </div>';
    }
    else{
            echo '<form method="POST" id="comment-form">
            <label>Title:</label> <br>
            <input type="text" name="post_topic" /><br>
            <textarea name="post_content"/></textarea><br>
            <input type="submit" class="btn" value="Post"  />
            </form>';

        if($_SERVER["REQUEST_METHOD"] == "POST"){

        

            $topic = "";
            $content = "";

            if(empty($_POST['post_topic']))
            {
                $topic="";

            } else{

                $topic=$_POST['post_topic'];
            }

            if(empty($_POST['post_content']))
            {
                $content="";
            }

            else {
                $content=$_POST['post_content'];
            }





            $sql = "INSERT INTO
                    posts(post_topic, post_content, post_date, post_by)
                    VALUES('" . mysqli_real_escape_string($conn, $topic) . "',
                        '" . mysqli_real_escape_string($conn, $content) . "',
                        NOW(),
                        " . $_SESSION['user_id'] . "
                   )";
           
            $result = mysqli_query($conn, $sql);
            
        // if(!$result){
        //    echo "alert('something went wrong with your post. Try again?')";
        // }
        // else
        // {
            echo '<div class="popup"> Ya did it. Wanna <a href="forum.php"> see it </a></div>';
        // }

    }
    }    


    include 'footer.php';

?>