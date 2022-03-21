<?php

// je range ma classe MainController dans mon tiroir VITRUEL  Oshop\Controllers
namespace Oshop\Controllers;

// je récupère ma classe Category qui est rangée dans son propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Models\Category;

class MainController extends CoreController {
    
    public function home() {

        $categoryObject = new Category();
        $categoryArray = $categoryObject->findCategoriesForHome();

        $params['categoryArray'] = $categoryArray;

        // on veut afficher la view home
        $this->show('home', $params);
    }

    public function cart()
    {
        $this->show('cart');
    }

    public function contact()
    {
        $this->show('contact');
    }
    
    public function legalNotice()
    {
        $this->show('legalNotice');
    }

    public function err404()
    {
        $this->show('err404');
    }

    public function testAction() {
        echo "test route";
        $categoryObjectTmp = new Category();
        // $categoryObject = $categoryObjectTmp->find(1);
        // dump($categoryObject);

        $categoryList = $categoryObjectTmp->findAll();
        dump($categoryList);
    }
}