<?php 
session_start();
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

        <!-- Logo da Empresa -->
        <div class="Background col-sm12">

        </div>
        <div class="w-100 px-4 text-center hangar" style="position: absolute; top: 20%; ">
            <a class="head display-4 pb-3" href="index.php"><span>Hangar 764</span></a>
        </div>

        <nav class="navbar navbar-expand navbar-dark bg-dark ">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">  
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produto.php">Cardápio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quem_somos.php">Quem somos</a>
                    </li>
                </ul>
                <?php 
                if(isset($_SESSION['nome'])){
                    echo " <div class='text-secondary mr-0 name'> Olá, " . $_SESSION['nome'] . " </div> ";
                  //  if ($_SESSION['categoria'] == 2){ 
                    //  echo " <div class='adm text-secondary mr-4 text-center '> <p class='border border-secondary borda py-1'>adm</p> </div> </div> ";
                  } ?>
              

                <a class="navbar-brand" href="carrinho.php">
                    <img src="img/icon-carrinho.png" width="30" height="30" class="d-inline-block align-top">
                </a>

                <form action="logout.php">

                    <?php 
                    if(isset($_SESSION['nome'])){ ?>
                    <button class="btn btn-outline-secondary"  type="submit">Logout </button>
                    <?php   }else{ ?>
                    <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalLogin" type="button">Login </button>
                    <?php   }   ?>

                </form>

            </div>
        </nav>

        <!-- Login modal -->

        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitulo"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLoginTitulo">Entre na Sua Conta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="Formulario" action="login.php" method="post">
                            <div class="form-group">
                                <label>Login:</label>
                                <input type="text" class="form-control" name="Login" id="login">
                            </div>
                            <div class="form-group">
                                <label for="loginSenha">Senha:</label>
                                <input type="password" class="form-control" name="Senha" id="loginSenha">
                            </div>
                            <small class="form-text text-muted">Esqueceu a senha? <a href="#">Clique aqui</a>.</small>
                            <small class="form-text text-muted">Não tem um cadastro? <a href="cadastro.php">Faça aqui</a>.</small>
                            <div class="modal-footer d-flex justify-content-center ">
                                <button type="submit" class="btn btn-success btn btn-default" onclick="Login()">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php 
        if(isset($_SESSION['msg_login'])){
            unset ($_SESSION['msg_login']);
            echo "<script> AbrirModal() </script>";
        } ?>
    </body>
</html>