<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement mot de passe</title>
    <link rel="stylesheet" href="css/change.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/logo.png" id="favicon">
</head>
<body>

    <div class="logo"><img src="images/logo.png" alt="Logo"></div>
    <div class="container">
        <form id="newpass" action="{{ route('changerMdp.update') }}" method="POST">
            @csrf
            <label for="password">Votre mot de passe actuel:</label>
            <input type="password" class="votre-mot-de-passe-actuel" id="votre-mot-de-passe-actuel" name="password" value="{{ old('password') }}">
            
            <label for="Newpassword">Votre nouveau mot de passe:</label>
            <input type="password" class="votre-nouveau-mot-de-passe" id="Newpassword" name="Newpassword" value="{{ old('Newpassword') }}">
            
            <label for="confirmNewPassword">Retappez votre nouveau mot de passe:</label>
            <input type="password" class="retappez-votre-nouveau-mot-de-passe" id="confirmNewPassword" name="Newpassword_confirmation" value="{{ old('confirmNewPassword') }}">
            
            <button type="submit"><span class="confirmer">Confirmer</span></button>
        </form>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
    </div>
    
<script src="js/login.js"></script>
</body>
</html>