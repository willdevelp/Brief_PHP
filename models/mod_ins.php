<?php
    require '../config/config.php';

    if (isset($_POST["submit"])) {
        $username = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $selec = trim($_POST["choix"]);
        $pass = trim($_POST["password"]);
        if(empty($nom) || empty($email) || empty($selec) || empty($pass)){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
            

                if ($stmt->fetch()) {
                    echo "<script>alert('Cet email est déjà utilisé.'); window.history.back();</script>";
                    exit;
                }

                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");

                if ($stmt->execute([$username, $email, $hashed_password, $selec])) {
                    echo "<script>alert('Inscription réussie !'); window.location.href = '../views/liste_session_admin.php';</script>";
                } else {
                    echo "<script>alert('Erreur lors de l'inscription.'); window.history.back();</script>";
                }
            }
            else {
                echo "<script>alert('Format d'email invalide.'); window.history.back();</script>";
                exit;
            }
        }
    }
