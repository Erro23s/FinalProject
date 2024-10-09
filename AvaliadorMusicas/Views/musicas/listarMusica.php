<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link rel="stylesheet" type="text/css" href="../../public/Css/listarMusica.css" media="screen" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Música</title>

    <script src="https://www.youtube.com/iframe_api"></script>
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

<h1>Home</h1>

<form action="../../index.php?action=pesquisar" method="POST">
    <input type="text" placeholder="Pesquisar musica" name="pesquisar">
    <input type="submit">
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


<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="player"></div>
    </div>
</div>

<script>
    let player;  

    
    function onYouTubeIframeAPIReady() {
        
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

    function loadVideo(videoUrl) {
        const videoId = getYouTubeVideoId(videoUrl);
        console.log("Video URL:", videoUrl);  
        console.log("Extracted Video ID:", videoId);  

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
</script>

</body>
</html>