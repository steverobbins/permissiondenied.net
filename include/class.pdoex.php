<?php

class PDOEx extends PDO {
    
    private $queryCounter = 0;

    /**
     * 
     * 
     * @param string $query
     */
    public function query($query) {
        
        $this->queryCounter++;
        return parent::query($query);
    }

    /**
     * 
     * 
     * @param string $statement
     */
    public function prepare($statement) {
        
        $this->queryCounter++;
        return parent::prepare($statement);
    }

    /**
     * 
     * 
     * @return void
     */
    public function queryCount() {
        
        return $this->queryCounter;
    }
}