<h4><u>SUBMISSIONS</u></h4>
<a href="<?php echo URLROOT; ?>/posts/" >BACK</a>
<?php foreach($data['submissions'] as $submission): ?>

        <form method="post" style="border:1px black solid; width:25%" action = "<?php echo URLROOT; ?>/posts/grade">
            Student <input type="text" name="sid" value="<?php echo $submission->sid ?>"><br>
            Assignment <input type="text" name="aid" value="<?php echo $submission->aid ?>"><br>
            Grade <input type="text" name="grade" value="<?php echo $submission->grade ?>">
          <span style="color:red"><?php if(isset($_POST['gradeSubmit'])){echo $data['grade_err'];} ?></span><br>
            <input type="submit" name="gradeSubmit" value="grade assignment" >
        </form>



    <?php endforeach;
