<h1>Edit Post</h1>
<a href="<?php echo URLROOT; ?>/posts/" >BACK</a>

<form method="post" action="<?php echo URLROOT; ?>/posts/Edit">
    pid <input type="text" name="pid" value="<?php echo $data['pid']; ?>" >
    tid <input type="text" name="tid" value="<?php echo $data['tid']; ?>" ><br>

    </div>
    pbody <textarea name="pbody" ><?php echo $data['pbody']; ?></textarea><br>
    <input type="submit" name="submitEdit" value="Submit Edit">
    <input type="submit" name="deletePost" value="Delete Post">
</form>
