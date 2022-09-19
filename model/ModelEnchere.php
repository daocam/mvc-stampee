<?php
    class ModelEnchere extends CRUD
    {
        /**
         * Table Enchere dans la db
         */
        protected $table = 'Enchere';
        protected $primaryKey = 'id';
        protected $fillable = [
            'nom', 
            'date_debut',
            'date_fin',
            'prix_plancher', 
            'prix_actuel', 
            'favori', 
            'idUtilisateur', 
            'idTimbre'
        ];
    }

?>