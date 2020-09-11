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
        <?php include('Header.php'); ?>

        <?php 
            if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

        ?>
        <div id="btn-cadastro" class="mt-2">
            <a href="CadastrarProd.php"> <button class="btn btn-outline-secondary ml-3">Clique aqui para cadastrar os produtos</button> </a>
        </div>
        <?php } ?>

        <!-- Botão Dropdown -->
        <div class="container">
            <div class="row">
                
                <div class="btn-group py-4 col-md-6 col-12 ">
                    <button type="button" class="btn btn-outline-success button">Porções e lanches</button>
                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn-outline-success" id="hamburgueres" onclick="hamburgueres()" >Hambúrguers</a>
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
            
            <div class="bg-white borda py-4 mb-2" id="card-hamburgueres" >
                <?php 
                $hamburgueres = GetProdutos(2);
                ?>

                <form action="excluir_produto.php" id="form_produto" method="post" name="form_excluir">
                    <input hidden id="idproduto" name="idproduto">

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
                                <label id="preco-<?= $produto['idproduto'] ?> ">0</label> <label>x</label> 
                                <br>
                            </div>
                            <?php 
                                if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

                            ?>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary"  type="button" onclick="Excluir(<?= $produto['idproduto'] ?>)">Excluir produto</button>
                            </div>
                            <?php } ?>
                        </div>

                    </div>

                    <br>



                    <?php } ?>
                </form>


            </div>

            <!-- Card dos Lanches -->

            <div class="bg-white borda py-4 " id="card-lanche" style="display: none">
                <?php 
                $lanches = GetProdutos(3);
                ?>

                <form action="excluir_produto.php" id="form_produto" method="post" name="form_excluir">
                    <input hidden id="idproduto" name="idproduto">

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
                                <label id="preco-<?= $produto['idproduto'] ?> ">0</label> <label>x</label>
                                <br>
                            </div>
                            <?php 
                                if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

                            ?>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary"  type="button" onclick="Excluir(<?= $produto['idproduto'] ?>)">Excluir produto</button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <?php } ?>
                </form>


            </div>

            <!-- Card das porções -->

            <div class="bg-white borda py-4 " id="card-porcoes" style="display: none">
                <?php 
                $porcoes = GetProdutos(5);
                ?>

                <form action="excluir_produto.php" id="form_produto" method="post" name="form_excluir">
                    <input hidden id="idproduto" name="idproduto">

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
                                <label id="preco-<?= $produto['idproduto'] ?> ">0</label> <label>x</label>
                                <br>
                            </div>
                            <?php 
                                if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

                            ?>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary"  type="button" onclick="Excluir(<?= $produto['idproduto'] ?>)">Excluir produto</button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php } ?>
                </form>
            </div>

            <!-- Card dos refrigerantes-->

            <div class="bg-white borda py-4 " id="card-refrigerante" style="display: none">

                <?php 
                $refri = GetProdutos(1);
                ?>

                <form action="excluir_produto.php" id="form_produto" method="post" name="form_excluir">
                    <input hidden id="idproduto" name="idproduto">

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
                                <label id="preco-<?= $produto['idproduto'] ?> ">0</label> <label>x</label>
                                <br>
                            </div>
                            <?php 
                                if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

                            ?>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary"  type="button" onclick="Excluir(<?= $produto['idproduto'] ?>)">Excluir produto</button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>


                    <?php } ?>
                </form>
            </div>

            <!-- Card das bebidas alcóolicas -->

            <div class="bg-white borda py-4 " id="card-bebidasalcoolicas" style="display: none">

                <?php 
                $bebida = GetProdutos(4);
                ?>

                <form action="excluir_produto.php" id="form_produto" method="post" name="form_excluir">
                    <input hidden id="idproduto" name="idproduto">

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
                                <label id="preco-<?= $produto['idproduto'] ?> ">0</label> <label>x</label>
                                <br>
                            </div>
                            <?php 
                                if(isset($_SESSION['nome']) & $_SESSION['categoria'] == 2){

                            ?>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary"  type="button" onclick="Excluir(<?= $produto['idproduto'] ?>)">Excluir produto</button>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <?php } ?>
                </form>
            </div>

        </div>

       

        <!-- Footer do Site -->

        <?php include('Footer.php'); ?>

        



    </body>

</html>