<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Système de gestion de vote - Inscription</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">Inscription</h1>
    <div id="register-form">
      <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required class="border border-gray-300 rounded-md py-2 px-3 mb-3">
        <input type="email" name="email" placeholder="Adresse e-mail" required class="border border-gray-300 rounded-md py-2 px-3 mb-3">
        <input type="password" name="password" placeholder="Mot de passe" required class="border border-gray-300 rounded-md py-2 px-3 mb-3">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">S'inscrire</button>
      </form>
      <p class="text-red-500">
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid_domain') {
          echo "L'adresse e-mail doit être de domaine 'um6p.ma'.";
        }
        ?>
      </p>
      <p class="mt-4">Déjà inscrit ? <a href="/index.html" class="text-blue-500">Connectez-vous</a></p>
    </div>
  </div>
</body>
</html>
