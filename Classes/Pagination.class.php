<?php

class Pagination extends MysqliConnect{
    
    public function totalPage($table , $other = null , $perPage){
        $this->query('id', $table , $other);
        $this->execute();
        $tableCount = $this->rowCount();
        $count_page = ceil($tableCount / $perPage);
        return $count_page;
    }
}
