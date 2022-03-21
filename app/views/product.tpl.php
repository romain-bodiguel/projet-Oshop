<?php
// Grâce au extract, $viewData['productArray'] devient $productArray, auquel on récupère la valeur de name
?>
<h1>Produit : <?php echo $productArray['name'];?></h1>

<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href=<?= $router->generate('main-home'); ?>>Home</a></li>
        <li class="breadcrumb-item active"><?= $productArray['category_name'];?></li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?= $_SERVER['BASE_URI']?>/<?= $productArray['picture'];?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?= $productArray['name'];?></h3>
            <div class="text-muted">by <em><?= $productArray['category_name'];?></em></div>
            <div>
              <?php $i = 1; 
                while ($i <= $productArray['rate']) { ?>
                  <i class="fa fa-star"></i>
              <?php $i++; } ?>
              <?php $i = 1; 
                while ($i <= (5-$productArray['rate'])) { ?>
                  <i class="fa fa-star-o"></i>
              <?php $i++; } ?>
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?= $productArray['price'];?></span> € TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="" method="post">
              <input type="hidden" name="product_id" value="1">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
            <?= $productArray['description'];?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>
      
    </div>
  </section>