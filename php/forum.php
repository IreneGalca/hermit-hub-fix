<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").fadeToggle();
  });
});
</script>
<?php
//forum page
include 'connect.php';
include 'header.php';

echo '<div class="page">';
    echo '<div class="text_pad">';
        echo "<h1>What's on your mind?</h1>";
        echo "<h4>NOTE: the ER question button isn't operational yet.</h4>";
        
        echo '<div class="gif"></div>';
        echo '<button id="???">???</button>';
        echo '<div id="div1" class="gif2"></div>';

       

    echo '</div>';

    echo '<div class="ask_con">';
        echo '<div class="basic_ask">';
        echo '<h2 id="text_span">Ask your question</h2>';
        echo '<a href="create_topic.php">';
            echo '<input type="submit" id="btn" value="Create Topic"/></a>';
        echo '</div>';

        echo '<div class="basic_ask">';
        echo '<h2 id="text_span">ER question</h2>';
        echo '<a href="er_post.php">';
        echo '<input type="submit" id="btn" value="Create Topic"/></a>';
        
    $sql = "SELECT
            post_topic,
            post_content,
            post_date,
            post_by
            FROM posts";

    $result = mysqli_query($conn, $sql);

    echo '</div>';

    echo '</div>';

    echo '<table>
                      <tr>
                        <th class="th1">Post</th>
                        <th class="th2">Date and user name</th>
                      </tr>';
while($row = mysqli_fetch_assoc($result))
{
    echo '<tr>';
    echo '<td class="leftpart">';
        echo $row['post_content'];
    echo '</td>';
    echo '<td class="rightpart">';
        echo date('d-m-Y', strtotime($row['post_date']));
        echo "\n";
        echo $_SESSION['user_name'];
    echo '</td>';
echo '</tr>';
}

echo '</div>';
////////////////////////////////////////////////
include 'footer.php';

       
?>