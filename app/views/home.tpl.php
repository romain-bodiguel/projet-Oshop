  <section>
  <div class="container-fluid">
      <div class="row mx-0">
      <?php for ($id=0; $id <=1 ; $id++) : ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $_SERVER['BASE_URI'] ?>/<?= $categoryArray[$id]['picture']?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?= $categoryArray[$id]['name'] ?></h2><a href="<?=$router->generate('catalog-category',['id' => ($id+1)])?>" class="btn btn-light">Découvrir</a>
              </div>
            </div>
          </div>
      </div>
      <?php endfor; ?>
        

        <?php for ($id=2; $id <=4; $id++) : ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $_SERVER['BASE_URI'] ?>/<?= $categoryArray[$id]['picture']?>" alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $categoryArray[$id]['name'] ?></h2><a href="<?=$router->generate('catalog-category',['id' => ($id+1)])?>" class="btn btn-link text-white">Faire un tour<i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>

      </div>
        
      </div>
  </section>