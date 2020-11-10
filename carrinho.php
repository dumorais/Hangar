<?php require_once 'services.php'; 
//Puxando a página services onde está as funções do php
?>
<!DOCTYPE html>
<html>



    <body>
        <?php include('Header.php'); 
        //Puxando o header pelo php
        ?>

        <!-- Produto escolhido -->


        <div class="container">
            <form name="form_finalizar">
                <div class="bg-white borda py-4 min mt-3" >


                    <div id="div-produtos"></div>




                    <div class="total px-2" id="total">
                    </div>

                </div>



                <div class="row mt-3 mb-3 text-center"> 
                    <div class="col-md-6 col-6">
                        <button class="btn btn-outline-danger" type="submit">Cancelar compra</button>
                    </div>

                    <div class="col-md-6 col-6">
                        <?php 
                        if(isset($_SESSION['nome'])){  
                            //Vendo se a session nome existe
                        ?>
                        <button class=" btn btn-outline-success" data-toggle="modal" data-target="#modalCompra" type="button">Confirmar compra</button> 
                        <?php }else{ ?>
                        <button class=" btn btn-outline-success"  type="button" onclick="Alert_Login()">Confirmar compra</button>
                        <?php  }?>


                    </div>
                </div>


                <div class="modal fade" id="modalCompra" tabindex="-1" role="dialog" aria-labelledby="modalCompraTitulo"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCompraTitulo">Selecione o endereço e a forma de pagamento!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Endereço</label>

                                <select class="custom-select form-control" id="inputEndereco" onchange="Ende_selecionado(this)" name="endereco" required>
                                    <option selected>Escolha...</option>
                                    <?php 
                                    $ende = GetEnde();
                                    //Puxando a função getEnde para pegar os endereços cadastrados no banco de dados
                                    ?>

                                    <?php while($enderecos=mysqli_fetch_array($ende)){ 
    //Enquanto tiver endereços na tabela fazer isso:
                                    ?>

                                    <option data-rua="<?= $enderecos['rua']?>" data-num="<?= $enderecos['numero']?>" data-bairro="<?= $enderecos['bairro']?>" data-cep="<?= $enderecos['cep']?>" data-comp="<?= $enderecos['complemento']?>" value=" <?= $enderecos['idendereco']?>"> <?= $enderecos['rua']?>,  <?= $enderecos['numero']?> </option>

                                    <?php } ?>

                                </select>
                                <small class="form-text text-muted">Deseja usar outro endereço? <a href="cadastro_endere%C3%A7o.php">Clique aqui</a>.</small>

                                <div class="font-weight-bold">
                                    <label for="inputRua">Rua:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputRua" name="rua" >
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputNum">Número:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputNum" name="Num" >
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputBairro">Bairro:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputBairro" name="bairro" >
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputCEP">CEP:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputCEP" name="cep">
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputComp">Complemento:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputComp" name="complemento" >
                                </div>


                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Forma de pagamento</label>

                                <select class="custom-select form-control" id="inputPagamento" onchange="troco(this)" name="pagamento" required>
                                    <option selected>Escolha...</option>
                                    <?php 
                                    $pag = GetPag();
                                    //Puxando a função GetPag para pegar as formas de pagamento cadastradas
                                    ?>

                                    <?php while($forma=mysqli_fetch_array($pag)){ 
    //enquanto tiver formas de pagamento fazer isso:
                                    ?>

                                    <option data-troco=" <?= $forma['idpagamento']?>"  value=" <?= $forma['idpagamento']?>"> <?= $forma['formapagamento'] ?> </option>

                                    <?php } ?>

                                </select>

                                <div class="form-group font-weight-bold" style="display: none" id="divTroco">
                                    <label for="inputroco">Troco:</label>
                                    <input type="text" class="form-control" id="inputTroco" placeholder="Precisa de troco?" required>
                                </div>


                                <div class="modal-footer d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-success btn btn-default" onclick="Finalizar_compra()" >Finalizar compra</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>





        <!-- Footer do Site -->

        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>


        <?php 
        if(isset($_SESSION['msg_endereco'])){
            echo "<script>alert('" . $_SESSION['msg_endereco'] . "');</script>";
            unset ($_SESSION['msg_endereco']);
            //Vendo se a session msg_endereco existe, se existir mostrar a mensagem e depois apaga ela da session
        } ?>

        <script>
            $(function () {
                Carregar_carrinho();
                //Puxando a função Carregar_carrinho para mostrar os produtos que o usuário escolheu
            });




        </script>



    </body>

</html>