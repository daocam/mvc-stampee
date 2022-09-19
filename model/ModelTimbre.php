<?php
    class ModelTimbre extends CRUD
    {
        /**
         * Table Timbre dans la db
         */
        protected $table = 'Timbre';
        protected $primaryKey = 'id';
        protected $fillable = [
            'nom',
            'date_creation',
            'couleurs', 
            'pays', 
            'conditions', 
            'tirage', 
            'dimensions', 
            'certifie'
        ];

    }
?>

