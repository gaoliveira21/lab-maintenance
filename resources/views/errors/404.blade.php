<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow: hidden;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            margin-top: 25px;
            text-align: center;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        img {
            width: 100%;
            height: 100%;
        }

        a {
            text-decoration: none;
            color: #dc3545;
            font-family: 'Roboto', sans-serif;
            background: transparent;
            border: 1px solid #dc3545;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            transition: all 0.4s ease-in-out;
        }

        a:hover {
            background: #dc3545;
            color: #fff;
            border: 1px solid #fff;
        }
    </style>

    <title>404 Página não encontrada</title>
</head>
<body>
    <div class="container">
        <h1>Página não encontrada</h1>
        <a href="/">Voltar para página principal</a>
        <img src="/img/404.svg" alt="Página não encontrada">
    </div>
</body>
</html>
