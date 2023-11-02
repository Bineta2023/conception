<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
            <meta name="author" content="NoS1gnal"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Connexion</title>
        </head>
        <body style="background-color: white;height: 100%;">
        <div style="height: 10%;color: blue;font-size: 30px;display: flex;align-items: center;justify-content: center;">Connexion</div>
        
        <div class="login-form">
            
            <form action="connexion.php" method="post" style="">
                <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                <strong>Mot de passe invalide</strong><br>
                                <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                <strong>Adresse mail incorrecte</strong>
                                <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert-danger">
                                <i class="fa-solid fa-circle-exclamation" style="color: red;"></i>
                                <strong>Compte inexistant</strong><br>
                                <span style="color:black;font-size: 14px;">Les identifiants entrés sont incorrects. Veuillez vérifier et réessayer.</span>
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
                       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off" style="border-radius: 20px;">
                </div>
                
                <div class="form-group">
                    <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off" style="border-radius: 20px;">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: blue;color: white;">Connexion</button>
                </div>   
            </form>
            <div style="display: flex;width: 100%;">
                <p class="titresinscrire"><a href="inscription.php" style="color: white;">S'inscrire</a></p>
                <p class="titresmdpoublié"><a href="inscription.php" style="color: white;">Mot de passe oublié</a></p>
            </div>
        </div>
        <style>
            .titreconnexion {
                color: blue;
            }
            .form-group {
                width:100%;
                margin-bottom: 30px;
                margin-left: auto;
                margin-right: auto;
            }
            .form-control {
                width: 100%;
                font-size: 15px;
                background-color: darkgray;
                color: black;

            }
            .form-control::placeholder {
                color: white;

            }
            .login-form {
                margin-left: auto;
                margin-right: auto;
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                position: absolute;
                bottom: 50px;
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
                border-radius: 3px;
                padding: 5px;

            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 0 30px 0 30px;
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
                font-size: 15px;
                font-weight: bold;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border-radius: 20px;
                height: 45px;
                border: none;
            }
            .titresinscrire {
                color: blue;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                width: 50%;
                border-right: 1px solid lightgray;
            }
            .titresmdpoublié {
                color: blue;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                width: 50%;
            }
            .titresinscrire a {
                text-decoration: none;
            }
            .titresmdpoublié a {
                text-decoration: none;
            }
        </style>
        </body>
</html>