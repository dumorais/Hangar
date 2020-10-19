<!DOCTYPE html>
<html>

   
    <body>

        <?php
        include('Header.php');


        ?>


        <!-- Cadastro -->
        <br>
        <section class="container py-3 bg-light borda">
            <div class="row">
                <h1 class="center">Cadastre-se!</h1>
                <form class="col-lg-12" action="cadastro_cliente.php" name="form_cliente" method="post" onsubmit="return CheckForm(this)">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Nome completo" required autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" id="inputCPF" name="CPF" placeholder="xxx.xxx.xxx-xx" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="exemplo123@mail.com" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTel">Telefone</label>
                            <input type="text" class="form-control" id="inputTel" name="Telefone" placeholder="(11) 99999-9999" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputdtnasc">Data de nascimento</label>
                            <input type="date" class="form-control" name="Dtnasc" id="inputdtnasc" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLogin">Login</label>
                            <input type="text" class="form-control" id="inputLogin" name="Login" placeholder="Login de acesso" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control" id="inputSenha" name="Senha" placeholder="Senha de acesso" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfSenha">Confirmar Senha</label>
                            <input type="password" class="form-control" id="inputConfSenha" name="Confirmar" placeholder="Confirmar senha de acesso" required>
                        </div>
                    </div>

                    <div class="center">
                        <input type="submit" class="btn-success btn" name="btn_cadastro" value="Cadastrar">
                    </div>

                </form>

            </div>
        </section>
        <br>

        <!-- Footer do Site -->
        <?php include('Footer.php'); ?>




        <?php 

        if(isset($_SESSION['msg_cad'])){
            echo "<script>alert('" . $_SESSION['msg_cad'] . "');</script>";
            unset ($_SESSION['msg_cad']);
        } 

        ?>    

    </body>

    

    <script>

        $('#inputCPF').mask("999.999.999-99");
        $('#inputTel').mask("(99) 99999-9999");


    </script>


</html>