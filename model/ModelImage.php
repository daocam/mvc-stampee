<?php
    class ModelImage extends CRUD
    {
        /**
         * Table Image dans la db
         */
        protected $table = 'Image';
        protected $primaryKey = 'id';
        protected $fillable = ['filename', 'idTimbre'];
    }

?>