<?php

// je range ma classe Category dans mon tiroir VITRUEL Oshop\Models
namespace Oshop\Models;

// je récupère ma classe Databse qui est rangée dans son propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Utils\Database;
// on va procède comme ça pour les fonctions natives
use \PDO;

class Category extends CoreModel {

    private $subtitle;
    private $picture;
    private $home_order;

    //================================================================
    // Méthodes
    //================================================================

    // La méthode find va recevoir l'ID d'une catégorie en paramètre
    // et instancier un objet Category, puis renseigner ses propriétés
    // à partir des infos correspondantes en BDD
    public function find($id)
    {
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `category` WHERE `id` = $id";
        
        $statement = $pdo->query($sql);
        
        // ancienne méthode
        // $categoryDataArray = $statement->fetch( PDO::FETCH_ASSOC );
        
        // $categoryObject = new Category ($categoryDataArray);
        
        $categoryObject = $statement->fetchObject(__CLASS__);
        
        return $categoryObject;
    }

    public function findAll() {
        $pdo = Database::getPDO();
        
        $sql = "SELECT * FROM `category`";
        
        $statement = $pdo->query($sql);
        
        // __CLASS__ signifie qu'on envoie notre classe actuelle, ici Brand
        $categoriesList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        
        return $categoriesList;
    }
    
    public function getSubtitle()
    {
        return $this->subtitle;
    }
 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
 
    public function getHome_order()
    {
        return $this->home_order;
    }

    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;
    }

    public function findProductWithCategoryName($id) {
        $pdo = Database::getPDO();
      
        $sql = "SELECT product.*, category.name AS category_name
                FROM product
                LEFT JOIN category ON product.category_id = category.id
                WHERE category.id = ".$id;
        
        $statement = $pdo->query($sql);
        
        $categoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $categoryArray;
    }

    public function findCategoriesForHome() {
        $pdo = Database::getPDO();
      
        $sql = "SELECT name, picture
        FROM `category` 
        LIMIT 5";
        
        $statement = $pdo->query($sql);
        
        $homeCategoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $homeCategoryArray;
    }
}