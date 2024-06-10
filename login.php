<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Utilisateur WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="Recette.css">
</head>
<body>
    <div class="conteneur-grid">
        <header class="conteneur-flex entete2">
            <h1>Connexion</h1>
        </header>
        <main class="conteneur-flex principal2">
            <form action="login.php" method="post">
                <div>
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" id="username" name="username" required value="<?= isset($username) ? $username : '' ?>">
                </div>
                <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Se connecter</button>
                <?php if (isset($error)): ?>
                    <p ?= $error ?></p>
                <?php endif; ?>
                <p><a href="nouveau_compte.php">Créer un nouveau compte</a></p>
            </form>
        </main>
    </div>
</body>
</html>
