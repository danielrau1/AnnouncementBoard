

<h1>The ADD ASSIGNMENTS page</h1>

<a href="<?php echo URLROOT; ?>/posts/" >BACK</a>

<form action = "<?php echo URLROOT; ?>/posts/assignments" method="post">



    BODY <textarea name="abody"><?php echo $data['abody']; ?></textarea><br>
    <span style="color:red"><?php echo $data['abody_err']; ?></span><br>

    <input type="submit"  >


</form>


