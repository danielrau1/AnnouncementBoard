<?php
 require APPROOT.'\views\inc\navbar.php';
echo "Hello user ".$_SESSION['tusername'];
echo "<br>";
echo $data['posts'];
?>

<a href="<?php echo URLROOT; ?>/posts/add" >Add Post</a>
