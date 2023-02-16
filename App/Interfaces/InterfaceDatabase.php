<?php

interface DatabaseConnect{
public function query($colum , $table , $other);
public function execute();
public function rowCount();
public function update($table , $data , $colum, $id , $other);
public function delete($table , $colum , $id , $other);
public function insert($table , $colum , $value);
public function lastId();
public function fetch();
}

