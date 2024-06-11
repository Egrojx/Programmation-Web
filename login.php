<?php

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

require 'config.php';

$error = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usagers WHERE nom_utilisateur = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
        $_SESSION['is_connected'] = true;

        header('Location: index.php');
        exit();
    } else {
        
        $error = 'Nom d’utilisateur ou mot de passe incorrect.';
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Connexion</button>
    </form>
    <p><a href="nouveau_compte.php">Créer un compte</a></p>
</body>
</html>
