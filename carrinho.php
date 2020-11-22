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
                    <div class="total px-2" id="total"></div>

        <!-- Espaço onde fica os produtos selecionados pelo cliente -->
                </div>

                <div class="row mt-3 mb-3 text-center"> 
                    <div class="col-md-6 col-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem um botão para cancelar a compra -->
                        <button class="btn btn-outline-danger" type="submit">Cancelar compra</button>
        <!-- Botão que tem a função de remover todos os produtos do carrinhho, assim cancelando a compra -->
                    </div>

                    <div class="col-md-6 col-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem um botão para confirmar a compra -->
                        <?php 
                        if(isset($_SESSION['nome'])){  
                            //Vendo se a session nome existe
                        ?>
                        <button class=" btn btn-outline-success" data-toggle="modal" data-target="#modalCompra" type="button">Confirmar compra</button> 
                        <?php }else{ ?>
                        <button class=" btn btn-outline-success"  type="button" onclick="Alert_Login()">Confirmar compra</button>
        <!-- Função so irá ocorrer se o cliente estiver logado -->
                        <?php  }?>
        <!-- Botão que tem a função de confirmar esse passo compra, assim levando o cliente para a proxima parte -->

                    </div>
                </div>


                <div class="modal fade" id="modalCompra" tabindex="-1" role="dialog" aria-labelledby="modalCompraTitulo"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCompraTitulo">Selecione o endereço e a forma de pagamento!</h5>
        <!-- Um titulo "Selecione o endereço e a forma de pagamento!" no centro do modal  -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <!-- Botão que tem a função fechar o modal -->
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
         <!-- Uma label com "Endereço" e uma text-box para o cliente inserir o endereço que está cadastrado no banco de dados, também tem uma opção pra adicionar um novo endereço  -->
                                <div class="font-weight-bold">
                                    <label for="inputRua">Rua:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputRua" name="rua" >
         <!-- Uma label com "Rua:" e uma text-box com a rua do cliente inserida -->
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputNum">Número:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputNum" name="Num" >
        <!-- Uma label com "Número:" e uma text-box com o numero da casa do cliente inserida -->
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputBairro">Bairro:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputBairro" name="bairro" >
        <!-- Uma label com "Bairro:" e uma text-box com o bairro do cliente inserida -->
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputCEP">CEP:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputCEP" name="cep">
        <!-- Uma label com "CEP:" e uma text-box com o CEP do cliente inserida -->
                                </div>

                                <div class="font-weight-bold">
                                    <label for="inputComp">Complemento:</label>
                                    <input type="text" readonly class="form-control-plaintext" id="inputComp" name="complemento" >
        <!-- Uma label com "Complemento:" e uma text-box com o complemento para entrega inserida -->
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
        <!-- Uma label com "Forma de pagamento" e uma <option> com as opções de pagamento -->

                                <div class="form-group font-weight-bold" style="display: none" id="divTroco">
                                    <label for="inputroco">Troco:</label>
                                    <input type="text" class="form-control" id="inputTroco" placeholder="Precisa de troco?" required>
                                </div>
        <!-- Se a opção seleciona for dinheiro, aparecerá uma label "Troco:" e ao lado uma text-box para o cliente colocar quanto troco ele precisa -->

                                <div class="modal-footer d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-success btn btn-default" onclick="Finalizar_compra()" >Finalizar compra</button>
        <!-- Botão que tem a função de finalizar a compra com sucesso -->
        
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </form>
        <!-- Fim do formulario -->
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