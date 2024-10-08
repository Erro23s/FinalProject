<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="stylesheet" type="text/css" href="../../public/Css/listarMusica.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Música</title>
   
</head>
<body>

<h1>Home</h1>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Artista</th>
            <th>Gênero</th>
            <th>Música</th>
            <th>Avaliações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listarmusica)): ?>
            <?php foreach ($listarmusica as $musica): ?>
                <tr>
                    <td><?= htmlspecialchars($musica['titulo']) ?></td>
                    <td><?= htmlspecialchars($musica['artista']) ?></td>
                    <td><?= htmlspecialchars($musica['genero']) ?></td>
                    <td><a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">
                        <img src="../../public/Css/images.png" alt="Ouvir Música" width="20" height="20">
                    </a></td>
                    
                    <td>
                        <li>Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></li>
                        <form action="../../index.php?action=avaliar" method="POST">
                            <input type="hidden" name="musica_id" value="<?= htmlspecialchars($musica['id']) ?>">
                            <select name="avaliacao">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit">Avaliar</button>
                        </form>
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