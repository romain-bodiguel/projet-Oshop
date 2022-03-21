<?php 

// je range ma classe CatalogController dans mon tiroir VITRUEL  Oshop\Controllers
namespace Oshop\Controllers;

// je récupère mes classes Brand et Product qui sont rangées dans leur propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Models\Brand;
use Oshop\Models\Product;
use Oshop\Models\Type;
use Oshop\Models\Category;

class CatalogController extends CoreController {
  public function category( $params )
  {    
    $categoryObject = new Category();
    $categoryArray = $categoryObject->findProductWithCategoryName($params['id']);

    $params['categoryArray'] = $categoryArray;
    
    // ici, j'aimerais bien récupérer la partie 
    // dynamique de l'URL (l'id)
    //echo "methode category du catalog controller";
    //echo "<br> et dans mon parametre params j'ai : ";
    //dump($params);
    $this->show( 'category', $params );
  }
  
  public function type($params)
  {    
    $typeObject = new Type();
    $typeArray = $typeObject->findProductWithTypeName($params['id']);

    $params['typeArray'] = $typeArray;

    $this->show( 'type', $params );
  }

  public function brand( $params )
  {
    // On instancie une marque "fictive"
    // $brandModel = new Brand();

    // On utilise cette dernière pour charger la "vraie" marque
    // $params['id'] contient ici l'id de la marque récupéré de l'URL
    // $brandObject = $brandModel->find( $params['id'] );

    // TODO : Il faudrait maintenant passer cette variable
    // à la vue pour l'utiliser sur notre page
    // Le plus simple, c'est de l'ajouter à params
    // $params['brandObject'] = $brandObject;

    $brandObject = new Brand();
    $brandArray = $brandObject->findProductWithBrandName($params['id']);

    $params['brandArray'] = $brandArray;
    
    // On y accèdera comme à la clé 'id' dans la vue, à savoir $viewData['brandObject']

    // Ensuite, j'affiche la vue
    $this->show( 'brand', $params );
  }

  public function product($params)
  {    
    $productObject = new Product();
    $productArray = $productObject->findProductWithCategoryNameandBrandName($params['id']);
    
    $params['productArray'] = $productArray;
    
    $this->show( 'product', $params );
  }  
}