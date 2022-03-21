<?php

// je range ma classe CoreController dans mon tiroir VITRUEL  Oshop\Controllers
namespace Oshop\Controllers;

// je récupère mes classes Brand et Type qui sont rangées dans leur propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Models\Brand;
use Oshop\Models\Type;

class CoreController {

    protected function show( $viewName, $viewData = [] ) {

        /*
        On utilise global, mais on ESSAIE D'EVITER.
        C'est la façon la plus simple aujourd'hui de donner accès à la variable router qui est limitée par le scope.
        Cette variable est définie dans index.php et donc pas accessible depuis cette method show.
    
        Global => outrepasse la portée des variables
        */ 
    
        global $router;
    
        $brandObject = new Brand();
        $footerBrand = $brandObject->findAllForFooter();

        $typeObject = new Type();
        $footerTypes = $typeObject->findAllForFooter();

        /*
        On va transformer notre tableau viewdata en variables:
            
        Doc extract: https://www.php.net/manual/fr/function.extract.php
        
        $viewData = [
            "id" => "3",
            "productArray" => ['blablabla...']
        ];
        
        $id = 3;
        $productArray = ['blablabla...'];
        
        $viewData['productArray']['name'];
        
        Vaut la même chose que
        
        $productArray['name'];
        */
        
        extract($viewData);
    
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}