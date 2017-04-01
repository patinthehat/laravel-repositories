<?php

namespace Permafrost;
 
interface RepositoryContract
{
    public static function model();
    
    public function findByField($fieldName, $searchFor);
    public function findAllByField($fieldName, $searchFor);

    public function create(array $data);
    public function delete($id);
    public function update($id, array $data, $attribute = "id");

}
