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
            <a class="head display-4 pb-3" href="index.php"><span>Hangar 764</span></a>
        </div>
        <!-- Menu do Site -->

        <nav class="navbar navbar-expand navbar-dark bg-dark ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">  
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
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
        <!-- Carrossel da Home -->



     <!--   <div class="title">
            <div class="bg-success text-center borda ">
                <h4 class="titulo py-1">Promoções</h4>
            </div>
        </div>  -->


        <div id="carouselExampleIndicators" class="carousel slide carousel1 mt-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item  active">

                    <div class="carousel-caption">
                      
                        <button class="carousel caption btn btn-light btn-promo" type="button" onclick="Promo1()" >Adicionar ao carrinho</button>
                    </div>

                    <img src="img/1.png" class="d-block w-100 image" alt="...">
                </div>

                <div class="carousel-item">
                    <div class="carousel-caption">
                  
                        <button class="carousel caption btn btn-light btn-promo" type="button" onclick="Promo2()">Adicionar ao carrinho</button> 
                    </div>
                    <img src="img/2.png" class="d-block w-100 image" alt="...">
                </div>

    
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>

        <!-- Container da Home -->



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
         <script type="text/javascript" src="js/script.js"></script>
    </body> 


</html>