<?php 
session_start();
require_once 'services.php';
?>
<!DOCTYPE html>
<html>


    <body>


        <?php include('Header.php'); ?>




        <!-- Containers -->


        <a href="carrinho.php"> <i class="fa fa-arrow-circle-left py-2 ml-4 sticky-top" onclick="goBack()" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>

        <section class="container py-3 bg-light mt-3 borda">
            <div class="row">
                <h2 class="center">Preencha o endereço para entrega!</h2>
                <form class="col-lg-12" action="endereco.php" name="form_endereco" method="post">


                    <div class="form-row">
                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputNome">Rua</label>
                            <input type="text" class="form-control" id="inputRua" name="Rua" required autofocus>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputCPF">Número</label>
                            <input type="text" class="form-control" id="inputNum" name="num" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputEmail">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="Bairro" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputTel">CEP</label>
                            <input type="text" class="form-control" id="inputCEP" name="CEP" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputLogin">Complemento</label>
                            <input type="text" class="form-control" id="inputComplemento" name="Complemento" required>
                        </div>
                    </div>
                  
                    <center> <button class=" btn btn-success"  type="submit" >Cadastrar</button> </center>
                          
                </form>
            </div>



        </section>

        <br>


        <br>


        <?php include('Footer.php'); ?>



    </body>
    
    <script>
         $('#inputCEP').mask("99999-999");
    
    </script>


</html>

