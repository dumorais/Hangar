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
                    <li class="nav-item ">
                        <a class="nav-link" href="produto.php">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quem_somos.php">Quem somos</a>
                    </li>
                </ul>
                <a class="navbar-brand" href="#">
                    <img src="img/icon-carrinho.png" width="30" height="30" class="d-inline-block align-top">
                </a>
                <button class="btn btn-outline-secondary" type="submit">Login</button>
            </div>
        </nav>
        <br>

        <!-- Produto escolhido -->


        <div class="container">
            <div class="bg-white borda py-4 min" >


                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center ">


                        <h2>Promoção 2x hamburgues</h2>

                        <label class="col-sm-12" >Selecione os hamburguers:</label>

                        <select name="hamburguer" id="hamburguer1">
                            <?php 
                            $hamburgueres = GetProdutos(2);
                            ?>

                            <?php while($produto=mysqli_fetch_array($hamburgueres)){ ?>
                            <option><?= $produto['produto']?></option>
                            <?php } ?>
                        </select>

                        <select name="hamburguer" id="hamburguer2">
                            <?php 
                            $hamburgueres = GetProdutos(2);
                            ?>

                            <?php while($produto=mysqli_fetch_array($hamburgueres)){ ?>
                            <option><?= $produto['produto']?></option>
                            <?php } ?>
                        </select>

                        <div>
                            <p><b>Valor: R$25,00</b></p>
                        </div>

                    </div> 



                    <div class="col-md-3 text-center py-3">
                        <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                        <button class="btn btn-outline-success tamanho" type="submit">+</button>
                        <label>1x</label>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div> 
                    </div>


                </div>

                <div class="row mb-4">

                    <div class="col-md-6 col-12 text-center ">


                        <h2>Promoção hamburguer e porção</h2>

                        <label class="col-sm-12">Selecione o hamburguer e a porção:</label>

                        <select name="hamburguer" id="hamburguer1" class="">
                            <?php 
                            $hamburgueres = GetProdutos(2);
                            ?>

                            <?php while($produto=mysqli_fetch_array($hamburgueres)){ ?>
                            <option><?= $produto['produto']?></option>
                            <?php } ?>
                        </select>

                        <select name="porção" id="porção" class="porcao " >
                            <?php 
                            $porcoes = GetProdutos(5);
                            ?>

                            <?php while($produto=mysqli_fetch_array($porcoes)){ ?>
                            <option><?= $produto['produto']?></option>
                            <?php } ?>
                        </select>
                        
                         <div>
                            <p><b>Valor: R$35,00</b></p>
                        </div>

                    </div> 



                    <div class="col-md-3 text-center py-3">
                        <button class="btn btn-outline-danger tamanho" type="submit">-</button>
                        <button class="btn btn-outline-success tamanho" type="submit">+</button>
                        <label>1x</label>
                    </div>

                    <div class="col-md-3 py-3">
                        <div class="text-center">
                            <button class="btn btn-secondary" type="submit">Excluir produto</button>
                        </div> 
                    </div>


                </div>

                <div class="total py-1" >
                    <b>Total: R$60,00</b>
                </div>

            </div>



            <div class="row mt-3 mb-3 text-center"> 
                <div class="col-md-6 col-6">
                    <button class="btn btn-outline-danger" type="submit">Cancelar compra</button>
                </div>
                <div class="col-md-6 col-6">
                    <button class=" btn btn-outline-success" type="submit">Confirmar compra</button>
                </div>
            </div>

        </div>





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