<?php
    require '../config/config.php';

    if (isset($_POST["submit"])) {
        $nom = trim($_POST["nom"]);
        $email = trim($_POST["email"]);
        $choice = trim($_POST["choix"]);
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
    
        if (!empty($nom) && !empty($email) && !empty($choice) && !empty($password)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
    
                if ($stmt->fetch()) {
                    echo "<script>alert('Cet email est déjà utilisé.'); window.history.back();</script>";
                    exit;
                }

                $stmt = $pdo->prepare("INSERT INTO users (username, email, role_id, password) VALUES (?, ?, ?, ?)");
                if ($stmt->execute([$nom, $email, $choice, $password])) {
                    echo "<script>alert('Inscription réussie !'); window.location.href = '../views/connexion.php';</script>";
                } else {
                    echo "<script>alert('Erreur lors de l'inscription.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Format d'email invalide.'); window.history.back();</script>";
            }
        }
    }
?>