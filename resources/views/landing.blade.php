@extends('layouts.app')

@section('content')

    @extends('auth.login_user')
    
    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase wow bounceInDown">
              <strong>El sistema de control de mayor preferencia</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5 wow bounceInLeft">Inicie inmediatamente con nuestros servicios! Mejore el registro de visitas y obtendrá el mejor resultado</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger wow bounceInRight" href="#about">Conocer más</a>
          </div>
        </div>
      </div>
    </header>

    <section style="background-image: url('img/quote_primary.jpg'); background-attachment: fixed;" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white wow bounceInDown">Tenemos lo que necesitas!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4 wow fadeInLeft">
              ¡Con Visitame tienes todo lo que necesitas para poner en marcha tu control de visitas en muy poco tiempo! Contáctanos y tendrás información. ¡Sin ataduras!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger wow fadeInRight" href="#services">Nuestros servicios!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading wow zoomInDown">A su servicio!!</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-address-card text-primary mb-3 sr-icon-2"></i>
              <h3 class="mb-3 wow bounceInDown">Control Identidad</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-lock text-primary mb-3 sr-icon-1"></i>
              <h3 class="mb-3 wow bounceInDown">Seguro</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-piggy-bank text-primary mb-3 sr-icon-3"></i>
              <h3 class="mb-3 wow bounceInDown">Costo bajo</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-laptop text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3 wow bounceInDown">100% Web</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 wow fadeInDown">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Empresa
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="text-white" style="background-attachment: fixed; background-image: url('img/quote_second.jpg')">
      <div class="container text-center wow fadeInDown">
        <h2 class="mb-4">Inicia el control de registro con nosotros!</h2>
        <a class="btn btn-light btn-xl" href="http://startbootstrap.com/template-overviews/creative/">Información!</a>
      </div>
    </section>
    <section class="wrapper quote" id="FourQuote" >
       
            <div id='map-canvas'></div>

            <div class="container">

                <div class="gap"></div> 
    
                <div class="row">
    
                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12" id="card">
    
                        <div class="front">
    
                            <h3>Nuestras Oficinas</h3>
    
                            <address>
    
                                <p>
    
                                    Cerro El Plomo 5931, Ofic. 1103<br>
    
                                    Las Condes, Santiago<br>
    
                                    Chile
    
                                </p>
    
                                <p>
    
                                    (56) 2 2814 8010<br>
    
                                    (56) 9 9343 7527<br>
    
                                    info@sipcom.cl
    
                                </p>
                                <div class="text-center">
                                  <button type="button" id="contact" class="btn btn-sm btn-primary "><i class="fa fa-envelope-o"></i> Contáctanos</button>
                                </div>  
                            </address>
    
                        </div>
    
                        <div class="back">
    
                            <h3>Contáctanos</h3>
    
                            <div class="text-center" id="msg"></div>
    
                            <form class="form-horizontal" id="contacto">
    
                                <div class="row form-group">
    
                                    <div class="col-sm-6">
    
                                        <input type="text" class="form-control" placeholder="Nombre Completo" id="nombre">
    
                                    </div>
    
                                    <div class="col-sm-6">
    
                                        <input type="text" class="form-control" placeholder="Correo Electrónico" id="email">
    
                                    </div>
    
                                </div>
    
                                <div class="row form-group">
    
                                    <div class="col-md-12">
    
                                        <textarea class="form-control" rows="3" placeholder="Escribe aqui tu mensaje" id="mensaje"></textarea>
    
                                    </div>
    
                                </div>
    
                                <div class="text-center">
    
                                    <button type="button" class="btn btn-sm btn-success" id="send" data-loading-text="Enviando..."><i class="fa fa-send"></i> Enviar Mensaje</button>
    
                                    <button type="button" id="address" class="btn btn-sm btn-default"><i class="fa fa-undo"></i> Volver</button>
    
                                </div>
    
                            </form>                        
    
                        </div>
    
                    </div>
    
                </div>
    
                <div class="row">
    
                    
    
                </div>
    
                <div class="gap" style="margin-bottom: 50px;"></div>
    
            </div>
    </section>

    <!-- Footer -->
    <footer class="page-footer bg-dark text-white">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3"><img class="logo" src="landing/img/footer-logo.png" alt="Asesorias Computacionales Sipcom Limitada"></div>
        <!-- Copyright -->
    
    </footer>
    <!-- Footer -->


@endsection