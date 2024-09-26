<head>
    <link rel="stylesheet" href="../../public/Css/musicaCadastro.css">
</head>

<h1>Cadastrar Nova Música</h1>
 
<form action="../index.php?action=cadastro" method="POST">
 
    <label for="titulo">Título:</label>
 
    <input type="text" name="titulo" required>
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
 
    <input type="url" name="url_musica">
 
 
 
    <button type="submit">Cadastrar Música</button>
 
</form>