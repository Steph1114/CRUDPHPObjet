<?php
    include('../controller/C_add.php');
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
        <div class="row">
            <br />
            <h3>Ajouter un contact</h3>
            <p>
        </div>
        <p>
            <br />

        <form method="POST" action="V_add.php">

            <br />

            <!-- Tester message d'erreur lié au nom qui sera rajouté comme une class bootstrap -->
            <div class="control-group <?php echo !empty($nameError) ? 'error' : ''; ?>">
                <label class="control-label">Name</label>

                <br />
                <div class="controls">
                    <!-- Si name est empty (ou ne respectant pas "/^[a-zA-Z ]*$/"), $nameError est trigger -->
                    <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name) ? $name : ''; ?>">

                    <?php if (!empty($nameError)) : ?>
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

            <!-- Champ first name -->
                <br />
            <div class="control-group<?php echo !empty($firstnameError) ? 'error' : ''; ?>">
                <label class="control-label">firstname</label>

                <br />
                <div class="controls">
                    <input type="text" name="firstname" placeholder="first name" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
                    <?php if (!empty($firstnameError)) : ?>
                        <span class="help-inline"><?php echo $firstnameError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>


             <!-- Champ first age -->
                <br />
            <div class="control-group<?php echo !empty($ageError) ? 'error' : ''; ?>">
                <label class="control-label">age</label>

                <br />
                <div class="controls">
                    <input type="number" placeholder="number between 0 to 150" name="age" value="<?php echo !empty($age) ? $age : ''; ?>">
                    <?php if (!empty($ageError)) : ?>
                        <span class="help-inline"><?php echo $ageError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

             <!-- Champ first email -->
                <br />
            <div class="control-group <?php echo !empty($emailError) ? 'error' : ''; ?>">
                <label class="control-label">Email Address</label>

                <br />
                <div class="controls">
                    <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email) ? $email : ''; ?>">
                    <?php if (!empty($emailError)) : ?>
                        <span class="help-inline"><?php echo $emailError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

             <!-- Champ first tel -->
                <br />
            <div class="control-group <?php echo !empty($telError) ? 'error' : ''; ?>">
                <label class="control-label">Telephone</label>

                <br />
                <div class="controls">
                    <input name="tel" type="text" placeholder="Telephone" value="<?php echo !empty($tel) ? $tel : ''; ?>">
                    <?php if (!empty($telError)) : ?>
                        <span class="help-inline"><?php echo $telError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

             <!-- Champ first country -->
                <br />
            <div class="control-group<?php echo !empty($countryError) ? 'error' : ''; ?>">
            <label class="control-label">Country</label>
            <br />
                <select name="country"> 

                    <option value="paris">Paris</option>

                    <option value="londres">Londres</option>

                    <option value="amsterdam">Amsterdam</option>

                </select>
                <?php if (!empty($countryError)) : ?>
                    <span class="help-inline"><?php echo $countryError; ?></span>
                <?php endif; ?>
            </div>
            <p>

             <!-- Champ first job -->
                <br />
            <div class="control-group<?php echo !empty($jobError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">Job :</label>

                <br />
                <div class="controls">
                    Dev  <input type="checkbox" name="job" value="dev" <?php if (isset($job) && $job == "dev") echo "checked"; ?>>
                    Integrateur <input type="checkbox" name="job" value="integrateur" <?php if (isset($job) && $job == "integrateur") echo "checked"; ?>>
                    Reseau <input type="checkbox" name="job" value="reseau" <?php if (isset($job) && $job == "reseau") echo "checked"; ?>>
                </div>
                <p>

                    <?php if (!empty($jobError)) : ?>
                        <span class="help-inline"><?php echo $jobError; ?></span>
                    <?php endif; ?>
            </div>
            <p>

             <!-- Champ first url -->
                <br />
            <div class="control-group  <?php echo !empty($urlError) ? 'error' : ''; ?>">
                <label class="control-label">Siteweb</label>

                <br />
                <div class="controls">
                    <input type="text" name="url" value="<?php echo !empty($url) ? $url : ''; ?>">
                    <?php if (!empty($urlError)) : ?>
                        <span class="help-inline"><?php echo $urlError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

             <!-- Champ first comment -->
                <br />
            <div class="control-group <?php echo !empty($commentError) ? 'error' : ''; ?>">
                <label class="control-label">Commentaire </label>

                <br />
                <div class="controls">
                    <textarea rows="4" cols="30" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea>
                    <?php if (!empty($commentError)) : ?>
                        <span class="help-inline"><?php echo $commentError; ?></span>
                    <?php endif; ?>
                </div>
                <p>

            </div>
            <p>

            <!-- Champ first bouton / type submit -->
                <br />
            <div class="form-actions">
                <input type="submit" class="btn btn-success btn-update" name="submit" value="submit">
                <button class="btn-read"><a class="btn" href="../index.php">Back</a></button> 
            </div>
            <p>

        </form>
        <p>



    </div>
    <p>

</body>

</html>