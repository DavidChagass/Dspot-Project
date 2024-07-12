<?php
require_once '../Controller/DaoFuncionarios.php';
require_once '../Controller/DaoEstoque.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dominio = $_POST['dominio'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $resultados = DaoFuncionarios::Login($dominio, $email, $senha);
}



if ($resultados) {
    $_SESSION['logged_in'] = true;
    $_SESSION['dominio'] = $dominio;
    $_SESSION['nome'] = $resultados['nomeFuncionario'];
    $_SESSION['email'] = $resultados['emailFuncionario'];
    $_SESSION['senha'] = $resultados['senhaFuncionario'];
} elseif (isset($_POST['atualiza'])) {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {

        $quantatual = $_POST['quantAltera'] ?? null;
        $idestoque = $_POST['idEstoque'] ?? null;
        $dominio = $_SESSION['dominio'] ?? null; 

        if ($quantatual !== null && $idestoque !== null && $dominio !== null) {
            DaoEstoque::alterarProdutos($quantatual, $idestoque, $dominio);
        
        } else {
            echo 'Parâmetros inválidos';
        
        }
    } else {
        echo 'Usuário não autenticado';
    }

} else {
    $_SESSION['logged_in'] = false;
}



$dominio = $_SESSION['dominio'] ?? '';
$quantlinhas = DaoEstoque::contProdutos($dominio);
$dadosprodutos = DaoEstoque::dadosProdutos($dominio);


/* if ($resultados) {
    $dominio = htmlspecialchars($resultados['dominio']);
    $nome = htmlspecialchars($resultados['nomeFuncionario']);
    $email = htmlspecialchars($resultados['emailFuncionario']);
    $senha = htmlspecialchars($resultados['senhaFuncionario']); */
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina dos funcionarios - Dspot</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="../css/funcionario.plataform.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        $dominio = htmlspecialchars($_SESSION['dominio']);
        $nome = htmlspecialchars($_SESSION['nome']);
        $email = htmlspecialchars($_SESSION['email']);
        $senha = htmlspecialchars($_SESSION['senha']);

    ?>
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

                <?php if ($quantlinhas && is_array($dadosprodutos)) :
                    foreach ($dadosprodutos as $p) :
                ?>
                        <div class="card" style="width: 18rem;">
                            <a href="#"><img src="<?= $p['imagem'] ?>" class="card-img-top" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title"><?= $p['nomeProduto'] ?></h5>
                                <p class="card-text"><?= $p['detalhes'] ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Fornecedor - <?= $p['fornecedor'] ?></li>
                                <li class="list-group-item">Quantidade Atual - <?= $p['quantidadeAtual'] ?></li>
                                <li class="list-group-item">Quantidade Total - <?= $p['quantidadeTotal'] ?> </li>
                                <li class="list-group-item">Ultima saída - <?= $p['dataUltimaModificacao'] ?></li>
                            </ul>
                            <form action="" method="post">
                                <input type="hidden" name="dominio" value="<?= $dominio ?>">
                                <input type="hidden" name="idestoque" value="<?= $p['idEstoque'] ?>">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control productNumber" placeholder="" value="<?= $p['quantidadeAtual'] ?>" aria-describedby="addon-wrapping" name="quantAltera">
                                    <button type="submit" class="btn btn-primary" name="atualiza" value="adicionar">Adicionar</button>
                                    <button type="submit" class="btn btn-info" name="atualiza" value="retirar">Retirar</button>
                                </div>
                            </form>
                        </div>

                <?php endforeach;
                endif; ?>

            </div>
        </div>

    <?php

    } else {
        echo '<div style="margin-left: auto;margin-right: auto; margin-top:10%; width: 14%;">
             <h1>Login inválido</h1>
             <a class="btn btn-warning" style="text-decoration:none; color:black;" href="LogFuncionarios.php">Voltar ao login</a>
         </div>';
    }
    ?>

    <script>
        function recarregarAPagina() {
            window.location.reload();
        }
    </script>

</body>

</html>