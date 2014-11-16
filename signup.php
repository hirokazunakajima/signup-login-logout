<!DOCTYPE html>
<head>

</head>

<body>

    <form action="signup-handler.php" method="post">

        <!-- SIGN UP FORM -->
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit" value="Sing up"/>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'existing') {
            echo 'Sorry, username is alredy taken';
        }?>

        <!-- LINK TO LOGIN PAGE -->
<!--        <a href="index.php">Log in</a>-->

    </form>

</body>

</html>
