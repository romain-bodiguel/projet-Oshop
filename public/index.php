<?php
// avec ce simple require de l'autoload
// je bénéficie de tous les "outils" installés avec composer
require __DIR__ . '/../vendor/autoload.php';

// Utilitaires
require __DIR__ . '/../app/Utils/Database.php';

// Models (tous les Models sont à présent chargés grâce à l'autoload dans composer.json)
// une fois le composer.json rempli, appliquer la commande composer dump-autoload en commande pour charger les fichiers d'autoload
    // require __DIR__ . '/../app/Models/CoreModel.php';
    // require __DIR__ . '/../app/Models/Brand.php';
    // require __DIR__ . '/../app/Models/Product.php';
    // require __DIR__ . '/../app/Models/Category.php';
    // require __DIR__ . '/../app/Models/Type.php';

// Controllers
require __DIR__ . '/../app/Controllers/CoreController.php';
require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';


// 1 / Dans un premier temps je vais fabriquer un objet à partir de ma classe AltoRouter
//! ATTENTION si j'ai un espace et/ou un caractère spécial dans un nom dossier qui contient mon projet -> altorouter va etre KO !
$router = new AltoRouter;

// 2 / Pour permettre le bon fonctionnement de mon outil altoRouter il faut que je lui indique la partie de l'url qui ne bouge pas, pour qu'il puisse faire la comparaison entre l'URL courante et l'url de la route.
// il existe une superglobale dans laquelle je vais pouvoir trouver cette information.
// dans $_SERVER j'ai une entrée 'BASE_URI' qui me donne l'adresse du dossier qui contient le .htaccess (qui s'occupe du rewrite engine)
// elle correspond à la racine du site => la route '/'
// Pour donner la base URI a l'objet $router j'utilise une methode setBasePath
$router->setBasePath($_SERVER['BASE_URI']);

// 3 / Définition des routes grâce a la methode map
$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/', // l'URL à laquelle cette route réagit
    [
        'action' => 'home', // nom de la methode a executer
        'controller' => 'MainController' // nom du controller dans lequel se situe la methode home
    ],
    'main-home' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/cart', // l'URL à laquelle cette route réagit
    [
        'action' => 'cart', // nom de la methode a executer
        'controller' => 'MainController' // nom du controller dans lequel se situe la methode home
    ],
    'main-cart' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/contact', // l'URL à laquelle cette route réagit
    [
        'action' => 'contact', // nom de la methode a executer
        'controller' => 'MainController' // nom du controller dans lequel se situe la methode home
    ],
    'main-contact' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/catalogue/categorie/[i:id]', // l'URL à laquelle cette route réagit
    [
        'action' => 'category', // nom de la methode a executer
        'controller' => 'CatalogController' // nom du controller dans lequel se situe la methode home
    ],
    'catalog-category' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/catalogue/type/[i:id]', // l'URL à laquelle cette route réagit
    [
        'action' => 'type', // nom de la methode a executer
        'controller' => 'CatalogController' // nom du controller dans lequel se situe la methode home
    ],
    'catalog-type' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/catalogue/marque/[i:id]', // l'URL à laquelle cette route réagit
    [
        'action' => 'brand', // nom de la methode a executer
        'controller' => 'CatalogController' // nom du controller dans lequel se situe la methode home
    ],
    'catalog-brand' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/catalogue/produit/[i:id]', // l'URL à laquelle cette route réagit
    [
        'action' => 'product', // nom de la methode a executer
        'controller' => 'CatalogController' // nom du controller dans lequel se situe la methode home
    ],
    'catalog-product' // je peux nommer ma route
);

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/mentions-legales', // l'URL à laquelle cette route réagit
    [
        'action' => 'legalNotice', // nom de la methode a executer
        'controller' => 'MainController' // nom du controller dans lequel se situe la methode home
    ],
    'main-legalNotice' // je peux nommer ma route
);

/*
URL : /test
HTTP method : GET
Controller : MainController
Méthode : test
*/

$router->map(
    'GET', // la methode HTTP qui est autorisée
    '/test', // l'URL à laquelle cette route réagit
    [
      'action'     => 'testAction', // nom de la methode a executer
      'controller' => 'MainController' // nom du controller dans lequel se situe la methode home
    ],
    'main-test' // je peux nommer ma route
  );

// 4 / J'appelle la methode "magique" "match" de mon objet router.
// cette methode va observer l'URL et vérifier si l'url demandée correspond à une route existante :
// - si oui : match sera un tableau associatif qui va contenir toutes les informations de la route demandée
// - si non : match = false
$match = $router->match();
//? Quand je suis sur une route dynamique, dans mon $match
//? j'ai un tiroir "params" qui contient une armoir, cette dernière contient un tiroir "id" dans lequel je vais trouver la partie dynamique de l'URL ($match['params']['id'])

// si la route existe, je vais avoir trois "tiroirs" dans $match : 
// un tiroir "target" qui va contenir un tableau associatif
    // Dans ce tableau associatif j'ai deux "tiroirs" 
    // "action" : nom de la methode a executer
    // "controller" : nom du controller dans lequel se situe cette methode
// un tiroir "params" : a découvrir plus tard ...
// un tiroir "name" : nom de la route

// si match n'est pas false et donc si l'url demandée correspond a une route qui existe ...
if($match) {
    // je sors le nom du controller dans lequel se situe la methode à executer
    $controllerToUse = '\\Oshop\\Controllers\\'.$match['target']['controller'];
    // idem avec le nom de la methode a executer
    $methodToUse = $match['target']['action'];
} else {
    $controllerToUse = '\\Oshop\\Controllers\\'.'MainController';
    $methodToUse = 'err404';
}

// il ne me reste plus qu'a executer la methode (et donc il me faut d'abord fabriquer un objet)
$controller = new $controllerToUse();

//! ATTENTION ici, pic de difficulté de l'E03
// Si je suis sur une route dynamique (exemple /catalogue/catagorie/2) il faut transmettre la partie dynamique (2) a la methode qui sera apellée (methode category du CatalogController)
$controller->$methodToUse($match['params']);




/***********




// je veux récupérer le morceaux d'url apres public
// si j'ai bien un tirroir _url dans l'armoir $_GET
if (isset($_GET['_url'])) {
    // alors je viens enregistrer le contenu de ce tirroir dans une variable $pageName
    $pageName = $_GET['_url'];
} else {
    // si je n'ai rien dans ce tirroir je vais considérer que la page a afficher est la page d'accueil (url /)
    $pageName = '/';
}

// a partir d'ici, je trouve dans la variable $pageName la portion d'URL apres public

// Fabrication des routes 
// je viens fabriquer les routes qui vont associer URLs avec methodes de Controllers
$pages = [
    '/' => [
        'action' => 'home', // nom de la méthode a executer
        'controller' => 'MainController', // nom du Controller dans lequel se trouve la méthode
    ],

    '/category' => [
        'action' => 'category', // nom de la méthode a executer
        'controller' => 'CatalogController', // nom du Controller dans lequel se trouve la méthode
    ],
];

 //! Début DISPATCHER
// Est-ce que l'URL demandée par l'user existe bien dans mes routes ?
if(isset($pages[$pageName])) {
    // si la route existe, je vais récupérer toutes les infos de cette dernière (nom de la méthode à éxécuter + nom du Controller)
    $routeData = $pages[$pageName];
    
    // pour pouvoir extraire le nom du Controller à utiliser
    $controllerToUse = $routeData['controller'];

    // pour pouvoir extraire le nom de la méthode à utiliser
    $methodToUse = $pages[$pageName]['action'];

    
    // echo "La route existe Mousaillon ! <br>";
    // echo "Je vais donc executer la methode $methodToUse qui se situe dans le controller $controllerToUse"; 
    
    
    // Grace a notre dispatcher, je viens vérifier si l'URL demandée par l'utilsateur correspond bien a une route existante, et si OUI, je viens prélever le nom de la methode a executer et le nom du controller dans lequelle elle se situe !

} else {
    echo "La page n'existe pas !";
}

// je fabrique un objet a partir de la classe "$controllerToUse"
$controller = new $controllerToUse();
// pour pouvoir executér la methode $methodToUse
$controller->$methodToUse();


*************/