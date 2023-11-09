<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Inscription</title>
        </head>
        <body>

        <div style="height: 10%;color: blue;font-size: 30px;display: flex;align-items: center;justify-content: center;">Inscription</div>

        <div class="login-form">
            
            
            <form action="inscription_traitement.php" method="post">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-check" style="color:green"></i>
                                <strong style="color:blue;">Inscription réussie</strong><br>
                                <span style="color:black;font-size: 14px;">Inscritption réussie. Vous pouvez maintenant vous <a href="index.php" style="text-decoration: none;color: blue;">connecter </a>.</span><br>
                            </div>
                        <?php
                        break;

                        case 'motdepasse':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Mot de passe non identique</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Adresse mail non valide</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Adresse mail trop long</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span><br>
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Pseudo trop long</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color:red;"></i>
                                <strong>Pseudo déja existant</strong><br>
                                <span style="color:black;font-size: 14px;">Veuillez modifier vos sélections et réessayez.</span>
                            </div>
                        <?php 

                    }
                }
                ?>

                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                  
                <div class="form-group">
                    <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="motdepasse_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>   
            </form>
        </div>
        <style>
            .form-group {
                width:100%;
                margin-bottom: 30px;
                margin-left: auto;
                margin-right: auto;
            }
            .form-control {
                width: 100%;
                font-size: 15px;
            }
            .login-form {
                margin-left: auto;
                margin-right: auto;
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                position: absolute;
                top: 105px;
                left: 50%;
                transform: translateX(-50%);
            }
            .alert-danger{
                margin-bottom: 20px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                color: blue;
                background-color: rgba(255, 160, 0, 0.3);
                height: 60px;
                border-radius: 1px;
                padding: 5px;

            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 20px 30px 20px 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {
                display: block;  
                border: none;      
                font-size: 15px;
                font-weight: bold;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 15px;
                height: 40px;
                color: white;
                background-color: blue;
            }
        </style>
        </body>
</html>