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


        <?php include('Header.php'); ?>




        <!-- Containers -->

        <a href="carrinho.php"> <i class="fa fa-arrow-circle-left py-2 ml-4" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>

        <section class="container py-3 bg-light mt-3 borda">
            <div class="row">
                <h1 class="center">Preencha os dados do pedido!</h1>
                <form class="col-lg-12" action="cadastro_funcionario_Bd.php" name="form_funcionario" method="post" onsubmit="return CheckDados(this)">


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
                            <input type="text" class="form-control" id="inputCargo" name="Cargo" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputLogin">Complemento</label>
                            <input type="text" class="form-control" id="inputComplemento" name="Complemento" required>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Forma de pagamento</label>
                            </div>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="Perfil" required> 
                                <option selected>Escolha...</option>



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


</html>

