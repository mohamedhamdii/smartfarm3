<?php

include_once '../../models/Boutique.php';

class BoutiqueController
{
    //params DB
    private $connection;
    private $table_name = 'boutique';

    //constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // create
    public function create($boutique)
    {

        // query
        $query = 
            'INSERT INTO ' .$this->table_name . 
            '(id_agriculteur, categorie, nom_produit, description, quantite_totale, prix_unitaire)
                VALUES(:id_agriculteur, :categorie, :nom_produit, :description, :quantite_totale, :prix_unitaire)';
        // prepare statement
        $stmt = $this->connection->prepare($query);

        // bind data
        $stmt->bindValue(':id_agriculteur', $boutique->getAgriculteur()->getId());
        $stmt->bindValue(':categorie', $boutique->getCategorie());
        $stmt->bindValue(':nom_produit', $boutique->getNomProduit());
        $stmt->bindValue(':description', $boutique->getDescription());
        $stmt->bindValue(':quantite_totale', $boutique->getQuantiteTotale());
        $stmt->bindValue(':prix_unitaire', $boutique->getPrixUnitaire());
        
        // Execute query
        if($stmt->execute()){
            return array(
                'id' => 1
            );
        }

        // Error
        return array(
            'id' => 0
        );

    }

    // edit

    // delete
    public function delete($boutique)
    {

        // query
        $query = 
            'DELETE FROM '.$this->table_name . 
            '(id_agriculteur)';

        // prepare statement
        $stmt = $this->connection->prepare($query);
        // Execute query
        if($stmt->execute()){
            return array(
                'id' => 1
            );
        }

        // Error
        return array(
            'id' => 0
        );
    }
    
    // find_all

    // find_by_id

}