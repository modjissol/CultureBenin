<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('/adminlte/img/tri.jpg') center center/cover no-repeat fixed;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .auth-container {
            background-color: #111;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        .auth-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .auth-container form {
            margin-bottom: 20px;
        }
        .auth-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        .auth-container input::placeholder {
            color: #aaa;
        }
        .auth-container .form-group {
            position: relative;
        }
        .auth-container .form-group i {
            position: absolute;
            right: 10px;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
        }
        .auth-container button {
            width: 100%;
            padding: 10px;
            background-color: #e63946;
            color: #fff;
            body {
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .auth-container button:hover {
            background-color: #d62828;
        }
        .auth-container .links {
            text-align: center;
            margin-top: 10px;
        }
        .auth-container .links a {
            color: #e63946;
            text-decoration: none;
            font-weight: bold;
        }
        .auth-container .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h1 style="display:flex;align-items:center;justify-content:center;gap:16px;">
            <img src="{{ asset('adminlte/img/tele.webp') }}" alt="Logo Benin" style="max-width:40px;width:40px;height:40px;object-fit:contain;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);" />
                CULTURE BENIN
        </h1>

        <!-- Inscription -->
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Nom" name="name" required>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de ccpasse" name="password" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirmer votre mot de passe" name="password_confirmation" required>
            </div>
            <button type="submit">CRÉER UN COMPTE</button>
        </form>

        <div class="links">
            <p>ou</p>
            <p>Avez-vous un compte ? <a href="/login">Se connecter !</a></p>
        </div>
    </div>
</body>
</html>