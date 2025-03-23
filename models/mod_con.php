
<?php
    require '../config/config.php';

    session_start();

    // Traitement de la connexion
    if (isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['nom']);
        $password = $_POST['password'];
        $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify(trim($password), $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $username;

            $sess = $pdo->prepare('INSERT INTO sessions (user_id) VALUES (:user_id)');
            $sess->execute(array('user_id'=> $user['id']));
            

            

            echo "<script>alert('Connexion réussie !'); window.location.href = '../views/liste_session_user.php';</script>";
        }
        else{
            echo "Remplissez bien vos champs";
        }
    }

    // Traitement de la déconnexion
    if (isset($_GET['logout'])) {
        $session = $pdo->prepare("SELECT id FROM sessions WHERE user_id = :user_id ORDER BY id DESC LIMIT 1" );
        $session->execute(array(":user_id"=> $_SESSION["user_id"]));
        $vad_sesion = $session->fetch(PDO::FETCH_ASSOC);

        $ses = $pdo->prepare("UPDATE sessions SET logout_time = NOW() WHERE id = :id_session");

        $ses->execute([":id_session"=> $vad_sesion["id"]]);
    }

?>
