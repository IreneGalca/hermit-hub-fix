

<?php
    
    require_once 'connect.php';
    require_once 'home-header.php';
    echo '<script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

            $(document).ready(function() {
                $("#a-link").click(function() {
                    $("#page").fadeIn(1000);
                });
            });
    </script>';

    echo '<div id="page">'; //page name
    echo '<div style="background-color: rgb(139, 207, 214); width: 20%; 
    border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
    
    Note:<br>
    1.) Diet and shells tabs are coming soon! <br>
    2.) ER question posting is in progress. <br>
    <h2>Until then, play around a bit!</h2>';

    echo '</div>';

    require_once 'footer.php';
?>
