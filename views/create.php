<?php echo $status  ?>
<h2><a href="index.php?route=Person">Person List</a></h2>


<form  action="index.php?route=Person&op=create" method="post" enctype="multipart/form-data" >
    First Name<br>
    <input type="text" name="first_name"><br>
    Last Name<br>
    <input type="text" name="last_name"><br>
    Email<br>
    <input type="text" name="email"><br>
    Password<br>
    <input type="password" name="password"><br>
    Image<br>
    <input type="file" name="image_url">
<br><br>
    Select Enabled Status<br>
    <select id="cmbEnabled" name="enabled" >
        <option value="true">True</option>
        <option value="false">False</option>
    </select>
    <br><br>
	<input type="submit" name="gonder" id="gonder">
</form>