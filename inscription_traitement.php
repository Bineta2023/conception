<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    session_start();
    $_SESSION['pseudo']=$_POST['pseudo'];

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) )
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);
        $motdepasse_retype = htmlspecialchars($_POST['motdepasse_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare("SELECT pseudo, adresse_email, mot_de_passe FROM utilisateurs WHERE pseudo = ?");
        $check->execute(array($pseudo));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($motdepasse === $motdepasse_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $motdepasse = password_hash($motdepasse, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $adresseip = $_SERVER['REMOTE_ADDR']; 
                             /*
                              ATTENTION
                              Verifiez bien que le champs token est présent dans votre table utilisateurs, il a été rajouté APRÈS la vidéo
                              le .sql est dispo pensez à l'importer ! 
                              ATTENTION
                            */
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, nom, prenom, adresse_mail, mot_de_passe, token) VALUES(:pseudo, :nom, :prenom, :adresse_mail, :mot_de_passe, :token )');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'adresse_mail' => $email,
                                'mot_de_passe' => $motdepasse,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                                
                            ));



                                                // On redirige avec le message de succès
                                                header('Location:connexion.php');
                                                die();
                                            }else{ header('Location: inscription.php?reg_err=motdepasse'); die();}
                                        }else{ header('Location: inscription.php?reg_err=email'); die();}
                                    }else{ header('Location: inscription.php?reg_err=email_length'); die();}
                                }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
                            }else{ header('Location: inscription.php?reg_err=already'); die();}

 }