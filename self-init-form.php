<?php if (!isset($otp)) exit; ?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="theme-color" content="#343a40" />
        <title>Teampass - enrôlement</title>

        <!-- Theme style -->
        <link rel="stylesheet" href="plugins/adminlte/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" type="text/css" href="includes/fonts/fonts.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="includes/css/teampass.css">
        <link rel="stylesheet" href="plugins/alertifyjs/css/themes/bootstrap.min.css" />
        <!-- favicon -->
        <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
        <!-- manifest (PWA) -->
        <link rel="manifest" href="manifest.json">
    </head>

    <body class="hold-transition login-page dark-mode">
        <div class="login-box">
            <div class="login-logo"><div style="margin:30px;"><img src="includes/images/teampass-logo2-login.png" alt="Teampass Logo">
                </div>
                <div style="font-weight:bold;">
                    Teampass
                </div>
            </div>

            <form action="" method="post" class="card">
                <div class="card-header text-center">
                    <h3>Créez votre mot de passe !<br/>
                    </h3>
                </div>

                <p class="text-center m-2 text-danger">
                    <?php if (!empty($error)) echo $error; ?>
                </p>

                <div class="card-body">
                    <div class="input-group has-feedback mb-2">
                        <div class="input-group-prepend infotip" title="Identifiant">
                            <span class="input-group-text">
                                <i class="fa-solid fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" id="login" class="form-control submit-button"
                               name="login" placeholder="Identifiant (identique session windows)"
                               value="<?php echo $login; ?>" required />
                </div>
                <div class="input-group has-feedback mb-2">
                    <div class="input-group-prepend infotip" title="Mot de passe">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock fa-fw"></i>
                        </span>
                    </div>
                    <input type="password" id="pw" name="pw" class="form-control submit-button"
                           placeholder="Mot de passe (différent session windows)" required>
                </div>
                <div class="input-group has-feedback mb-2">
                    <div class="input-group-prepend infotip" title="Mot de passe">
                        <span class="input-group-text">
                            <i class="fa-solid fa-lock fa-fw"></i>
                        </span>
                    </div>
                    <input type="password" id="pw2" name="pw2" class="form-control submit-button"
                           placeholder="Répeter le mot de passe" required>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <button id="but_identify_user" class="btn btn-primary btn-block">Valider</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Font Awesome Icons -->
        <link href="plugins/fontawesome-free-6/css/fontawesome.min.css" rel="stylesheet">
        <link href="plugins/fontawesome-free-6/css/solid.min.css" rel="stylesheet">
        <link href="plugins/fontawesome-free-6/css/regular.min.css" rel="stylesheet">
        <link href="plugins/fontawesome-free-6/css/brands.min.css" rel="stylesheet">
        <link href="plugins/fontawesome-free-6/css/v5-font-face.min.css" rel="stylesheet" /> 
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/jquery/jquery.cookie.js" type="text/javascript"></script>
        <!-- Popper -->
        <script src="plugins/popper/umd/popper.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE -->
        <script src="plugins/adminlte/js/adminlte.min.js"></script>
        <!-- simplePassMeter -->
        <link rel="stylesheet" href="plugins/simplePassMeter/simplePassMeter.css" type="text/css" />
        <script type="text/javascript" src="plugins/simplePassMeter/simplePassMeter.js"></script>

    </body>

</html>
