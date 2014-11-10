<?php
    include_once './actions/validateSession.php';
?>
<!--<link rel="stylesheet" href="styles/kickStartCss/css/kickstart.css" />-->
<!--<link rel="stylesheet" href="styles/kickStartCss/js/kickstart.js" />-->

<?php 

$url = explode('/', $_SERVER["REQUEST_URI"]); 

?>
<script>

//$(document).ready(function(){
//    
//    $('#efforta').click(function(){
//        $('li#effortli').siblings().removeAttr('class');
//        $('#effortli').attr('class','current');
//    });
//    
//    $('#harvesta').click(function(){
//        $('li#harvestli').siblings().removeAttr('class');
//        $('#harvestli').attr('class','current');
//    });
//    
//    $('#individuala').click(function(){
//        $('li#individualli').siblings().removeAttr('class');
//        $('#individualli').attr('class','current');
//    });
//    
//    $('#usersa').click(function(){
//        $('li#usersli').siblings().removeAttr('class');
//        $('#usersli').attr('class','current');
//    });
//});

</script>


        
    <div style="width: 100%; height: 100px; float: top">
        <img src="images/topBackground3.png" width="100%" />
    </div>
        
        
<div style="margin-top: 20px;">
    <ul class="menu">
        <li id="effortli" <?php if (strpos($url[2],'effort') !== false) echo 'class="current"'; ?> >
            <a id="efforta" href="effortList.php">Effort</a>
        </li>
            
        <li id="harvestli" <?php if (strpos($url[2], 'harvest') !== false) echo 'class="current"'; ?> >
            <a id="harvesta" href="harvestList.php">Harvest</a>
        </li>

        <li id="individualli" <?php if (strpos($url[2], 'individual') !== false) echo 'class="current"'; ?> >
            <a id="individuala" href="individualList.php">Individual</a>
        </li>

        <li>&nbsp;:&nbsp;</li>
        
        <?php if($_SESSION['userType']=='admin'){ ?> 
        
        <li id="usersli" <?php if (strpos($url[2], 'user') !== false) echo 'class="current"'; ?>>
            <a id="usersa" href="userList.php">Users</a>
        </li>
        
        <?php } ?>
        
        <li id="soecieli" <?php if (strpos($url[2], 'specie') !== false) echo 'class="current"'; ?>>
            <a id="soeciea" href="specieList.php">Species</a>
        </li>
        
        <li id="formli" <?php if (strpos($url[2], 'form') !== false) echo 'class="current"'; ?>>
            <a id="forma" href="formList.php">Form</a>
        </li>
        
        <li id="netli" <?php if (strpos($url[2], 'net') !== false) echo 'class="current"'; ?>>
            <a id="neta" href="netList.php">Net</a>
        </li>
        
        <li id="boatli" <?php if (strpos($url[2], 'boat') !== false) echo 'class="current"'; ?>>
            <a id="boata" href="boatList.php">Boat</a>
        </li>
        
        <li id="durationli" <?php if (strpos($url[2], 'duration') !== false) echo 'class="current"'; ?>>
            <a id="durationa" href="durationList.php">Duration</a>
        </li>
        
        <li id="grhtmli" <?php if (strpos($url[2], 'grhtm') !== false) echo 'class="current"'; ?>>
            <a id="grhtma" href="grhtmList.php">GRHTM</a>
        </li>
        
        <li id="meshli" <?php if (strpos($url[2], 'mesh') !== false) echo 'class="current"'; ?>>
            <a id="mesha" href="meshList.php">MESH</a>
        </li>
        
<!--        <li><a href=""><i class="icon-inbox"></i> Parameters</a>
            
            <ul>
            
                <li><a href=""><i class="icon-cog"></i> Species</a></li>
                <li><a href=""><i class="icon-cog"></i> Form</a></li>
                <li><a href=""><i class="icon-cog"></i> Net</a></li>

            </ul>
	</li>-->
    </ul>
</div>