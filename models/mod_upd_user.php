<?php
    require '../config/config.php';
    
    // le code vérifie si l'URL contient un paramètre id passé via la méthode GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();
    
       
    
        if (!$user) {
            die("Utilisateur non trouvé !");
        }
    }
    
    if (isset($_POST['update'])) {
        $new_nom = trim($_POST['nom']);
        $new_email = trim($_POST['email']);
        $new_choice = trim($_POST['choix']);
        $new_password = trim($_POST['password']);
    
        if (!empty($new_username) && !empty($new_email) && !empty($new_password) && !empty($new_choice)) {
            $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role_id = ?, password = ? WHERE id = ?");
            if ($stmt->execute([$new_nom, $new_email, $new_choice, $new_password, $id])) {
                echo "<script>alert('Utilisateur mis à jour !'); window.location.href = 'insert.php';</script>";
            } else {
                echo "<script>alert('Erreur lors de la mise à jour.');</script>";
            }
        }
    }
    
?>