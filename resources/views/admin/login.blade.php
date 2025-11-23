<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PNC Navigator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #7209b7;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --danger: #e63946;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 450px;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-logo {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, #e3f2fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .login-logo i {
            margin-right: 0.5rem;
        }

        .login-header h1 {
            font-size: 1.8rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: white;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .input-with-icon input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .input-with-icon input:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
        }

        .input-with-icon input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .login-btn {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-info {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--success);
        }

        .login-info h4 {
            color: white;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .login-info p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
        }

        .back-link a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: white;
        }

        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            background: rgba(230, 57, 70, 0.2);
            border: 1px solid rgba(230, 57, 70, 0.3);
            color: white;
            text-align: center;
        }

        /* RESPONSIVE */
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }

            .login-container {
                padding: 2rem 1.5rem;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <i class="fas fa-map-marked-alt"></i>
                PNC NAVIGATOR
            </div>
            <h1>Admin Login</h1>
            <p>Masuk ke panel administrasi</p>
        </div>

        @if(session('error'))
            <div class="alert">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <div class="login-info">
            <h4><i class="fas fa-info-circle"></i> Informasi Login</h4>
            <p>Gunakan kredensial admin untuk mengakses panel manajemen ruangan.</p>
        </div>

        <form method="GET" action="/admin/do-login">
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="admin@pnc.ac.id" value="admin@pnc.ac.id" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" value="admin123" required>
                </div>
            </div>

            <button type="submit" class="login-btn">
                <i class="fas fa-sign-in-alt"></i> Login ke Admin Panel
            </button>
        </form>

        <div class="back-link">
            <a href="/">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        // Animasi input focus
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Loading effect
        document.querySelector('form').addEventListener('submit', function() {
            const btn = document.querySelector('.login-btn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            btn.disabled = true;
        });
    </script>
</body>
</html> 