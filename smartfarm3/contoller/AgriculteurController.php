<?php

include_once '../../models/Agriculteur.php';

class AgriculteurController
{
    // params DB
    private $connection;
    private $table_name = 'agriculteur';

    // constructor
    public function __construct($db)
    {
        $this->connection = $db;
    }

    // inscription
    public function inscription($agriculteur)
    {
        if ($this->find_exist($agriculteur)) {

            return array(
                'id' => -1
            );
        } else {
            // query
            $query =
                'INSERT INTO ' . $this->table_name .
                '(nom, prenom, num_tel, email, mot_de_passe)
                VALUES (:nom,  :prenom,  :num_tel,  :email, :mot_de_passe)';

            // prepare statement
            $stmt = $this->connection->prepare($query);

            // bind data
            $stmt->bindValue(':nom', $agriculteur->getNom());
            $stmt->bindValue(':prenom', $agriculteur->getPrenom());
            $stmt->bindValue(':num_tel', $agriculteur->getNumTel());
            $stmt->bindValue(':email', $agriculteur->getEmail());
            $stmt->bindValue(':mot_de_passe', $agriculteur->getMotDePasse());

            // Execute query
            if ($stmt->execute()) {
                return array(
                    'id' => 1
                );
            }

            // Error
            return array(
                'id' => 0
            );
        }
    }



    // authentification
    public function authentification($agriculteur)
    {

        // find_by_email
        $stmt = $this->find_by_email($agriculteur->getEmail());

        if ($stmt->rowCount() > 0) {
            // user found
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['mot_de_passe'] == $agriculteur->getMotDePasse()) {
                // user found + password correct
                return array(
                    'id' => $row['id'],
                    'nom' => $row['nom'],
                    'prenom' => $row['prenom']
                );
            } else {
                // user found + password incorrect
                return array(
                    'id' => 0
                );
            }
        } else {
            // user not found
            return array(
                'id' => -1
            );
        }
    }

    // find_exist
    public function find_exist($agriculteur)
    {
        // query
        $query =
            'SELECT * FROM ' . $this->table_name . ' WHERE email = :email OR num_tel= :num_tel';

        // prepare statement
        $stmt = $this->connection->prepare($query);

        // bind data
        $stmt->bindValue(':num_tel', $agriculteur->getNumTel());
        $stmt->bindValue(':email', $agriculteur->getEmail());

        // Execute query
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

    // find_by_email
    public function find_by_email($email)
    {
        // query
        $query =
            'SELECT * FROM ' . $this->table_name . ' WHERE email = :email';

        // prepare statement
        $stmt = $this->connection->prepare($query);

        // bind data
        $stmt->bindValue(':email', $email);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
}
