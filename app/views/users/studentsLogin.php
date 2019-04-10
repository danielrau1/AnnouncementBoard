<h1>Students Login</h1>
<?php
//echo $data['name'];

require APPROOT.'\views\inc\navbar.php';


?>


<form action = "<?php echo URLROOT; ?>/users/studentsLogin" method="post">

    Student Username <input type="text" name="susername" value="<?php echo $data['susername']; ?>"><br>
    <span style="color:red"><?php echo $data['susername_err']; ?></span><br>
    Password <input type="text" name="spassword" value="<?php echo $data['spassword']; ?>"><br>
    <span style="color:red"><?php echo $data['spassword_err']; ?></span><br>
    <input type="submit" value="Students Login" ><br>

</form>
