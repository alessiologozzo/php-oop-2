<?php
    class Product{
        public $name, $price, $category, $type, $img;

        function __construct($name, $price, $category, $type, $img){
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->type = $type;
            $this->img = $img;
        }
    }