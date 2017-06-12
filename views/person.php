
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script src="sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
       swal({
            title: "Hoooo!",
            text: "Here's my error message!",
            type: "success",
            confirmButtonText: "Cool"
        });
    });
</script>
<style>
    img {
        width: 50px;
        height: 50px;
    }
</style>
<h3><a href="index.php?route=Login">Login</a>
    <a href="index.php?route=Person&op=create">New Person</a></h3>
<table border="5">
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Status</th>
        <th>Image</th>
        <th>Ops</th>
    </tr>


    <?php
    foreach ($persons as $key => $person) {
        ?>
        <tr>
            <td><?php echo $person['id']; ?></td>
            <td><?php echo $person['first_name']; ?></td>
            <td><?php echo $person['last_name']; ?></td>
            <?php
            if ($person['enabled']) { ?>
                <td>Aktif</td>
                <?php
            } elseif (!$person['enabled']) {
                ?>
                <td>Deaktif</td>
                <?php
            }
            ?>
            <td><img src="<?php echo $person['image_url'] ?>"
                     alt="<?php echo $person['first_name'] . " " . $person['last_name'] ?>"></td>
            <td>

                <a href="index.php?route=Person&id=<?php echo $person['id'] ?>&op=edit">Edit</a>
                <a href="index.php?route=Person&id=<?php echo $person['id'] ?>&op=delete">Delete</a>
            </td>
        </tr>
        <?php
    }

    ?>


</table>