<?php
    include('../controller/C_read.php');
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include ('head.php');
?>

<body>
    <br />
    <div class="container">
        <br />
        <div class="span10 offset1">
            <br />
            <div class="row">

                <br />
                <h3>Edition</h3>
                <p>

            </div>
            <p>
                <br />
            <div class="form-horizontal">

                <br />
                <div class="control-group">
                    <label class="control-label">Name</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['name']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Firstname</label>
                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['firstname']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Email Address</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Phone</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['tel']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Country</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['country']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Job</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['job']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Url</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['url']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Comment</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['comment']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                
                <!-- s’il n’y pas d’id, on redirige vers l’index -->
                    <br />
                <div class="form-actions">
                   <button class="btn-read"><a class="btn" href="../index.php">Back</a></button> 
                </div>
                <p>

            </div>
            <p>

        </div>
        <p>

    </div>
    <p>
        <!-- /container -->
</body>

</html>