<!DOCTYPE html>
<html>


    <body>

        <?php
        include('Header.php');
        //Puxando o header pelo php

        ?>


        <!-- Cadastro -->
        <br>
        <section class="container py-3 bg-light borda">
        <!-- Um container com fundo branco para não ficar com a mesma cor do fundo da página -->
            <div class="row">
                <h1 class="center">Cadastre-se!</h1>
        <!-- Um titulo com a palavra "Cadastre-se!" no centro da página-->
                <form class="col-lg-12" action="cadastro_cliente.php" name="form_cliente" method="post" onsubmit="return CheckForm(this)">
        <!--Um formulario que puxa o "cadastro_cliente.php" que tem como função o cadastro do cliente -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label "Nome" e o espaço para o cliente inserir seu nome -->
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="Nome" placeholder="Nome completo" required autofocus>
        <!-- Uma label com "Nome" e embaixo uma text-box para o cliente inserir seu nome para cadastro -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o Ssegundo lado que tem a label "CPF" e o espaço para o cliente inserir o seu CPF, para nota fiscal-->
                            <label for="inputCPF">CPF</label>
                            <input type="text" class="form-control" id="inputCPF" name="CPF" placeholder="xxx.xxx.xxx-xx" required>
        <!-- Uma label com "CPF" e embaixo uma text-box para o cliente inserir seu CPF para cadastro, a text-box está com RegEx configurado para cpf -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label "Email" e o espaço para o cliente inserir seu email -->
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="Email" placeholder="exemplo123@mail.com" required>
        <!-- Uma label com "Email" e embaixo uma text-box para o cliente inserir seu email para cadastro -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem a label "Telefone" e o espaço para o cliente inserir o seu telefone para contato-->
                            <label for="inputTel">Telefone</label>
                            <input type="text" class="form-control" id="inputTel" name="Telefone" placeholder="(11) 99999-9999" required>
        <!-- Uma label com "Telefone" e embaixo uma text-box para o cliente inserir seu telefone para cadastro, a text-box está com RegEx configurado para telefone -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label "Data de nascimento" e o espaço para o cliente inserir sua data de nascimento -->
                            <label for="inputdtnasc">Data de nascimento</label>
                            <input type="date" class="form-control" name="Dtnasc" id="inputdtnasc" required>
        <!-- Uma label com "Data de nascimento" e embaixo uma text-box para o cliente inserir sua data de nascimento para cadastro -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem a label "Login" e o espaço para o cliente inserir o login escolhido-->    
                            <label for="inputLogin">Login</label>
                            <input type="text" class="form-control" id="inputLogin" name="Login" placeholder="Login de acesso" required>
        <!-- Uma label com "Login" e embaixo uma text-box para o cliente inserir o nome para o login  -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label "Senha" e o espaço para o cliente inserir sua senha -->
                            <label for="inputSenha">Senha</label>
                            <input type="password" class="form-control" id="inputSenha" name="Senha" placeholder="Senha de acesso" required>
        <!-- Uma label com "Senha" e embaixo uma text-box para o cliente inserir uma senha para o login no site -->
                        </div>
                        <div class="form-group col-md-6">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem a label "Confirmar senha" e o espaço para o cliente inserir sua senha novamente para confirmação-->
                            <label for="inputConfSenha">Confirmar Senha</label>
                            <input type="password" class="form-control" id="inputConfSenha" name="Confirmar" placeholder="Confirmar senha de acesso" required>
        <!-- Uma label com "Confirmar Senha" e embaixo uma text-box para o cliente inserir a senha novamente para confirmação -->
                        </div>
                    </div>

                    <div class="center">
                        <input type="submit" class="btn-success btn" name="btn_cadastro" value="Cadastrar"> 
                    </div>
        <!-- Um botão para salvar as informações do cliente no banco de dados, para que ele possa comprar algo no site--> 
                </form>
        <!-- Fim do formulario -->
            </div>
        </section>
        <br>

        <!-- Footer do Site -->
        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>




        <?php 

        if(isset($_SESSION['msg_cad'])){
            echo "<script>alert('" . $_SESSION['msg_cad'] . "');</script>";
            unset ($_SESSION['msg_cad']);
            //Vendo se a session msg_cad existe, se existir mostrar a mensagem e depois apaga ela da session
        } 

        ?>    

    </body>



    <script>

        $('#inputCPF').mask("999.999.999-99");
        $('#inputTel').mask("(99) 99999-9999");
        //Fazendo a máscara do cpf e do telefone

    </script>
</html>