<?php
 require APPROOT.'\views\inc\navbar.php';
echo "Hello user ".$_SESSION['tusername']." ID: ".$_SESSION['tid'];
echo "<br>";

?>

<a href="<?php echo URLROOT; ?>/posts/add" >Add Post</a>

<?php foreach($data['posts'] as $post): ?>

    <div>
        Written by <?php echo $post->tid; ?> on <?php echo $post->pdate; ?>
    </div>
    <p><?php echo $post->pbody ?></p>


<?php endforeach;?>
