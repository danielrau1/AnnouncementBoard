<h1>Teachers Login</h1>
<?php
//echo $data['name'];

 require APPROOT.'\views\inc\navbar.php';


 ?>


<form action = "<?php echo URLROOT; ?>/users/teachersLogin" method="post">

    Teacher Username <input type="text" name="tusername" value="<?php echo $data['tusername']; ?>"><br>
    <span style="color:red"><?php echo $data['tusername_err']; ?></span><br>
    Password <input type="text" name="tpassword" value="<?php echo $data['tpassword']; ?>"><br>
    <span style="color:red"><?php echo $data['tpassword_err']; ?></span><br>
    <input type="submit" value="Teachers Login" ><br>

</form>
