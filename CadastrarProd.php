<?php require_once 'services.php'; 
//Puxando a página services onde está as funções do php
?>
<!DOCTYPE html>
<html>


    <body>
        <?php include('Header.php'); 
        //Puxando o header pelo php
        ?>

        <a href="produto.php"> <i class="fa fa-arrow-circle-left py-2 ml-4 sticky-top" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>
        <!--Botão localizado no canto superior esquerdo, que tem com função voltar pra pagina dos produtos -->
        
        <!-- Cadastrar os produtos -->
        <form class="form py-3 mb-3 mt-3 row borda" name="formulario_prod" action="Insert.php" method="post">
        <!--Um formulario que puxa o "Insert.php" que tem como função cadastrar um novo produto -->
            <div class="col-md-6 form-group">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é primeiro lado que tem a label "Nome do produto:" e o espaço para inseri-lo -->
                <label class="font-weight-bold"> Nome do produto: </label> <br> <input class="form-control" type="text" name="NomeProd" value="" placeholder="Coloque o nome do produto" autofocus required>  
            </div>
        <!-- Uma label com "Nome do produto:" e embaixo uma text-box para inserir o nome produto para cadastro -->
            <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem a label "Categoria:" e um espaço com algumas categorias para seleciona-lo -->
                <div class="input-group-prepend">
                    <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Categoria:</label>
                </div>
                <select class="custom-select form-control" id="inputGroupSelect01" name="Categoria" required>
                    <option selected>Escolha...</option>
                    <?php 
                    $categorias = GetCategorias();
                    //Puxanso a função GetCategorias para pegar as categorias cadastradas no banco
                    ?>

                    <?php while($produto=mysqli_fetch_array($categorias)){ 
                    //Enquanto tiver categorias na tabela fazer isso:
                    ?>

                    <option value=" <?= $produto['idcategoria']?>"> <?= $produto['descr'] ?> </option>
                    <!--Criando as options que o value é o id da categoria e as opções são a descrição das categorias -->

                    <?php } ?>

                </select>
            </div>
        <!-- Uma label com "Categoria:" e embaixo uma <option> para selecionar a categoria do produto -->
            <div class="col-md-6 form-group">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label "Preço:" e o espaço para inserir o preço -->
                <label class="font-weight-bold"> Preço: </label> <br> <input class="form-control" type="text" name="Preco" value="" placeholder="Exemplo: '20'" required>
            </div>

            <div class="col-md-6 form-group">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem o "Imagem:" e o espaço para selecionar a imagem -->
                <label class="font-weight-bold"> Imagem: </label> <br> <input class="form-control" type="text" name="Imagem" value="img/" required>
            </div>
            <div class="col-md-6 text-center mx-auto form-group ">
        <!-- Uma class que tem a função de deixar a coluna no centro-->    
                <label class="font-weight-bold">Descrição:</label>
                <textarea class="form-control" rows="3" name="Descr" placeholder="Coloque a descrição do produto" required></textarea>
        <!-- Uma label "Descrição" e um text-box para escrever a descrição -->        
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Salvar</button>
        <!-- Um botão para salvar as informações citadas na aba de produtos no banco de dados -->      
            </div>

        </form>
        <!-- Fim do Formulario -->


        

        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>
        <!-- Footer do Site -->

        <?php 
        if(isset($_SESSION['msg_prod'])){
            echo "<script>alert('" . $_SESSION['msg_prod'] . "');</script>";
            unset ($_SESSION['msg_prod']);
            //Vendo se a session msg_prod existe, se existir mostrar a mensagem e depois apaga ela da session
        } 

        ?>

    </body> 


</html>
