<?php require_once 'services.php'; ?>
<!DOCTYPE html>
<html>
  

    <body>
       <?php include('Header.php'); ?>

        <a href="produto.php"> <i class="fa fa-arrow-circle-left py-2 ml-4 sticky-top" aria-hidden="true" style="color: white; font-size:45px;"> </i> </a>

        <!-- Cadastrar os produtos -->
        <form class="form py-3 mb-3 mt-3 row borda" name="formulario_prod" action="Insert.php" method="post">

            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Nome do produto: </label> <br> <input class="form-control" type="text" name="NomeProd" value="" placeholder="Coloque o nome do produto" autofocus required>
            </div>

            <div class="form-group col-md-6">
                <div class="input-group-prepend">
                    <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Categoria:</label>
                </div>

                <select class="custom-select form-control" id="inputGroupSelect01" name="Categoria" required>
                    <option selected>Escolha...</option>
                    <?php 
                    $categorias = GetCategorias();
                    ?>

                    <?php while($produto=mysqli_fetch_array($categorias)){ ?>

                    <option value=" <?= $produto['idcategoria']?>"> <?= $produto['descr'] ?> </option>

                    <?php } ?>

                </select>
            </div>

            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Preço: </label> <br> <input class="form-control" type="text" name="Preco" value="" placeholder="Exemplo: '20'" required>
            </div>
            <div class="col-md-6 form-group">
                <label class="font-weight-bold"> Imagem: </label> <br> <input class="form-control" type="text" name="Imagem" value="img/" required>
            </div>
            <div class="col-md-6 text-center mx-auto form-group ">
                <label class="font-weight-bold">Descrição:</label>
                <textarea class="form-control" rows="3" name="Descr" placeholder="Coloque a descrição do produto" required></textarea>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>



        <!-- Footer do Site -->

         <?php include('Footer.php'); ?>

         <?php 
        if(isset($_SESSION['msg_prod'])){
            echo "<script>alert('" . $_SESSION['msg_prod'] . "');</script>";
            unset ($_SESSION['msg_prod']);
            
        } 
    
        ?>

    </body> 


</html>
