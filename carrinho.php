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

        <!-- Produto escolhido -->


        <div class="container">
            <div class="bg-white borda py-4 min mt-3" >


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
                        <button class="btn btn-outline-danger tamanho" type="button" onclick="process(-1)">-</button>
                        <button class="btn btn-outline-success tamanho" type="button" onclick="process(1)" >+</button>
                        <span id="num">1</span> <span>x</span>
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
                        <button class="btn btn-outline-danger tamanho" type="button" onclick="process2(-1)">-</button>
                        <button class="btn btn-outline-success tamanho" type="button" onclick="process2(1)" >+</button>
                        <span id="num2">1</span> <span>x</span>
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
                     <?php 
                    if(isset($_SESSION['nome'])){  ?>
                    <a href="#"> <button class=" btn btn-outline-success"  type="submit">Confirmar compra</button> </a>
                     <?php }else{ ?>
                        <button class=" btn btn-outline-success"  type="submit" onclick="Alert_Login()">Confirmar compra</button>
                  <?php  }?>
                    
                   
                </div>
            </div>

        </div>





        <!-- Footer do Site -->

         <?php include('Footer.php'); ?>


    </body>

</html>