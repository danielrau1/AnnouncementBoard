<?php require APPROOT.'\views\inc\navbar.php'; ?>

<h1>The ADD POST page</h1>

<a href="<?php echo URLROOT; ?>/posts/" >BACK</a>

<form action = "<?php echo URLROOT; ?>/posts/add" method="post">



    BODY <textarea name="pbody"><?php echo $data['pbody']; ?></textarea><br>
    <span style="color:red"><?php echo $data['pbody_err']; ?></span><br>

    <input type="submit"  >

</form>
