<?php require_once 'services.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hangar 764</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- Logo da Empresa -->
        <div class="Background col-sm12">

        </div>
        <div class="w-100 px-4 text-center hangar" style="position: absolute; top: 20%; ">
            <a class="head display-4 pb-3" href="index.php"><span>Hangar 764</span></a>
        </div>
        <!-- Menu do Site -->

        <nav class="navbar navbar-expand navbar-dark bg-dark ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">  
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produto.php">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quem_somos.php">Quem somos</a>
                    </li>
                </ul>
                <a class="navbar-brand" href="carrinho.php">
                    <img src="img/icon-carrinho.png" width="30" height="30" class="d-inline-block align-top">
                </a>
                <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalLogin" type="submit">Login</button>
            </div>
        </nav>
        <!-- Login modal -->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitulo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLoginTitulo">Entre na Sua Conta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="Formulario">
                            <div class="form-group">
                                <label>Login:</label>
                                <input type="text" class="form-control" id="login">
                            </div>
                            <div class="form-group">
                                <label for="loginSenha">Senha:</label>
                                <input type="password" class="form-control" id="loginSenha">
                            </div>
                            <button type="reset" class="btn btn-success" onclick="Login()">Entrar na Conta</button>
                            <small class="form-text text-muted">Esqueceu a senha? <a href="#">Clique aqui</a>.</small>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <a href="produto.php"> <i class="fa fa-arrow-circle-left py-2 ml-4" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>

        <!-- Cadastrar os produtos -->
        <form class="form py-3 mb-3 mt-3 row borda" name="formulario_prod" action="Insert.php" method="post">

            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Nome do produto: </label> <br> <input class="form-control" type="text" name="NomeProd" value="" placeholder="Coloque o nome do produto" autofocus required>
            </div>

            <div class="form-group col-md-6">
                <div class="input-group-prepend">
                    <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Categoria:</label>
                </div>

                <select class="custom-select form-control" id="inputGroupSelect01" name="Categoria" required>
                    <option selected>Escolha...</option>
                    <?php 
                    $categorias = GetCategorias();
                    ?>

                    <?php while($produto=mysqli_fetch_array($categorias)){ ?>

                    <option value=" <?= $produto['idcategoria']?>"> <?= $produto['descr'] ?> </option>

                    <?php } ?>

                </select>
            </div>

            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Preço: </label> <br> <input class="form-control" type="text" name="Preco" value="" placeholder="Exemplo: '20'" required>
            </div>
            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Imagem: </label> <br> <input class="form-control" type="text" name="Imagem" value="img/" required>
            </div>
            <div class="col-md-6 text-center mx-auto form-group ">
                <label class="font-weight-bold">Descrição:</label>
                <textarea class="form-control" rows="3" name="Descr" placeholder="Coloque a descrição do produto" required></textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-outline-success">Salvar</button>
            </div>

        </form>



        <!-- Footer do Site -->

        <footer class="bg-dark text-white ">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4 col-6">
                        <h3 class="h3 ">Contatos</h3>
                        <ul class="list-unstyled text-secondary">
                            <li>Email: Hangar@gmail.com</li>
                            <li>Fone: 11 4564-3940</li>
                            <li>De Seg. à Sex. das 8h às 18h</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-6 ">
                        <h3 class="h3 text-center">Endereço</h3>
                        <p class="text-secondary"> Av. Pres. Kennedy, 764 - Santa Paula, São Caetano do Sul - SP, 09570-000</p>
                    </div>
                    <div class="col-md-4 col-12 ">
                        <h3 class="h3 text-center">Redes Sociais</h3>
                        <ul class="list-unstyled">
                            <li class="text-center"><a class="btn btn-outline-secondary btn-sm btn-block mb-2" href="https://www.facebook.com/hangar764">Facebook</a></li>
                            <li><a class="btn btn-outline-secondary btn-sm btn-block mb-2" href="https://www.instagram.com/hangar764/">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-light text-dark text-center py-3">
                <p class="mb-0">Hangar 764 © 2020. Alguns direitos reservados.</p>
            </div>
        </footer>

        <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/app.js"></script>

    </body> 


</html>
