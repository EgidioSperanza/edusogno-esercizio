<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('layout/meta-plus-link.php')?>
    </head>
    <body>
        <?php include ('layout/header.php'); ?>
        <h1>Hai già un account</h1>
        <div class="register">
            
        <form class="account" action="login.php" method="post" id="login">
            <label for="email">Inserisci l'email</label>
            <input type="email" id="email" placeholder="name@example.com" name="email" required/>

            <label for="password">Inserisci la password</label>
            <div class="togglePwd">
                <input type="password" id="password" placeholder="Scrivila qui" name="password" required/>
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <input type="submit" value="ACCEDI" />
            <a class="log-register" href="newaccount.php">Non hai ancora un profilo? <strong>Registrati</strong></a>
        </form>

        </div>
        <?php include ('layout/background.php'); 
        ?>
    </body>
</html>