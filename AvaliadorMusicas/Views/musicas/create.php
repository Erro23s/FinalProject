<h1>Cadastrar Nova Música</h1> 

<form action="store.php" method="POST"> 

    <label for="titulo">Título:</label> 

    <input type="text" name="titulo" required> 

 

    <label for="artista">Artísta/Banda:</label> 

    <input type="text" name="artista" required> 

 

    <label for="genero">Gênero:</label> 

    <input type="text" name="genero"> 

 

    <label for="url_musica">URL da Música (YouTube, Spotify, etc.):</label> 

    <input type="url" name="url_musica"> 

 

    <button type="submit">Cadastrar Música</button> 

</form> 