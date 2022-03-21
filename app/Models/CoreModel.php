<?php 

// je range ma classe CoreModel dans mon tiroir VITRUEL Oshop\Models
namespace Oshop\Models;

class CoreModel {
    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;

    //================================================================
    // Méthodes
    //================================================================

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
 
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}