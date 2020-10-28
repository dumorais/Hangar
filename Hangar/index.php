<!DOCTYPE html>
<html>


    <body>

     <?php include('Header.php'); ?>

        <!-- Carrossel da Home -->




        <div id="carouselExampleIndicators" class="carousel slide carousel1 mt-4" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item  active">

                    <div class="carousel-caption">

                        <button class="carousel caption btn btn-light btn-promo" type="button" onclick="Promo1()" >Adicionar ao carrinho</button>
                    </div>

                    <img src="img/1.png" class="d-block w-100 image" alt="...">
                </div>

                <div class="carousel-item">
                    <div class="carousel-caption">

                        <button class="carousel caption btn btn-light btn-promo" type="button" onclick="Promo2()">Adicionar ao carrinho</button> 
                    </div>
                    <img src="img/2.png" class="d-block w-100 image" alt="...">
                </div>


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>

        <!-- Container da Home -->
        


        <!-- Footer do Site -->

        <?php include('Footer.php'); ?>

    </body> 


</html>