<?php
 require APPROOT.'\views\inc\navbar.php';
?>

<a href="<?php echo URLROOT; ?>/users/click/50/100" >Click here</a><br>

<?php
 if(isset($_SESSION['tusername'])){
 echo "Hello teacher ".$_SESSION['tusername']." ID: ".$_SESSION['tid'];
echo "<br>";

?>


     <a href="<?php echo URLROOT; ?>/posts/add" >Add Post</a>
     <a href="<?php echo URLROOT; ?>/posts/assignments" >Add Assignment</a>
     <a href="<?php echo URLROOT; ?>/posts/getSubmissions" >Grade Assignments</a>
<h4><u>POSTS</u></h4>


<?php foreach($data['posts'] as $post): ?>
<div style="border:1px solid black; width:25%;margin:5px;" >
    <div>
        <form method="post" action="<?php echo URLROOT; ?>/posts/editPost">
            pid <input type="text" name="pid" value="<?php echo $post->pid; ?>" >
        tid <input type="text" name="tid" value="<?php echo $post->tid; ?>" ><br>
            on <?php echo $post->pdate; ?><br>
    </div>
    pbody <textarea name="pbody" ><?php echo $post->pbody ?></textarea><br>
    <input type="submit" value="Edit">
</form>
</div>

<?php endforeach;?>
<h4><u>ASSIGNMENTS</u></h4>

     <?php foreach($data['assignments'] as $assignment): ?>
         <div style="border:1px solid black; width:25%;margin:5px;" >
             <div>
                 Written by <?php echo $assignment->tid; ?> on <?php echo $assignment->atime; ?>
             </div>
             <p><?php echo $assignment->abody ?></p>
         </div>

     <?php endforeach;
     
 }

if(isset($_SESSION['susername'])){
    echo "Hello student ".$_SESSION['susername']." ID: ".$_SESSION['sid'];
    echo "<br>";

    foreach($data['assignments'] as $assignment): ?>

        <form method="post" style="border:1px black solid; width:25%" action = "<?php echo URLROOT; ?>/posts/submit">
            Teacher <input type="text" name="tid" value="<?php echo $assignment->tid ?>"><br>
            Assignment <input type="text" name="aid" value="<?php echo $assignment->aid ?>"><br>
                        Submission <input type="text" name="submission" value="<?php echo $assignment->submission ?>" >
<!--            Submission <input type="text" name="submission"  >-->
          <span style="color:red"><?php if(isset($_POST['submit'])){echo $data['submission_err'];} ?></span><br>
            <input type="submit" name="submit" value="submit assignment" >
        </form>



    <?php endforeach;




}
?>
