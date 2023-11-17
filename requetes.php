<?php 

function affichertouslesjeux()
{
if (require("config.php")) {

        $sql = $bdd->prepare("SELECT * FROM jeux");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
        $sql->closeCursor();
}

}

function afficherhistoriquedesjeux()
{
if (require("config.php")) {

        $sql = $bdd->prepare("SELECT * FROM historiquedesjeux");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
        $sql->closeCursor();
}

}


function ajouterunjeux()
{
if (require("config.php")) {

        $sql = $bdd->prepare("SELECT * FROM jeux");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_OBJ);
        return $result;
        $sql->closeCursor();
}

}


function supprimerunjeux()
{
if (require("config.php")) {


}
}


function modifierunjeux()
{
if (require("config.php")) {

       
}

}


















































function verificationconnexion()
{

if (require("config.php")) {
if(!isset($_SESSION['pseudo']) | empty($_SESSION['pseudo'])){
    header('Location:../index.php');
    die();
}
else{

// On récupere les données de l'utilisateur
$sql = $bdd->query("SELECT * FROM personne WHERE pseudo ='".$_SESSION['pseudo']."' ;");
$result=$sql->fetch()['pseudo'];
$pseudo=$result;

}
}

}

function afficherfeel()
{
if (require("../config.php")) {

$sql = $bdd->prepare("SELECT * FROM personne WHERE pseudo = :pseudo");
        $pseudo = $_SESSION['pseudo'];
        $sql->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch()['feel'];
        $sql->closeCursor();
        return $result;
}

}

function affichernombredemessageenvoyeacettepersonne()
{

if (require("config.php")) {
$check = $bdd->prepare("SELECT COUNT(*) as count FROM messageindividuel WHERE pseudo = :pseudo AND pseudo_destinatairemessageindividuel = :pseudo_destinatairemessageindividuel ");

$pseudo = $_SESSION['pseudo'];
$pseudo_destinatairemessageindividuel = $_GET['pseudo_destinatairemessageindividuel'];

$check->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$check->bindParam(':pseudo_destinatairemessageindividuel', $pseudo_destinatairemessageindividuel, PDO::PARAM_STR);

$check->execute();
$row = $check->fetch();
$check->closeCursor();

return $row['count'];
}

}

function verifiersimoncompteestcomplet()
{
    if (require("config.php")) {
        $sql = $bdd->prepare("SELECT * FROM personne WHERE pseudo = :pseudo");
        $sql->bindParam(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_OBJ);

        if ($result->sexe == null || $result->pays == null) {
            header('Location: /siteweb2/inscription2.php');
            die();
        } elseif ($result->photo_de_profil == null || $result->nom_utilisateur == null) {
            header('Location: /siteweb2/inscription3.php');
            die();
        }

        // Si tout est complet, vous pouvez retourner les informations (si nécessaire)
        return $result;
    }
}


function ajouternotificationvisitepage()
{

if (require("config.php")) {

// Vérifier si c'est une notification en double
        $dateactuelle = new \DateTime();
        
        $check = $bdd->prepare("SELECT * FROM notification WHERE pseudo = :pseudo AND pseudo_receveurnotification = :pseudo_receveurnotification AND message_notification = 'a visité votre page' AND date_notification = :date_notification");

$pseudo = $_SESSION['pseudo'];
$pseudo_receveurnotification = $_GET['pseudo_destinatairemessageindividuel'];
$date_notification = $dateactuelle->format('Y/m/d');

$check->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$check->bindParam(':pseudo_receveurnotification', $pseudo_receveurnotification, PDO::PARAM_STR);
$check->bindParam(':date_notification', $date_notification, PDO::PARAM_STR);

$check->execute();

$row = $check->rowCount();
$check->closeCursor();
        
        if ($row == 0) {
            $insert = $bdd->prepare('INSERT INTO notification (id_notification, message_notification, pseudo, pseudo_receveurnotification, date_notification) VALUES (:id_notification, :message_notification, :pseudo, :pseudo_receveurnotification, :date_notification)');
            $insert->execute(array(
                ':id_notification' => '',
                ':message_notification' => 'a visité votre page',
                ':pseudo' => $_SESSION['pseudo'],
                ':pseudo_receveurnotification' => $_GET['pseudo_destinatairemessageindividuel'],
                ':date_notification' => $dateactuelle->format('Y/m/d'),
            ));
        }
}

}