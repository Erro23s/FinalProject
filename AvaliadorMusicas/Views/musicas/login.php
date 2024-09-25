<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Usuário</title>
    <style>
  div{ 
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form method="POST" action="../index.php?action=create">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Cadastrar</button>
        </form>

        <label for="a">Não tem conta?</label>
        <a href="login?action=cadrastro">Clique aqui</a>
    </div>
    

    
</body>
</html>