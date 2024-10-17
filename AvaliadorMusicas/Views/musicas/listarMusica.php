<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link rel="stylesheet" type="text/css" href="../../public/Css/listarMusica.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Música</title>

    <script>
        // Carrega a API do YouTube apenas se ela ainda não estiver carregada
        if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        }

        let player;

        function initializeYouTubePlayer() {
            if (typeof YT !== 'undefined' && typeof YT.Player !== 'undefined') {
                // Inicializa o player do YouTube
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
            // O que fazer quando o player estiver pronto (se necessário)
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                closeModal();
            }
        }

        // Recarrega o player sempre que a página é carregada
        document.addEventListener('DOMContentLoaded', function () {
            initializeYouTubePlayer();
        });
    </script>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border-radius: 4px;
            max-width: 700px;
            width: 90%;
            position: relative;
        }

        .close {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>

<link rel="stylesheet" type="text/css" href="../../public/Css/listarMusica.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Música</title>
   

</head>
<body>
    <Header>
            <button action="../../index.php?action=validou" method="post">Home</button>
            <button action="../../index.php?action=perfil" method="post">Usuario</button>

    </Header>

<h1>Home</h1>

<form action="../../index.php?action=pesquisar" method="POST">
    <input type="text" placeholder="Pesquisar música" name="pesquisar">
    <input type="submit" value="Pesquisar">
</form>

<form method="GET" action="../../index.php?action=pesquisar">
    <input type="hidden" name="action" value="listar">
    <button type="submit" name="ordem" value="DESC">Mais Bem Avaliadas</button>
    <button type="submit" name="ordem" value="ASC">Menos Bem Avaliadas</button>
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
                            <img src="../../public/Css/images.png" alt="Ouvir Música" width="30" height="30">
                        </a>
                    </td>


                    <td><a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">
                        <img src="../../public/Css/images.png" alt="Ouvir Música" width="20" height="20">
                    </a></td>

                    

                    <td>
                        <li>Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></li>
                        <form action="../../index.php?action=validou" method="POST">
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

<!-- Modal de vídeo -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="player"></div>
    </div>
</div>

</body>
</html>