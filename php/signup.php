<link rel="stylesheet" href="../hermit-hub-fix/css/SignupStyle.css" />


<?php
//signup.php
include 'connect.php';
include 'home-header.php';

/*************************************************
*   creates a signup form when signup is clicked.    
**************************************************/

if($_SERVER['REQUEST_METHOD'] != 'POST')
{  
      echo '<form method="post" action="">
      <h3>Sign up</h3>
      <label>UserName:</label> <br>
      <input type="text" name="user_name" />
      <br>

      <label>Password:</label> <br>
      <input type="password" name="user_pass">
      <br>

      <label>Password Again:</label> <br>
      <input type="password" name="user_pass_check">
      <br>

      <label>Email:</label> <br>
      <input type="email" name="user_email">
      <br>

      <input type="submit" class="btn" value="Sign Up" />
   </form>';  
}
else
{
    
    $errors = array(); //declare array

    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = '<div class="popup">The username can only contain letters and digits.</div>';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = '<div class="popup">The username cannot be longer than 30 characters.</div>';
        }
    }
    else
    {
        $errors[] = '<div class="popup">The username field must not be empty.</div>';
    }


    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = '<div class="popup">The two passwords did not match.</div>';
        }
    }
    else
    {
        $errors[] = '<div class="popup">The password field cannot be empty.</div>';
    }

    if(!empty($errors)) //check for empty array
    {
        echo '<div class="popup">Some fields are not filled correctly..</div>';
        echo '<ul>';
        foreach($errors as $key => $value) 
        {
            echo '<li>' . $value . '</li>'; //error list
        }
        echo '</ul>';
    }
    else
    {
        //inserts username, password, email, etc... after removing escape chars
        //to make it formattible for SQL
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($conn, $_POST['user_name']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . mysqli_real_escape_string($conn, $_POST['user_email']) . "',
                        NOW(),
                        0)";

        $result = mysqli_query($conn ,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo '<div class="popup">Something went wrong while registering. Please try again later.</div>';
            echo mysqli_error($conn); //debugging 
        }
        else
        {
            echo '<div class="popup">Successfully registered. You can now sign in and start posting! 🙂</div>';
        }
    }
}

include 'footer.php';
?>