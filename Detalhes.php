<?php 
require_once 'services.php';
//Puxando a página services onde está as funções do php
?>
<!DOCTYPE html>
<html>


    <body>

        <?php include('Header.php'); 
        //Puxando o header pelo php
        $detalhes = GetPedido();
        //Puxando a função GetPedido para pegar o pedido que o usuário fez
        $pedido = mysqli_fetch_array($detalhes['pedido']);
        ?>

        <div class="container mt-4 mb-4">
            <div class="bg-light py-4 borda mx-auto w-50">
                
                <h2 class="text-center">Detalhes do pedido</h2>
                <div class="text-center">
                    <label class="pl-2">Horário e data:</label> <label><?= $pedido['horario'] ?></label> &nbsp;  <label>Total:</label> 
                    <label>R$<?= number_format($pedido['total'], 2) ?></label> <br>
                </div>

                <h4 class="text-center">Endereço:</h4>
                <label class="pl-2">Rua:</label> <label><?= $pedido['rua'] ?></label> <br>
                <label  class="pl-2">Número:</label> <label><?= $pedido['numero'] ?> </label> <br>
                <label  class="pl-2">Bairro:</label> <label><?= $pedido['bairro'] ?> </label> <br>
                <label  class="pl-2">CEP:</label> <label><?= $pedido['cep'] ?> </label> <br>
                <label  class="pl-2">Complemento:</label> <label><?= $pedido['complemento'] ?> </label> <br>

                <h4 class="text-center">Produtos pedidos:</h4>
                <?php while($produto=mysqli_fetch_array($detalhes['produtos'])){ ?>

                    <label class="pl-2"><?= $produto['produto'] ?></label> &nbsp; <label>qtd:</label> <label><?= $produto['quantidade'] ?></label> <br>

                <?php } ?>
            </div>


        </div>


        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>

        <?php 
        if(isset($_SESSION['msg'])){
            echo "<script>alert('" . $_SESSION['msg'] . "');</script>";
            unset ($_SESSION['msg']);
            //Vendo se a session msg existe, se existir mostrar a mensagem e depois apaga ela da session
        } ?>

    </body>
</html>
