<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Plataforma Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #2C3E50, #4CA1AF);
        }
        .login-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 420px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #2C3E50;
            font-size: 1.8rem;
        }
        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
        }
        .input-group label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }
        .input-group i {
            position: absolute;
            right: 12px;
            top: 37px;
            color: #7f8c8d;
        }
        .error-message {
            color: red;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }
        .login-button {
            background: #2C3E50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }
        .login-button:hover {
            background: #34495E;
        }
        .forgot-password {
            display: block;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #2980B9;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2><i class="fas fa-user-lock"></i> Iniciar Sesión</h2>
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="correo">Cedula:</label>
                <input type="text" id="cedula" name="cedula" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" class="login-button">Ingresar</button>
           
        </form>
    </div>
</body>
</html>
