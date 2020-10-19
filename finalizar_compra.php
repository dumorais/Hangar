<?php 
session_start();
require_once 'services.php';
if(empty($_SESSION['nome'])){
    header("Location: carrinho.php");
}

?>
<!DOCTYPE html>
<html>


    <body>


        <?php include('Header.php'); ?>




        <!-- Containers -->


        <a href="carrinho.php"> <i class="fa fa-arrow-circle-left py-2 ml-4 sticky-top" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>

        <section class="container py-3 bg-light mt-3 borda">
            <div class="row">
                <h1 class="center">Preencha os dados do pedido!</h1>
                <form class="col-lg-12" action="finalizar.php" name="form_finalizar" method="post">


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
                            <input type="email" class="form-control" id="inputBairro" name="Bairro" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputTel">CEP</label>
                            <input type="text" class="form-control" id="inputCEP" name="Cargo" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputLogin">Complemento</label>
                            <input type="text" class="form-control" id="inputComplemento" name="Complemento" required>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Forma de pagamento</label>
                            </div>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="pagamento" required>
                                <option selected>Escolha...</option>
                                <?php 
                                $pagamento = GetPag();
                                ?>

                                <?php while($Pag=mysqli_fetch_array($pagamento)){ ?>

                                <option value=" <?= $Pag['idpagamento']?>"> <?= $Pag['formapagamento'] ?> </option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <center> <button class=" btn btn-success"  type="submit" onclick="Alert_Login()">Finalizar compra</button> </center>
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

