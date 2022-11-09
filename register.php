<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('layout/meta-plus-link.php')?>
    </head>
    <body>
        <?php include ('layout/header.php'); 

            require_once ('config.php');//DATABASE CONNECTION

            $name = $connessione->real_escape_string ($_POST['firstName']);
            $surname = $connessione->real_escape_string ($_POST['lastName']);
            $email = $connessione->real_escape_string ($_POST['email']);
            $password = $connessione->real_escape_string ($_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
            if($connessione->query($sql_select)->num_rows == 0){
                $sql = "INSERT INTO utenti (nome,cognome,email, password) VALUES ('$name','$surname','$email','$hashed_password')";
                if($connessione->query($sql) === true){
                    echo '<div class="register">';
                    echo '<p style="background-color:#E1EEC7; padding:10px">Registrazione effettuata con successo</p>';
                    echo 'Sarai reindirizzato alla pagina di Login.';
                    echo '</div>';
                    header('Refresh: 5; URL=index.php');
                
                }else{
                    echo 'Errore durante la registrazione di un nuovo account utente $sql. ' . $connessione->error;
            }}else{
                echo '<div class="register">';
                echo '<p style="background-color:#FFCCCB; padding:10px">Email già registrata</p>';
                echo 'Sarai reindirizzato alla pagina di Registrazione automaticamente';
                echo '</div>';
                header('Refresh: 5; URL=newaccount.php');
            }

            include ('layout/background.php'); 
        ?>
    </body>
</html>