
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nova Música</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="url"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }

        .no-music {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>

<head>
    <link rel="stylesheet" href="../../public/Css/musicaCadastro.css">
</head>


<h1>Cadastrar Nova Música</h1>

<form action="../index.php?action=cadastro" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>


    <label for="artista">Artista/Banda:</label>
    <input type="text" name="artista" required>


    <br />
    <br />
 
 
    <label for="artista">Artísta/Banda:</label>
 
    <input type="text" name="artista" required>
    <br />
    <br />
 
 

    <label for="genero">Gênero:</label>
    <input type="text" name="genero">


    <br />
    <br />
 
 
    <label for="url_musica">URL da Música (YouTube, Spotify, etc.):</label>
    <input type="url" name="url_musica" required>

    <button type="submit">Cadastrar Música</button>
</form>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Artista</th>
            <th>Gênero</th>
            <th>URL</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listarmusica)): ?>
            <?php foreach ($listarmusica as $musica): ?>
                <tr>
                    <td><?= htmlspecialchars($musica['titulo']) ?></td>
                    <td><?= htmlspecialchars($musica['artista']) ?></td>
                    <td><?= htmlspecialchars($musica['genero']) ?></td>
                    <td><a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">Ouvir Música</a></td>
                    <td>
                        <a href="show.php?id=<?= $musica['id'] ?>">Ver Detalhes</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="no-music">Nenhuma música encontrada.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>