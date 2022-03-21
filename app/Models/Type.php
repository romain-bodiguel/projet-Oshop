<?php

// je range ma classe Type dans mon tiroir VITRUEL Oshop\Models
namespace Oshop\Models;

// je récupère ma classe Databse qui est rangée dans son propre tiroir VIRTUEL, j'appelle donc Oshop\Models\nom_de_la_classe_à_utiliser
use Oshop\Utils\Database;
// on va procède comme ça pour les fonctions natives
use \PDO;

class Type extends CoreModel {

    private $footer_order;

    //================================================================
    // Méthodes
    //================================================================

    // La méthode find va recevoir l'ID d'un type en paramètre
    // et instancier un objet Type, puis renseigner ses propriétés
    // à partir des infos correspondantes en BDD
    public function find($id)
    {
      // Je me connecte à la BDD (si c'est pas déjà fait)
      // et on récupère l'objet PDO pour nos futures requêtes
      $pdo = Database::getPDO();

      // Requete permettant de récupérer les infos
      // d'une marque à partir de son $id
      $sql = "SELECT * FROM `type` WHERE `id` = $id";

      // Execution de la requête
      // query() renvoi une "boite de résultat" sous la forme
      // d'un objet PDOStatement
      $statement = $pdo->query( $sql );

      // ancien fetch qui récupérait un tableau
      // $brandObject = new Brand( $brandDataArray );

      $typeObject = $statement->fetchObject(__CLASS__);

      // Une fois l'objet créé à partir des data, on le renvoi au Controller
      return $typeObject;
    }

    public function findAll()
    {
      $pdo = Database::getPDO();

      $sql = "SELECT * FROM `type`";

      $statement = $pdo->query( $sql );

      // __CLASS__ signifie qu'on envoie notre classe actuelle, ici Brand
      $typeList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
      dump( $typeList );
      
      return $typeList;
    }

    public function findAllForFooter() {
      $pdo = Database::getPDO();

      $sql = "SELECT * 
      FROM `type` 
      WHERE `footer_order` > 0 
      ORDER BY `footer_order`
      LIMIT 5";

      $statement = $pdo->query($sql);

      // __CLASS__ signifie qu'on envoie notre classe actuelle, ici Brand
      $typeList = $statement->fetchAll(PDO::FETCH_CLASS, __CLASS__);
      return $typeList;
    }
 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;
    }

    public function findProductWithTypeName($id) {
      $pdo = Database::getPDO();
    
      $sql = "SELECT product.*, type.name AS type_name
              FROM product
              LEFT JOIN type ON product.type_id = type.id
              WHERE type.id = ".$id;
      
      $statement = $pdo->query($sql);
      
      $typeArray = $statement->fetchAll(PDO::FETCH_ASSOC);
      
      return $typeArray;
  }
}