<?php

require 'model/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

    //on assigne une variable d'erreur puis on initialise nos messages d'erreurs; 
    $nameError = '';
    $firstnameError = '';
    $ageError = '';
    $telError = '';
    $emailError = '';
    $countryError = '';
    $commentError = '';
    $jobError = '';
    $urlError = '';

    // on recupère nos valeurs 
    $name = htmlentities(trim($_POST['name']));
    $firstname = htmlentities(trim($_POST['firstname']));
    $age = htmlentities(trim($_POST['age']));
    $tel = htmlentities(trim($_POST['tel']));
    $email = htmlentities(trim($_POST['email']));
    $country = htmlentities(trim($_POST['country']));
    $comment = htmlentities(trim($_POST['comment']));
    $job = htmlentities(trim($_POST['job']));
    $url = htmlentities(trim($_POST['url']));

    // on vérifie nos champs 
    $valid = true; //boolean (set on true)

    //verification champ name
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";    
    }

    //verification champ firstname
    if (empty($firstname)) {
        $firstnameError = 'Please enter firstname';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) { //$name
        $firstnameError = "Only letters and white space allowed";      //$nameError   
    }

     //verification champ email 
    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;       
    }

    //verification champ age
    if (empty($age)) {
        $ageError = 'Please enter your age';
        $valid = false;      
    }

    //verification champ tel
    if (empty($tel)) {
        $telError = 'Please enter phone';
        $valid = false;
    } else if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tel)) {
        $telError = 'Please enter a valid phone';
        $valid = false;        
    }

    //verification champ country
    if (!isset($country)) {
        $countryError = 'Please select a country';
        $valid = false;       
    }

    //verification champ comment
    if (empty($comment)) {
        $commentError = 'Please enter a description';
        $valid = false;
    }

    //verification champ job
    if (empty($job)) {
        $jobError = 'Please select a job';
        $valid = false;       
    }

    //verification champ url
    if (empty($url)) {
        $urlError = 'Please enter website url';
        $valid = false;
    } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        $urlError = 'Enter a valid url';
        $valid = false;
    }

    // si les données sont présentes et bonnes, on se connecte à la base 
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user (name,firstname,age,tel, email, country,comment, job,url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $toExecute = $q->execute(array($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php
    include ('view/head.php');
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

        <form method="POST" action="add.php">

            <br />

            <!-- Tester message d'erreur lie au nom qui sera rajouter comme une class bootstrap -->
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
                    <input type="text" name="firstname" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
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
                    <input type="number" name="age" value="<?php echo !empty($age) ? $age : ''; ?>">
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
                <label class="checkbox-inline">Job</label>

                <br />
                <div class="controls">
                    Dev : <input type="checkbox" name="job" value="dev" <?php if (isset($job) && $job == "dev") echo "checked"; ?>>
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
                <input type="submit" class="btn btn-success" name="submit" value="submit">
               <button><a class="btn" href="index.php">Back</a></button> 
            </div>
            <p>

        </form>
        <p>



    </div>
    <p>

</body>

</html>