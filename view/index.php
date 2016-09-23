<?php
session_start();
include_once('../include_dao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ExpenseMonitor</title>

    <!-- Bootstrap core CSS -->
    <link href="../view/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../view/assets/css/ie10-viewport-bug-workaround.css"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../view/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../view/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php
if (isset ($_SESSION ['logged_in'])) {

    header("Location: dashboard.php");
} else {
    // processing the data for login
    if (isset ($_POST ['name'], $_POST ['password'])) {
        $name = $_POST ['name'];
        $pass = $_POST ['password'];

        if (empty ($name) or empty ($pass)) {
            $error = 'All Fields Required';
        } else {
            // login check
            $user = new User ();
            $user->setUserName($name);
            $user->setPassword($pass);

            $login = DAOFactory::getUsersDAO()->checkLogin($user);

            if ((count($login) >= 1)) {
                // user entered correct details
                $_SESSION ["name"] = $login->getUserName();
                $_SESSION ["userId"] = $login->getUserId();
                $_SESSION ["admin"] = $login->getIsAdmin();
                $_SESSION ['logged_in'] = $login;

                header('Location: index.php');
                exit ();
            } else {
                // user entered wrong details
                $error = 'Incorrect Details';
            }
        }
    }
    ?>

    <div class="container">

        <form class="form-signin" action="index.php" method="post">
            <h2 class="form-signin-heading text-center">Please Log In</h2>
            <?php if(isset($error)) {?>
                <h4 class="text-danger text-center"><?= $error ?></h4>
            <?php } ?>
            <label for="inputEmail" class="sr-only">Name</label> <input
                type="text" id="inputName" class="form-control" placeholder="Name"
                name="name" required autofocus> <br> <label for="inputPassword"
               class="sr-only">Password</label> <input type="password" id="inputPassword" class="form-control"
                placeholder="Password" name="password" required autofocus> <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in
            </button>
        </form>

    </div>
    <!-- /container -->

<?php } ?>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
