<?php

include_once './database/connection.php';
include_once './actions/createSalt.php';

?>

<html>

<?php include_once './defaultHead.php'; ?>    

<body>
       
    <div id="pictureContainer">
        
        <img class="centred_picture" 
             height="290px" 
             width="1920px" 
             src="images/mainMenu_backgorund.jpg"
        >
       
        <form id="login_form" class="centred_form" action="actions/validateLogin.php" method="post">
            
            <br/><br/><br/>
            
            <label id="labelEmail" class="field_aligned_left">Email</label>
            <input name="email" id="email" class="field_aligned_right" required="required">

            <br/><br/>
            
            <label id="labelPass" class="field_aligned_left">Password</label>
            <input name="password" id="password" class="field_aligned_right" type="password" required="required">

            
            
<!--            <label class="field_aligned_left">
                <input id="remember" type="checkbox"> Remember me
            </label>-->

            <button type="submit" class="button_aligned">Sign in</button>
        
        </form>
    
    </div>    
    <input type="hidden" name="msg" value="<?php echo $msg; ?>">
    
</body>
</html>

<?php

if($_GET["msg"] === "e"){
    echo "<script type='text/javascript'>";
    echo "alert('Login and password not valid. Please, try again.');";
    echo "</script>";
}

?>