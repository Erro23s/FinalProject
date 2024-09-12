<h1>Lista de Músicas</h1> 

<a href="create.php">Cadastrar Nova Música</a> 

 

<table> 

    <thead> 

        <tr> 

            <th>Título</th> 

            <th>Artista/Banda</th> 

            <th>Gênero</th> 

            <th>Avaliação Média</th> 

            <th>Ações</th> 

        </tr> 

    </thead> 

    <tbody> 

        <?php foreach ($musicas as $musica): ?> 

        <tr> 

            <td><?= htmlspecialchars($musica['titulo']) ?></td> 

            <td><?= htmlspecialchars($musica['artista']) ?></td> 

            <td><?= htmlspecialchars($musica['genero']) ?></td> 

            <td><?= htmlspecialchars($musica['media_avaliacao']) ?></td> 

            <td> 

                <a href="show.php?id=<?= $musica['id'] ?>">Ver Detalhes</a> 

            </td> 

        </tr> 

        <?php endforeach; ?> 

    </tbody> 

</table> 