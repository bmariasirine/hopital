<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/logo.png" id="favicon">
</head>
<body>
    <div class="container">
    <div class="logo"><img src="images/logo.png" alt="Logo"></div>
    <div class="container-boxe">
        <h2>LOGIN</h2>
        <form action="{{ route('loginPost') }}" method="post">
            @csrf
            <div>
            <label for="nom_prenom">Nom:</label>
            <input type="text" id="username" name="nom_prenom">
            @error('nom_prenom')
                <span class="error">{{ $message }}</span>
            @enderror
            </div>
            <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
            <button type="submit"><span class="se-connecter">Se connecter</span></button>
        </form>
    </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
