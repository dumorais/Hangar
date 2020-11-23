<?php 
require_once 'services.php';
//Puxando a página services onde está as funções do php
?>
<!DOCTYPE html>
<html>


    <body>

        <?php include('Header.php'); 
        //Puxando o header pelo php
        ?>

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
                                //Puxando a função GetPerfil para pegar os perfis dos funcionários cadastrados
                                ?>

                                <?php while($funcionario=mysqli_fetch_array($perfil)){ 
    //Enquanto tiver categorias fazer isso:
                                ?>

                                <option value=" <?= $funcionario['idperfil']?>"> <?= $funcionario['descr'] ?> </option>
                                <!--Criando as options onde o valor dela é o id do perfil e as opções são as descrições do perfil -->
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
                                //Puxando a função GetFunc para pegar os nomes dos funcionários cadastrados
                                ?>

                                <?php while($func_nome=mysqli_fetch_array($func)){ 
    //Enquanto tiver funcionários fazer isso:
                                ?>

                                <option value=" <?= $func_nome['idfuncionario']?>"> <?= $func_nome['nome'] ?> </option>
                                <!--Criando as option onde o value é o id do funcionário e as opções são os nomes do mesmo -->

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
                                //Puxando a função GetFunc para pegar os nomes dos funcionários cadastrados
                                ?>

                                <?php while($funcionario=mysqli_fetch_array($perfil)){ 
    //Enquanto tiver perfis fazer isso:

                                ?>

                                <option value=" <?= $funcionario['idperfil']?>"> <?= $funcionario['descr'] ?> </option>
                                <!--Criando as option onde o value é o id do perfil e as opções são as descrições do perfil -->

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



        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>

        <?php 
        if(isset($_SESSION['msg_func'])){
            echo "<script>alert('" . $_SESSION['msg_func'] . "');</script>";
            unset ($_SESSION['msg_func']);
            //Vendo se a session msg_func existe, se existir mostrar a mensagem e depois apaga ela da session

        } 

        ?>

    </body> 

    <script>



        $('#CPF').mask("999.999.999-99");
        //Máscara para o cpf

        ffunction CheckForm(form){
            //Function para checar se a a senha está igual ao confirmar senha

            var senha= form_funcionario.Senha.value;
            //Jogando o que o usuario escreveu no campo da senha numa variável
            var Confirma= form_funcionario.Confirmar.value;
            //Jogando o que o usuario escreveu no campo de confirmação numa variável

            if(senha != Confirma){
                alert("SENHAS DIFERENTES !");
                form_funcionario.Senha.focus();
                return false;
                //Se a senha for diferente do confirmar senha da um alerta de senhas diferentes e coloca o foco no campo da senha e retorna falso para o submit
            }

            if (!CheckCPF(form)){
                form_funcionario.CPF.focus();
                return false;
                //Se a function de checar o cpf for falsa, coloca o foco no campo do cpf e retorna falso para o submit
            }

            return true;
            //Se tudo estiver checado e correto retorna true para o submit
        }

        function CheckCPF(form){
            //Function para checar o cpf
            var cpf = form_funcionario.CPF.value.replace(/([.]|[-])/gi,'');
            //Váriavel com o que o usuario escreveu no campo do cpf e retirando os "." e "-" do número
            var soma = 0;
            var resto =0;
            var d1 = 0;
            var d2 = 0;
            //Váriaveis que serão utilizadas

            if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
                alert ("CPF inválido!");
                return false;
                //Se o cpf for igual a todos os números iguais alerta que o cpf é inválido e retorna false para o submit
            }

            for (i=1; i<=9; i++){
                soma += parseInt(cpf.substring(i-1,i)) * (11-i);
                //Loop de 1 até 9 onde a variável soma é igual a substring do número do contador i menos 1 até i, vezes 11 menos o contador i
            }
            resto = soma % 11;
            //Váriavel resto é igual ao resto da divisão da soma por 11
            if ((resto == 0) || (resto == 1)){
                d1 = 0;
                //Se o resto for 0 ou 1 então o primeiro dígito depois do "-" do cpf é igual a 0
            }else{
                d1 = 11 - resto;
                //Se não o primeiro digito é igual a 11 - o resto
            }
            if (cpf.substring(9,10) != d1){
                alert("CPF inválido!")
                return false
                //Se o primeiro digito depois do "-" for diferente da váriavel d1 então alerta que o cpf é inválido e retorna false para o submit
            }
            soma = 0;
            //Zerando a váriavel soma
            for (i=1; i<=10; i++){
                soma += parseInt(cpf.substring(i-1,i)) * (12-i);
                //Loop de 1 até 10 onde a variável soma é igual a substring do número do contador i menos 1 até i, vezes 12 menos o contador i
            }
            resto = soma % 11;
            //Váriavel resto é igual ao resto da divisão da soma por 11
            if ((resto == 0) || (resto == 1)){
                d2 = 0;
                //Se o resto for 0 ou 1 então o segundo dígito depois do "-" do cpf é igual a 0
            }else{
                d2 = 11 - resto;
                //Se não o segundo digito é igual a 11 - o resto
            }
            if (cpf.substring(10,11) != d2){
                alert ("CPF inválido!");
                return false;
                //Se o segundodigito depois do "-" for diferente da váriavel d2 então alerta que o cpf é inválido e retorna false para o submit        
            }
            return true;
            //Se tudo estiver correto retorna true para o submit
        }
    </script>


</html>