<?php
/* Template Name: Mot de passe oublié  */
get_header();

?>

<form action="reset_password.php" method="POST">
    <input type="email" class="form-control" id="Email" name="email" placeholder="johndoe@gmail.com" required>
    <button type="submit" class="btn btn-primary w-100">Envoyez le lien de réinitialisation</button>
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = $email;
        $subject = "Réinitialisation de mot de passe";
        $message = "Cliquez sur ce lien pour réinitialiser votre mot de passe : <lien>";
        $headers = "From: no-reply@fastnfriends.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Email envoyé avec succès !";
        } else {
            echo "Échec de l'envoi !";
        }
    } else {
        echo "Adresse email invalide.";
    }
}
?>

<?php
get_footer();

?>






