<?php

// je range ma classe Brand dans mon tiroir VITRUEL Oshop\Models
namespace Oshop\Models;

// je récupère ma classe Databse qui est rangée dans son propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Utils\Database;
// on va procède comme ça pour les fonctions natives
use \PDO;

// Ici, je créé le Model Brand qui représente l'entité associée dans le MCD
// et donc aussi dans la BDD
class Brand extends CoreModel {

    //================================================================
    // Propriétés
    //================================================================

    // Chacune des propriétés de cette classe correspond aux champs
    // de la table associée en base de données
    private $footer_order;

    //================================================================
    // Méthodes
    //================================================================
    
    /**
    * La méthode find va recevoir l'ID d'une marque en paramètre
    * et instancier un objet Brand, puis renseigner ses propriétés
    * à partir des infos correspondantes en BDD
    *
    * @param int $id
    * @return Brand
    */
    public function find( $id )
    {
      // Je me connecte à la BDD (si c'est pas déjà fait)
      // et on récupère l'objet PDO pour nos futures requêtes
      $pdo = Database::getPDO();

      // Requete permettant de récupérer les infos
      // d'une marque à partir de son $id
      $sql = "SELECT * FROM `brand` WHERE `id` = $id";

      // Execution de la requête
      // query() renvoi une "boite de résultat" sous la forme
      // d'un objet PDOStatement
      $statement = $pdo->query( $sql );

      // ancien fetch qui récupérait un tableau
      // $brandObject = new Brand( $brandDataArray );

      $brandObject = $statement->fetchObject(__CLASS__);
      // J'ai mes données de la BDD dans un tableau
      // dump( $brandObject );

      // Une fois l'objet créé à partir des data, on le renvoi au Controller
      return $brandObject;
    }

    public function findAll()
    {
      $pdo = Database::getPDO();

      $sql = "SELECT * FROM `brand`";

      $statement = $pdo->query( $sql );

      $brandList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);

      return $brandList;
    }

    /**
     * Méthode permettant de récupérer les 5 marques du footer
     *
     * @return Brand[]
     */
    public function findAllForFooter() {
      $pdo = Database::getPDO();

      $sql = "SELECT * 
              FROM `brand` 
              WHERE `footer_order` > 0 
              ORDER BY `footer_order` 
              LIMIT 5";

      $statement = $pdo->query($sql);

      // __CLASS__ signifie qu'on envoie notre classe actuelle, ici Brand
      $brandList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
      return $brandList;
    }

    //================================================================
    // Getters
    //================================================================

    /**
     * Get the value of footer_order
     */ 
    public function getFooterOrder()
    {
      return $this->footer_order;
    }

    //================================================================
    // Setters
    //================================================================

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;
    }

    public function findProductWithBrandName($id) {
      $pdo = Database::getPDO();
    
      $sql = "SELECT product.*, brand.name AS brand_name
              FROM product
              LEFT JOIN brand ON product.brand_id = brand.id
              WHERE brand.id = ".$id;
      
      $statement = $pdo->query($sql);
      
      $brandArray = $statement->fetchAll(PDO::FETCH_ASSOC);
      
      return $brandArray;
  }
  }