<?php echo $status;
?>

<h2><a href="index.php?route=Person">Person List</a></h2>
<br>
<form action="index.php?route=Person&id=<?php echo $person->id; ?>&op=edit" method="post" enctype="multipart/form-data">
    First Name<br>
    <input type="text" name="first_name" value="<?php echo $person->first_name ?> "><br>
    Last Name<br>
    <input type="text" name="last_name" value="<?php echo $person->last_name ?>"><br>
    Email<br>
    <input type="text" name="email" value="<?php echo $person->email ?>"><br>
    Password<br>
    <input type="password" name="password" value=""><br>
    <br>
    <img src="<?php echo $person->image_url ?>" width="50" height="50">
    Image<br>
    <input type="file" name="image_url">
    <br><br>
    <?php $enabled = !$person->enabled ? 'selected' :'';
    ?>
    Select Enabled Status<br>
    <select id="cmbEnabled" name="enabled">
        <option value="true">True</option>
        <option value="false" <?php echo $enabled ?>>False</option>
    </select>
    <br><br>


    <input type="submit" name="gonder" id="gonder">
</form>
