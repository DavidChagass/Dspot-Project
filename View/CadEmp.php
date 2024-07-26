<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/cadEmp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="../js/CpfCnpj.validate.js"></script>
    <script defer src="../js/dom.validate.js"></script>
    <link href="https://fonts.cdnfonts.com/css/berlin-sans-fb" rel="stylesheet">
    <title>Dspot - Empresas</title>
</head>

<body>
    <!--[if lt IE 9]>
	    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->
    <form action="Empresas.php" method="post">
        <h1>Cadastro de Empresa</h1>
        <div class="account">            
            <input type="text" required="required" name="NomeEmpresa" class="endereco" placeholder="Nome Da Empresa">
            <input type="text" required="required" id="dominio" name="dominio" class="endereco" placeholder="Dominio">
            
        </div>
        <div class="account">
            <input type="email" required="required" name="email" class="email" placeholder="E-mail">
            <input type="tel" required="required" name="telefone" class="telefone" placeholder="telefone">
        </div>

        <button class="enviar btn-4 custom-btn" type="submit">Cadastrar</button>
    </form>
</body>

</html>
