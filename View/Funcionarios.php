<?php
require_once '../Controller/DaoFuncionarios.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $resultados = DaoFuncionarios::Login($dominio, $email, $senha);
}
if ($resultados) {
    $dominio = htmlspecialchars($resultados['dominio']);
    $nome = htmlspecialchars($resultados['nomeFuncionario']);
    $email = htmlspecialchars($resultados['emailFuncionario']);
    $senha = htmlspecialchars($resultados['senhaFuncionario']);
} else {
    echo "Login inválido";
}
$descricao = null;
$marca = null;
$quantatual = null;
$quanttotal = null;
$ultimasaida = null;
$nomeproduto = null;



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nome ?> - Dspot</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="../css/funcionario.plataform.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <!--[if lt IE 9]>
	    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <![endif]-->
    <div class="container-fluid mainContainer">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../img/Logo.png" alt="Bootstrap" width="130" height="28">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Assinatura</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cargos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Funcionário</a></li>
                                <li><a class="dropdown-item" href="#">Gerente</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Empresa</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Produto" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid produtos">
            <div class="card" style="width: 18rem;">
                <a href="#"><img src="..." class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title"><?= $nomeproduto ?></h5>
                    <p class="card-text"><?= $descricao ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Marca - <?= $marca ?></li>
                    <li class="list-group-item">Quantidade Atual - <?= $quantatual ?></li>
                    <li class="list-group-item">Quantidade Total - <?= $quanttotal ?>  </li>
                    <li class="list-group-item">Ultima saída - <?= $ultimasaida ?></li>
                </ul>
                <form class="control d-flex">
                    <button type="button" class="btn btn-info">Adicionar</button>
                    <input type="number" class="form-control productNumber" placeholder="0" aria-describedby="addon-wrapping">
                    <button type="button" class="btn btn-info">Retirar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>