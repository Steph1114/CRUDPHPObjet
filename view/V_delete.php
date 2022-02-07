<?php
include('../controller/C_delete.php');
?>


<!DOCTYPE html>
<html lang="en">

<?php
include('head.php');
?>

<body>
    <br />
    <div class="container">
        <br />
        <div class="span10 offset1">

            <br />
            <div class="row">

                <br />
                <h3>Delete a user</h3>
                <p>

            </div>
            <p>

                <br />
            <form class="form-horizontal" action="V_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                Are you sure to delete ?

                <br />
                <div class="form-actions">
                    <button type="submit" class="btn primary btn-danger">Yes</button>
                    <a class="btn secondary" href="../index.php">No</a>
                </div>
                <p>

            </form>
            <p>
        </div>
        <p>

    </div>
    <p>
        <!-- /container -->
</body>

</html>