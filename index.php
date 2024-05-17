<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/main.js"></script>
    <link href="https://fonts.cdnfonts.com/css/berlin-sans-fb" rel="stylesheet">
    <title>Medicine-Bank</title>
</head>

<body>
    <!--[if lt IE 9]>
	    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->
    <form action="Php/Funcionarios.php" method="post">
        <div class="conteiner">
            <input type="text" required="required" onchange="domn()" name="dominio" class="dominio" maxlength="8" placeholder="Domínio">
        </div>
        <div class="account">
            <input type="email" required="required" name="email" class="email" placeholder="E-mail">
            <input type="password" required="required" name="senha" class="senha" placeholder="Senha">
        </div>
        <button class="enviar btn-4" type="submit">ENTRAR</button>
    </form>
</body>

</html>
