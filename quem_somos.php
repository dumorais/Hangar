<!DOCTYPE html>
<html>

    <body>
        <?php include('Header.php'); 
        //Puxando o header pelo php
        ?>

        <!-- Containers -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 bg-light py-4 borda mt-3">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o primeiro lado que tem a label com um texto explicando um pouco sobre a empresa Hangar 764 -->
                    <div class="">
                        <label>Bem vindo! Nos somos o Hangar 764, uma empresa que já está no mercado há 13 anos e possuímos diversas premiações de revistas de São Caetano do Sul. Nós funcionamos como um bar, servimos lanches, porções, mas somos mais especializados em cerveja. Nosso bar é mais estilizado para o Rock n' Roll, sendo assim, as músicas e DVDs são puxados para este estilo musical. Também passamos diversos esportes diferentes no nosso telão, desde futebol, até futebol americano e UFC. Estamos parados por conta da pandemia, mas quando tudo voltar, espero vê-los aqui!</label>

                    </div>
                </div>
                <div class="col-md-6 col-12">
        <!-- Uma class que tem a função de dividir o container em duas colunas, esse é o segundo lado que tem o carousel com imagens do local -->
                    <div id="carouselExampleIndicators" class="carousel  col-sm-12 col-lg-8 col-md-10 slide carousel2" data-ride="carousel">
        <!-- Carousel com duas imagens -->
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
        <!-- Indicadores do carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/hangar-foto1.jpg" class="d-block w-100" alt="...">
                            </div>
        <!-- Primeira imagem do carousel -->
                            <div class="carousel-item">
                                <img src="img/hangar-foto2.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
        <!-- Segunda imagem do carousel -->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
        <!-- Seta da esquerda para voltar pra imagem anterior -->
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
        <!-- Seta da direita para avançar pra proxima imagem -->
                    </div>

                </div>
            </div>
        </div>
        <!-- Fim do carousel -->

        <div class="col-12 Google text-center mt-4">
            <iframe class="Maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1007.5171510978643!2d-46.55669796886949!3d-23.618949278672694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5cdfa0a8e453%3A0x317e0da3ff0195c4!2sHangar%20764!5e0!3m2!1spt-BR!2sbr!4v1594674617160!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!-- Localização do Hangar 764 no mapa -->
    
        <br>


        <!-- Footer do Site -->

        <?php include('Footer.php'); 
        //Puxando o footer pelo php
        ?>



    </body>
</html>