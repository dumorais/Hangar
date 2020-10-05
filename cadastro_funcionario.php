<?php 
require_once 'services.php';
?>
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

        <section class="container py-3 bg-light mt-3 borda">
            <div class="row">
                <h1 class="center">Cadastro de funcionário</h1>
                <form class="col-lg-12" action="cadastro_funcionario_Bd.php" name="form_funcionario" method="post" onsubmit="return CheckDados(this)">

                    <div class="form-row">
                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Nome completo" required autofocus>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" id="CPF" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="exemplo123@mail.com" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputTel">Cargo</label>
                            <input type="text" class="form-control" id="inputCargo" name="Cargo" placeholder="Cargo do funcionário na empresa" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputLogin">Login</label>
                            <input type="text" class="form-control" id="inputLogin" name="Login" placeholder="Login de acesso" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control" id="inputSenha" name="Senha" placeholder="Senha de acesso" required>
                        </div>

                        <div class="form-group font-weight-bold col-md-6">
                            <label for="inputConfSenha">Confirmar Senha</label>
                            <input type="password" class="form-control" id="inputConfSenha" name="Confirmar" placeholder="Confirmar senha de acesso" required>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Perfil do funcionário</label>
                            </div>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="Perfil" required>
                                <option selected>Escolha...</option>
                                <?php 
                                $perfil = GetPerfil();
                                ?>

                                <?php while($funcionario=mysqli_fetch_array($perfil)){ ?>

                                <option value=" <?= $funcionario['idperfil']?>"> <?= $funcionario['descr'] ?> </option>

                                <?php } ?>

                            </select>
                        </div>

                    </div>

                    <div class="center mt-3">
                        <input type="submit" class="btn-success btn" name="btn_cadastro" value="Cadastrar">
                    </div>

                </form>

            </div>
        </section>
        <br>
        
  
        
        <section class="container py-3 bg-light mb-3 borda" style="margin-top: 5%;">
            <div class="row">
                <h1 class="center">Alterar perfil de funcionário</h1>
                <form class="col-lg-12" action="Alterar_perfil.php" name="form_alterar" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Nome do funcionário</label>
                            </div>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="Nome" required>
                                <option selected>Escolha...</option>
                                <?php 
                                $func = GetFunc();
                                ?>

                                <?php while($func_nome=mysqli_fetch_array($func)){ ?>

                                <option value=" <?= $func_nome['idfuncionario']?>"> <?= $func_nome['nome'] ?> </option>

                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Perfil do funcionário</label>
                            </div>
                            <select class="custom-select form-control" id="inputGroupSelect01" name="Perfil" required>
                                <option selected>Escolha...</option>
                                <?php 
                                $perfil = GetPerfil();
                                ?>

                                <?php while($funcionario=mysqli_fetch_array($perfil)){ ?>

                                <option value=" <?= $funcionario['idperfil']?>"> <?= $funcionario['descr'] ?> </option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="center mt-3">
                        <input type="submit" class="btn-success btn" name="btn_cadastro" value="Alterar">
                    </div>
                </form>
            </div>
        </section>



        <?php include('Footer.php'); ?>

        <?php 
        if(isset($_SESSION['msg_func'])){
            echo "<script>alert('" . $_SESSION['msg_func'] . "');</script>";
            unset ($_SESSION['msg_func']);

        } 

        ?>

    </body> 

    <script>



        $('#CPF').mask("999.999.999-99");

        function CheckDados(form){


            var senha= form_funcionario.Senha.value;
            var Confirma= form_funcionario.Confirmar.value;

            if(senha != Confirma){
                alert("SENHAS DIFERENTES !");
                form_funcionario.Senha.focus();
                return false;

            }

            if (!Check_CPF(form)){
                form_funcionario.CPF.focus();
                return false;
            }

            return true;
        }

        function Check_CPF(form){
            var cpf = form_funcionario.CPF.value.replace(/([.]|[-])/gi,'');
            var soma = 0;
            var resto =0;
            var d1 = 0;
            var d2 = 0;

            if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
                alert ("CPF inválido!");
                return false;
            }

            for (i=1; i<=9; i++){
                soma += parseInt(cpf.substring(i-1,i)) * (11-i);
            }
            resto = soma % 11;
            if ((resto == 0) || (resto == 1)){
                d1 = 0;
            }else{
                d1 = 11 - resto;
            }
            if (cpf.substring(9,10) != d1){
                alert("CPF inválido!")
                return false;
            }
            soma = 0;
            for (i=1; i<=10; i++){
                soma += parseInt(cpf.substring(i-1,i)) * (12-i);
            }
            resto = soma % 11;
            if ((resto == 0) || (resto == 1)){
                d2 = 0;
            }else{
                d2 = 11 - resto;
            }
            if (cpf.substring(10,11) != d2){
                alert ("CPF inválido!");
                return false;
            }
            return true;
        }


    </script>


</html>