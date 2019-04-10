<?php
 require APPROOT.'\views\inc\navbar.php';


 if(isset($_SESSION['tusername'])){
 echo "Hello teacher ".$_SESSION['tusername']." ID: ".$_SESSION['tid'];
echo "<br>";

?>
<h4><u>POSTS</u></h4>
<a href="<?php echo URLROOT; ?>/posts/add" >Add Post</a>

<?php foreach($data['posts'] as $post): ?>
<div style="border:1px solid black; width:25%;margin:5px;" >
    <div>
        Written by <?php echo $post->tid; ?> on <?php echo $post->pdate; ?>
    </div>
    <p><?php echo $post->pbody ?></p>
</div>

<?php endforeach;

     require 'assignments.php';
?>







 <?php
 } ?>

<?php
if(isset($_SESSION['susername'])) {
    echo "Hello student ".$_SESSION['susername']." ID: ".$_SESSION['sid'];
    echo "<br>";
}
