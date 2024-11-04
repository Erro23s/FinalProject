<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../../public/Css/Show.css" media="screen" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/feather-icons"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <Header>

<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
<a class="navbar-brand" href="../index.php?action=validou">Home</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

</div>
</nav>
<div class="fundo">

  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container">
      <div class="wrapper">
        <div class="user">
          <div class="info">
            <div class="icon"></div>
            <h1><?php echo htmlspecialchars($userData['name']); ?></h1>
            <p><?php echo htmlspecialchars($userData['email']); ?></p>
          </div>
          <div class="button">
            <i data-feather="edit"></i>
            <p type="button">Editar (Em breve) </p>
          </div>
        </div>
        <div class="stats">
          <div class="projects">
            <p>Avaliações </p>
            <h1>Em breve</h1>
          </div>
        </div>
      </div>
    </div>
</div>
    <script>
      feather.replace();
    </script>
  </body>
</html>