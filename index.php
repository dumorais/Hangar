<!DOCTYPE html>
<html>


    <body>

        <?php include('Header.php'); ?>

        <!-- Carrossel da Home -->


        <div class="container mb-4">
            <div class="row">
                <div id="carouselExampleCaptions" class="carousel slide carousel1 mt-4 " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active mx-auto">
                            <img src="img/burger.jpg" class="d-block w-100 image" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Temos diversos hambúrguers!</h5>
                                <p>Nossos hambúrgues são 100% artesanais, são feitos na nossa conzinha!</p>
                            </div>
                        </div>
                        <div class="carousel-item mx-auto">
                            <img src="img/batata_frita.jpg" class="d-block w-100 image" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Temos diversas porções!</h5>
                                <p>Uma boa porção para acompanhar seu lanche ou sua cervejas!</p>
                            </div>
                        </div>
                        <div class="carousel-item mx-auto">
                            <img src="img/cervejas.jpg" class="d-block w-100 image" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Temos diversas cervejas!</h5>
                                <p>São diversas cervejas com nacionalidades diferentes!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <!-- Container da Home -->

               

            </div>
        </div>

        <!-- Footer do Site -->

        <?php include('Footer.php'); ?>

    </body> 


</html>