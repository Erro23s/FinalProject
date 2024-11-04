<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" type="text/css" href="../../public/Css/pesquisar.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Música</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    
</head>
<body class="body2">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<Header>

<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php?action=perfil" >Perfil</a>
        </li>
    
        
      </ul>
     
    </Header>


<form action="../../index.php?action=pesquisar" method="POST">
    <input type="text" placeholder="Pesquisar música" name="pesquisar">
    <input type="submit" value="Pesquisar">
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
        <?php if (!empty($pesquisar)): ?>
            <?php foreach ($pesquisar as $musica): ?>
                <tr>
                    <td><?= htmlspecialchars($musica['titulo']) ?></td>
                    <td><?= htmlspecialchars($musica['artista']) ?></td>
                    <td><?= htmlspecialchars($musica['genero']) ?></td>
                    <td>
                        <a href="javascript:void(0);" onclick="loadVideo('<?= htmlspecialchars($musica['url_musica']) ?>')">
                            <img src="../../public/img/images.png" alt="Ouvir Música" width="30" height="30">
                        </a>
                    </td>
                    <td>
                        <li>Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></li>
                        <form action="../../index.php?action=validou" method="POST">
                                <input type="hidden" name="musica_id" value="<?= htmlspecialchars($musica['id']) ?>">
                                <input type="hidden" name="pesquisar" value="<?= htmlspecialchars($pesquisarTermo) ?>"> <!-- Adicione o termo da pesquisa -->
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