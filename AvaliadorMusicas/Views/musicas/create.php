<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="stylesheet" type="text/css" href="../../public/Css/listarMusica.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nova Música</title>

    <script>

        if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        }

        let player;

        function initializeYouTubePlayer() {
            if (typeof YT !== 'undefined' && typeof YT.Player !== 'undefined') {
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: '',
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }
        }

        function onYouTubeIframeAPIReady() {
            initializeYouTubePlayer();
        }

        function loadVideo(videoUrl) {
            const videoId = getYouTubeVideoId(videoUrl);
            if (!player || typeof player.loadVideoById !== 'function') {
                alert('Player ainda não está pronto. Aguarde.');
                return;
            }

            if (videoId) {
                player.loadVideoById(videoId);
                openModal();
            } else {
                alert('URL do vídeo inválida ou player não carregado!');
            }
        }

        function getYouTubeVideoId(url) {
            const regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/embed\/)([^"&?\/\s]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }

        function openModal() {
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
            if (player) {
                player.stopVideo();
            }
        }

        function onPlayerReady(event) {
          
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                closeModal();
            }
        }

     
        document.addEventListener('DOMContentLoaded', function () {
            initializeYouTubePlayer();
        });
    </script>
</head>
<body>

<head>
    <link rel="stylesheet" href="../../public/Css/musicaCadastro.css">
</head>


<h1>Cadastrar Nova Música</h1>

<form action="../index.php?action=cadastro" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>

    <br />

    <label for="artista">Artísta/Banda:</label>

    <input type="text" name="artista" required>

    <br />


    <label for="genero">Gênero:</label>
    <input type="text" name="genero">


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
                    <td>
                    <a href="javascript:void(0);" onclick="loadVideo('<?= htmlspecialchars($musica['url_musica']) ?>')">
                    <img src="../../public/Img/images.png" alt="Ouvir Música" width="30" height="30">
                        </a>
                    </td>

                    <td>
                        <li>Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></li>

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
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="player"></div>
    </div>
</div>
</body>
</html>