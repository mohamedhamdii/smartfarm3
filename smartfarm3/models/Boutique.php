 <?php

    class Boutique
    {
        // table fields
        private $id;
        private $agriculteur;
        private $categorie;
        private $nom_produit;
        private $description;
        private $quantite_totale;
        private $prix_unitaire;

        public function getId()
        {
            return $this->id;
        }
        public function getAgriculteur()
        {
            return $this->agriculteur;
        }
        public function getCategorie()
        {
            return $this->categorie;
        }
        public function getNomProduit()
        {
            return $this->nom_produit;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getQuantiteTotale()
        {
            return $this->quantite_totale;
        }
        public function getPrixUnitaire()
        {
            return $this->prix_unitaire;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function setAgriculteur($agriculteur)
        {
            $this->agriculteur = $agriculteur;
        }
        public function setCategorie($categorie)
        {
            $this->categorie = $categorie;
        }
        public function setNomProduit($nom_produit)
        {
            $this->nom_produit = $nom_produit;
        }
        public function setDescription($description)
        {
            $this->description = $description;
        }
        public function setQuantiteTotale($quantite_totale)
        {
            $this->quantite_totale = $quantite_totale;
        }
        public function setPrixUnitaire($prix_unitaire)
        {
            $this->prix_unitaire = $prix_unitaire;
        }
    }
