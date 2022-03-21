<?php

// je range ma classe Product dans mon tiroir VITRUEL Oshop\Models
namespace Oshop\Models;

// je récupère ma classe Databse qui est rangée dans son propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Utils\Database;
// on va procède comme ça pour les fonctions natives
use \PDO;

class Product extends CoreModel {

    //================================================================
    // Propriétés
    //================================================================

    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;

    // Foreign Keys
    private $category_id;
    private $brand_id;
    private $type_id;

    // public function __construct( $dataArray = [] )
    // {
    //   $this->id           = $dataArray['id']           ?? 0;
    //   $this->name         = $dataArray['name']         ?? "";
    //   $this->description  = $dataArray['description']  ?? "";
    //   $this->picture      = $dataArray['picture']      ?? "";
    //   $this->price        = $dataArray['price']        ?? 0.00;
    //   $this->rate         = $dataArray['rate']         ?? 0;
    //   $this->status       = $dataArray['status']       ?? 0;
    //   $this->created_at   = $dataArray['created_at']   ?? "";
    //   $this->updated_at   = $dataArray['updated_at']   ?? null;

    //   $this->category_id  = $dataArray['category_id']  ?? 0;
    //   $this->brand_id     = $dataArray['brand_id']     ?? 0;
    //   $this->type_id      = $dataArray['type_id']      ?? 0;
    // }

    //================================================================
    // Méthodes
    //================================================================

    // La méthode find va recevoir l'ID d'une marque en paramètre
    // et instancier un objet Brand, puis renseigner ses propriétés
    // à partir des infos correspondantes en BDD
    public function find( $id )
    {
      $pdo = Database::getPDO();
      
      $sql = "SELECT * FROM `product` WHERE `id` = $id";

      $statement = $pdo->query( $sql );

      // ancienne méthode
      // $productDataArray = $statement->fetch( PDO::FETCH_ASSOC );

      // $productObject = new Product( $productDataArray );

      $productObject = $statement->fetchObject(__CLASS__);

      return $productObject;
    }

    public function findAll()
    {
      $pdo = Database::getPDO();

      $sql = "SELECT * FROM `product`";

      $statement = $pdo->query( $sql );

      // __CLASS__ signifie qu'on envoie notre classe actuelle, ici Brand
      $productList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
      
      return $productList;
    }

    // TODO : méthode findAll() qui renvoi un tableau d'objets Product au lieu d'un seul ;)

    //================================================================
    // Getters
    //================================================================

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
      return $this->description;
    }
    
    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }
    
    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }
    
    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }
    
    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }
    
    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    //================================================================
    // Setters
    //================================================================
 
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }
  

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;
    }

    public function findProductWithCategoryNameandBrandName($id) {
        $pdo = Database::getPDO();
      
        $sql = "SELECT product.*, category.name AS category_name, brand.name AS brand_name
                FROM product
                LEFT JOIN category ON product.category_id = category.id
                LEFT JOIN brand ON product.brand_id = brand.id
                WHERE product.id = ".$id;
        
        $statement = $pdo->query($sql);
        
        $productArray = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $productArray;
    }
  }