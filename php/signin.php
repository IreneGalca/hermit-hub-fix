<link rel="stylesheet" href="../hermit-hub-fix/css/SignupStyle.css" />


<?php
//signup.php
include 'connect.php';
include 'home-header.php';

//check if the user is signed in first
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']==true)
{
    echo '<div class="popup">You are already signed in. Sign Out? </div>';
}
else
{   //create a form to take in User name and password
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        echo '<form method="post" action="">
      <h3>Sign in</h3>
      <label>User Name:</label> <br>
      <input type="text" name="user_name" />
      <br>

      <label>Password:</label> <br>
      <input type="password" name="user_pass">
      <br>

      <input type="submit" class="btn" value="Sign in" />
   </form>';
    }
    else
    {
        $errors = array(); //declare array

        if(!isset($_POST['user_name']))
        {
            $errors[] = '<div class="popup">The username field must not be empty.</div>';
        }

        if(!isset($_POST['user_pass']))
        {
            $errors[] = '<div class="popup">The password field must not be empty.</div>';
        }

        if(!empty($errors)) //check for empty array
        {
            echo '<div class="popup">Uh-oh.. a couple of fields are not filled in correctly..</div>';
            echo '<ul>';
            foreach($errors as $key => $value) 
            {
                echo '<li>' . $value . '</li>'; //error list
            }
            echo '</ul>';
        }
        else
        {
           
            $sql = "SELECT
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_name = '" . mysqli_real_escape_string($conn, $_POST['user_name']) . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";

            $result = mysqli_query($conn, $sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo '<div class="popup">Something went wrong while signing in. Please try again later.</div>';
            }
            else
            {
                //if username and pass don't match
                if(mysqli_num_rows($result) == 0)
                {
                    echo '<div class="popup">You have supplied a wrong user/password combination. Please try again.<div>';
                }
                else
                {
        
                    $_SESSION['signed_in'] = true;

                    //stores user_id to be used in forum posts later
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }

                    echo '<div class="popup">Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.</div>';
                }
            }
        }
    }
}