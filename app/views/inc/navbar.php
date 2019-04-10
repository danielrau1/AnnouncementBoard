
<ul>
    <li>
        <a href="<?php echo URLROOT; ?>" >Home</a>
    </li>

    <?php if(isset($_SESSION['tid'])):?>
    <li>
        <a href="<?php echo URLROOT;?>/users/teachersLogout" >Logout</a>
    </li>
    <?php elseif(isset($_SESSION['sid'])):?>
        <li>
            <a href="<?php echo URLROOT;?>/users/studentsLogout" >Logout</a>
        </li>
    <?php else: ?>
    <li>
        <a href="<?php echo URLROOT;?>/users/teachersLogin" >Teachers Login</a>
    </li>
        <li>
            <a href="<?php echo URLROOT;?>/users/studentsLogin" >Students Login</a>
        </li>




    <?php endif;?>


</ul>









