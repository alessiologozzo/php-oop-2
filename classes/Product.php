<?php
    trait Icon{
        public $icon;

        public function setIcon($icon){

            try{
                $this->icon = $icon;
                if($this->icon != "fa-solid fa-cat" && $this->icon != "fa-solid fa-dog")
                    throw new UnexpectedValueException;
            }
            catch(UnexpectedValueException $e){
                $this->icon = "fa-solid fa-bug";
            }
        }
    }

    class Product{
        use Icon;
        public $name, $price, $category, $type, $img;

        function __construct($name, $price, $category, $type, $img){
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->type = $type;
            $this->img = $img;

            if($this->category == "Gatto")
                $this->setIcon("fa-solid fa-cat");
            else
                $this->setIcon("fa-solid fa-dog");
        }
    }