<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNC Navigator</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');

        :root {
            --blue-main: #1E88E5;
            --blue-soft: #64B5F6;
            --dark-1: #050B18;
            --dark-2: #08101F;
            --text-muted: #97A4B8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #e2e8f0;
            background:
                linear-gradient(rgba(5, 11, 24, 0.90), rgba(5, 11, 24, 0.95)),
                url("https://pnc.ac.id/wp-content/uploads/2020/03/Logo-PNC.png");
            background-size: 260px;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--blue-main);
            text-shadow: 0 0 12px rgba(30, 136, 229, 0.6);
            margin-bottom: 10px;
        }

        p {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 600px;
            margin-bottom: 30px;
        }

        .btn-wrap {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 10px;
            border: 2px solid var(--blue-main);
            background-color: transparent;
            color: var(--blue-main);
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease-in-out;
        }

        .btn:hover {
            background-color: var(--blue-main);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 0 16px rgba(30, 136, 229, 0.6);
        }

        footer {
            position: absolute;
            bottom: 20px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }
    </style>
</head>

<body>

    <h1>Selamat Datang di PNC NAVIGATOR</h1>
    <p>
        Platform navigasi kampus modern yang membantu mahasiswa dan tamu menemukan lokasi di wilayah
        Politeknik Negeri Cilacap dengan mudah.
    </p>

    <div class="btn-wrap">
        <a href="/eksplor">
            <button class="btn">Mulai Eksplor</button>
        </a>

        <a href="/tentang">
            <button class="btn">Tentang Aplikasi</button>
        </a>
    </div>

    <footer>© 2025 PNC Navigator · Politeknik Negeri Cilacap</footer>
</body>
</html>
