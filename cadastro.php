<!DOCTYPE html>
<html>

    <head>
        <title>Hangar 764</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
         <?php include('Header.php'); ?>
        
        <!-- Cadastro -->
        <br>
        <section class="container py-3 bg-light borda">
            <div class="row">
                <h1 class="center">Cadastre-se!</h1>
                <form class="col-lg-12" action="cadastro_cliente.php" name="form_cliente" method="post" onsubmit="return CheckForm(this)">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Nome completo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" id="inputCPF" name="CPF" placeholder="xxx.xxx.xxx-xx">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="exemplo123@mail.com">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTel">Telefone</label>
                            <input type="text" class="form-control" id="inputTel" name="Telefone" placeholder="(11) 99999-9999">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputdtnasc">Data de nascimento</label>
                            <input type="date" class="form-control" name="Dtnasc" id="inputdtnasc">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLogin">Login</label>
                            <input type="text" class="form-control" id="inputLogin" name="Login" placeholder="Login de acesso">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control" id="inputSenha" name="Senha" placeholder="Senha de acesso">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputConfSenha">Confirmar Senha</label>
                            <input type="password" class="form-control" id="inputConfSenha" name="Confirmar" placeholder="Confirmar senha de acesso">
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    </body>

    <script>
        $('#inputCPF').mask("999.999.999-99");
        $('#inputTel').mask("(99) 99999-9999");

        
    </script>


</html>