<!DOCTYPE html>
<html lang="en">
@include('customer::layouts.head')

<body>

  <!-- ======= Header ======= -->
  @include('customer::layouts.navbar')
<!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Commandez des produits chez vos fournisseurs</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with Bootstrap</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="{{route('customer.all')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Tous les produits</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="https://img.freepik.com/vecteurs-libre/commande-ligne-achat-achat-produits-site-web-boutique-internet-clientele-feminine-tablette-ajoutant-produit-au-personnage-dessin-anime-panier_335657-2561.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Nombre de produit</p>
              </div>
            </div>
          </div>

       

         
        </div>

      </div>
    </section><!-- End Counts Section -->

 




    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Produits</h2>
          <p>Derniers produit ajoutés</p>
        </header>

      

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($products as $product)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{$product->picture}}" class="img-fluid" alt="" height="400" width="400">
              <div class="portfolio-info">
                <h4>{{$product->name_product}}</h4>
                <p>{{$product->price}} FCFA</p>
                <div class="portfolio-links">
                  <a href="{{$product->picture}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$product->name_product}}"><i class="bi bi-plus"></i></a>
                  <a href="{{route('customer.show', $product->id)}}" title="Plus de Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </section><!-- End Portfolio Section -->
 


  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>