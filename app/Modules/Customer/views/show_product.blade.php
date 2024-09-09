<!DOCTYPE html>
<html lang="en">

@include('customer::layouts.head')

<body>

@include('customer::layouts.navbar')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('customer.index') }}">Acceuil Client</a></li>
          <li>Details Produits</li>
        </ol>
        <h2>Details Produits</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{ $product->picture }}" alt="" height="600">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Information sur ce produit</h3>
              <ul>
                <li><strong>Référence</strong>: {{ $product->ref }}</li>
                <li><strong>Intitulé</strong>: {{ $product->name_product }}</li>
                <li><strong>Prix unitaire</strong>: {{ $product->price }} FCFA</li>
                <li><strong>Quantité disponible</strong>: {{ $product->quantity }}</li>

                <p class="text-center mt-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Commander</button>
                </p>
                
              </ul>
            </div>
            <div class="portfolio-info">
              <h3>Information sur le fournisseur</h3>
              <ul>
                <li><strong>Nom</strong>: {{ $product->user->first_name ?? 'N/A' }} {{ $product->user->last_name }}</li>
                <li><strong>Téléphone</strong>: {{ $product->user->telephone ?? 'N/A' }}</li>
                <li><strong>Email</strong>: {{ $product->user->email ?? 'N/A' }}</li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Détails du produit</h2>
              <p>
                {{ $product->features }}
              </p>
            </div>
          </div>

        </div>

      </div>

      <!-- Order Modal -->
      <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="orderModalLabel">Commander</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="orderForm" action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                  <label for="quantity" class="form-label">Nombre de produits</label>
                  <input type="number" class="form-control" id="total_quantity" name="total_quantity" required>
                </div>
                <div class="mb-3">
                  <label for="total_price" class="form-label">Prix total (FCFA)</label>
                  <input type="number" class="form-control" id="total_price" name="total_price" readonly>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" form="orderForm" class="btn btn-primary">Passer la commande</button>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('total_quantity');
        const totalPriceInput = document.getElementById('total_price');
        const productPrice = {{ $product->price }}; 
    
        quantityInput.addEventListener('input', function () {
            const total_quantity = parseInt(quantityInput.value, 10) || 0;
            const totalPrice = total_quantity * productPrice;
            totalPriceInput.value = totalPrice; 
        });
    });
    </script>

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
