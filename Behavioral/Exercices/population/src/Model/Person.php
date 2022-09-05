<?php

namespace Population\Model;

class Person{

    public function __construct(
        private string $name,
        private int $id,
        private array $relations = []
    ){
        
    }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of relation
         */ 
        public function getRelations()
        {
                return $this->relations;
        }

        /**
         * Set the value of relation
         *
         * @return  self
         */ 
        public function addRelation($relation)
        {
                $this->relations[] = $relation;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}