<?=template_header('Place Order')?>

<?php
$voorNaam = '';
$achterNaam = '';
$Adres = '';
$email = '';
$Woonplaats = '';
$postcode = '';
?>

<div class="placeorder content-wrapper">
    <form method="post" action="">
        <label>Voornaam</label>
        <input type="text" name="voorNaam"><br>
        <label>Achternaam</label>
        <input type="text" name="achterNaam"><br>
        <label>Email</label>
        <input type="text" name="email"><br>
        <label>Adres</label>
        <input type="text" name="Adres"><br>
        <label>Woonplaats</label>
        <input type="text" name="Woonplaats"><br>
        <label>Postcode</label>
        <input type="text" name="postcode">
        <input type="submit" name="verzenden" value="Verzenden">
    </form>
    <?php
    if(isset($_POST['verzenden'])) {
        echo "<h1>Bedankt voor je bestelling</h1>
    <p>We hebben een overzicht van je bestelling naar je email verstuurd!</p>";

        $voorNaam = $_POST['voorNaam'];
        $achterNaam = $_POST['achterNaam'];
        $Adres = $_POST['Adres'];
        $email = $_POST['email'];
        $Woonplaats = $_POST['Woonplaats'];
        $postcode = $_POST['postcode'];

        echo "Voornaam: " . $voorNaam . "<br>";
        echo  "Achternaam: " . $achterNaam . "<br>";
        echo  "Adres: " . $Adres . "<br>";
        echo  "Email: " . $email . "<br>";
        echo  "Woonplaats: " . $Woonplaats . "<br>";
        echo "Postcode: " . $postcode . "<br>";
    }

    $query = pdo_connect_mysql()->prepare("INSERT INTO klant(first_name, last_name, email, adres, woonplaats, postcode)
            VALUES('$voorNaam', '$achterNaam', '$Adres', '$email', '$Woonplaats', '$postcode')");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>
</div>

<?=template_footer()?>
