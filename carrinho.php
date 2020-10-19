<?php require_once 'services.php'; ?>
<!DOCTYPE html>
<html>

  

    <body>
        <?php include('Header.php'); ?>

        <!-- Produto escolhido -->


        <div class="container">
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
                    if(isset($_SESSION['nome'])){  ?>
                    <a href="finalizar_compra.php"> <button class=" btn btn-outline-success"  type="submit">Confirmar compra</button> </a>
                    <?php }else{ ?>
                    <button class=" btn btn-outline-success"  type="submit" onclick="Alert_Login()">Confirmar compra</button>
                    <?php  }?>


                </div>
            </div>
            


        </div>





        <!-- Footer do Site -->

        <?php include('Footer.php'); ?>


        <script>
            $(function () {
                Carregar_carrinho();
            });
        </script>
        
        <?php
        if(isset($_SESSION['msg'])){
            echo "<script>alert('" . $_SESSION['msg'] . "');</script>";
            echo "<script> AbrirModal() </script>";
            unset ($_SESSION['msg']);
        }
        ?>

    </body>

</html>