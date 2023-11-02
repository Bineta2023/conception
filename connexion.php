<?php 
    session_start(); // Démarrage de la session
    require_once 'config.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['email']) && !empty($_POST['motdepasse'])) // Si il existe les champs email, password et qu'il sont pas vident
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']); 
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        
        $email = strtolower($email); // email transformé en minuscule
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, adresse_email, mot_de_passe,token FROM personne WHERE pseudo = ?');
        $check->execute(array($pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon niveau format
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Si le mot de passe est le bon
                if(password_verify($motdepasse, $data['mot_de_passe']))
                {
                    // On créer la session et on redirige sur landing.php
                    $_SESSION['user'] = $data['token'];
                    $_SESSION['pseudo'] = $data['pseudo'];
                    header('Location: pagedaccueil/pagedaccueil.php');
                    die();
                }else{ header('Location: index.php?login_err=password'); die(); }
            }else{ header('Location: index.php?login_err=email'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données
