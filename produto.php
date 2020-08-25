<?php require_once 'services.php'; ?>

<!DOCTYPE html>
<html>

    <head>
        <title>Hangar 764</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <!-- Logo da Empresa -->
        <div class="Background col-sm12">

        </div>
        <div class="w-100 px-4 text-center hangar" style="position: absolute; top: 20%; ">
            <a class="head display-4 pb-3" href="index.php">Hangar 764</a>
        </div>
        <!-- Menu do Site -->

        <nav class="navbar navbar-expand navbar-dark bg-dark ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
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
        <br>

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

        <div id="btn-cadastro">
            <a href="CadastrarProd.php"> <button class="btn btn-outline-secondary ml-3">Clique aqui para cadastrar os produtos</button> </a>
        </div>

        <!-- Botão Dropdown -->
        <div class="container">
            <div class="row">
                <div class="btn-group py-4 col-md-6 col-12 ">
                    <button type="button" class="btn btn-outline-success button">Porções e lanches</button>
                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn-outline-success" id="hamburgueres" onclick="hamburgueres()" >Hambúrgueres</a>
                        <a class="dropdown-item btn-outline-success" id="lanches" onclick="lanches()">Lanches</a>
                        <a class="dropdown-item btn-outline-success" id="porcoes" onclick="porcao()">Porções</a>
                    </div>
                </div>
                <div class="btn-group py-4 col-md-6 col-12 ">
                    <button type="button" class="btn btn-outline-success button">Bebidas</button>
                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn-outline-success " id="refrigerante" onclick="refrigerante()" >Refrigerante</a>
                        <a class="dropdown-item btn-outline-success" id="bebidasalcoolicas" onclick="bebidasalcoolicas()">Bebidas alcoólicas</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
           
             <!-- Card dos hambúrgueres -->
            <div class="bg-white borda py-4" id="card-hamburgueres" >
                <?php 
                $hamburgueres = GetProdutos(2);
                ?>

                <?php while($produto=mysqli_fetch_array($hamburgueres)){ ?>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center ">
                        <img class="" src="<?= $produto['imagen'] ?>" alt="lanche">
                    </div> 
                    <div class="col-md-6 col-12 ">

                        <div class="col-md-12 text-center">
                            <h3 class="text-center"><?= $produto['produto'] ?></h3>
                            <label class=""><?= $produto['descr'] ?> - <b>R$<?= $produto['preco']?>,00</b></label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center py-3">
                            <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                            <button class="btn btn-outline-success tamanho" type="submit">+</button>
                            <label>0x</label> 
                            <br>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div> 
                    </div>

                </div>
                <br>



                <?php } ?>


            </div>
            
             <!-- Card dos Lanches -->

            <div class="bg-white borda py-4 " id="card-lanche" style="display: none">
                <?php 
                $lanches = GetProdutos(3);
                ?>

                <?php while($produto=mysqli_fetch_array($lanches)){ ?>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center">
                        <img class="" src="<?= $produto['imagen'] ?>" alt="lache">
                    </div> 
                    <div class="col-md-6 col-12">

                        <div class="col-md-12 text-center">
                            <h3 class="text-center"><?= $produto['produto'] ?></h3>
                            <label class="text-center"><?= $produto['descr'] ?> - <b>R$<?= $produto['preco']?>,00</b></label> 
                            <br>
                        </div>
                        <div class="col-md-12 text-center py-3">
                            <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                            <button class="btn btn-outline-success tamanho" type="submit">+</button>
                            <label>0x</label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div>
                    </div>
                </div>
                <br>
                <?php } ?>
            </div>

             <!-- Card das porções -->

            <div class="bg-white borda py-4 " id="card-porcoes" style="display: none">
                <?php 
                $porcoes = GetProdutos(5);
                ?>

                <?php while($produto=mysqli_fetch_array($porcoes)){ ?>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center ">
                        <img class="" src="<?= $produto['imagen'] ?>" alt="lache">
                    </div> 
                    <div class="col-md-6 col-12">

                        <div class="col-md-12 text-center">
                            <h3 class="text-center"><?= $produto['produto'] ?></h3>
                            <label class="text-center"><?= $produto['descr'] ?> - <b>R$<?= $produto['preco']?>,00</b></label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center py-3">
                            <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                            <button class="btn btn-outline-success tamanho" type="submit">+</button>
                            <label>0x</label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>

             <!-- Card dos refrigerantes-->

            <div class="bg-white borda py-4 " id="card-refrigerante" style="display: none">

                <?php 
                $refri = GetProdutos(1);
                ?>

                <?php while($produto=mysqli_fetch_array($refri)){ ?>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center ">
                        <img class="" src="<?= $produto['imagen'] ?>" alt="lache">
                    </div> 
                    <div class="col-md-6 col-12">

                        <div class="col-md-12 text-center">
                            <h3 class="text-center"><?= $produto['produto'] ?></h3>
                            <label class="text-center"><?= $produto['descr'] ?> - <b>R$<?= $produto['preco']?>,00</b></label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center py-3">
                            <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                            <button class="btn btn-outline-success tamanho" type="submit">+</button>
                            <label>0x</label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>
            
             <!-- Card das bebidas alcóolicas -->

            <div class="bg-white borda py-4 " id="card-bebidasalcoolicas" style="display: none">

                <?php 
                $bebida = GetProdutos(4);
                ?>

                <?php while($produto=mysqli_fetch_array($bebida)){ ?>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center">
                        <img class="" src="<?= $produto['imagen'] ?>" alt="lache">
                    </div> 
                    <div class="col-md-6 col-12">

                        <div class="col-md-12 text-center">
                            <h3 class="text-center"><?= $produto['produto'] ?></h3>
                            <label class="text-center"><?= $produto['descr'] ?> - <b>R$<?= $produto['preco']?>,00</b></label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center py-3">
                            <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                            <button class="btn btn-outline-success tamanho" type="submit">+</button>
                            <label>0x</label>
                            <br>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <?php } ?>
            </div>

        </div>

        <br>

        <!-- Footer do Site -->

        <footer class="bg-dark text-white">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4 col-6">
                        <h3 class="h3 text-center">Contatos</h3>
                        <ul class="list-unstyled text-secondary">
                            <li>Email: Hangar@gmail.com</li>
                            <li>Fone: 11 4564-3940</li>
                            <li>De Seg. à Sex. das 8h às 18h</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-6 ">
                        <h3 class="h3 text-center">Endereço</h3>
                        <p class="text-secondary"> Av. Pres. Kennedy, 764 - Santa Paula, São Caetano do Sul - SP, 09570-000
                        </p>
                    </div>
                    <div class="col-md-4 col-12 ">
                        <h3 class="h3 text-center">Redes Sociais</h3>
                        <ul class="list-unstyled">
                            <li class="text-center"><a class="btn btn-outline-secondary btn-sm btn-block mb-2"
                                                       href="https://www.facebook.com/hangar764">Facebook</a></li>
                            <li><a class="btn btn-outline-secondary btn-sm btn-block mb-2"
                                   href="https://www.instagram.com/hangar764/">Instagram</a></li>
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
        <script type="text/javascript" src="js/script.js"></script>
    </body>

</html>