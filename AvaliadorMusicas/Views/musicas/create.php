<h1>Cadastrar Nova Música</h1> 

<form action="store.php" method="POST"> 

    <label for="titulo">Título:</label> 

    <input type="text" name="titulo" required> 

 

    <label for="artista">Artista/Banda:</label> 

    <input type="text" name="artista" required> 

 

    <label for="genero">Gênero:</label> 

    <input type="text" name="genero"> 

 

    <label for="url_musica">URL da Música (YouTube, Spotify, etc.):</label> 

    <input type="url" name="url_musica"> 

 

    <button type="submit">Cadastrar Música</button> 

</form> 

 

View para Visualizar e Avaliar uma Música - views/musicas/show.php 

 

<h1><?= htmlspecialchars($musica['titulo']) ?></h1> 

<p>Artista/Banda: <?= htmlspecialchars($musica['artista']) ?></p> 

<p>Gênero: <?= htmlspecialchars($musica['genero']) ?></p> 

 

<?php if ($musica['url_musica']): ?> 

    <a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">Ouvir Música</a> 

<?php endif; ?> 

 

<h2>Avaliação Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></h2> 

 

<h3>Avaliar esta Música:</h3> 

<form action="rate.php?id=<?= $musica['id'] ?>" method="POST"> 

    <label for="nota">Nota (1-5):</label> 

    <select name="nota" required> 

        <option value="1">1</option> 

        <option value="2">2</option> 

        <option value="3">3</option> 

        <option value="4">4</option> 

        <option value="5">5</option> 

    </select> 

    <button type="submit">Enviar Avaliação</button> 

</form> 