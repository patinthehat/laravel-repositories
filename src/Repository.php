<?php

namespace Permafrost;

abstract class Repository implements RepositoryContract
{ 

    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;
    
    public function __construct()
    {
        $this->model = app()->make(static::model());
    }
    
    public function findByField($fieldName, $searchFor)
    {
        return $this->model->where($fieldName, $searchFor)->first();
    }

    public function findAllByField($fieldName, $searchFor)
    {
        return $this->model->where($fieldName, $searchFor)->get();
    }

    public function __call($name, array $args)
    {
        if (starts_with($name, 'findBy')) {
            $field = snake_case(substr($name, 6, strlen($name)-5));
            //return "this::findByField('$field', '".implode(' ', $args)."');";
            return $this->findByField($field, implode(' ', $args));
        }
        
        if (starts_with($name, 'findAllBy')) {
            $field = snake_case(substr($name, 9, strlen($name)-9));
            //return "this::findAllByField('$field', '".implode(' ', $args)."');";
            return $this->findAllByField($field, implode(' ', $args));
        }
    }
    
    public function create(array $data)
    {
        $result = $this->model->create($data);
        return $result;
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        return $this;
    }
    
    public function update($id, array $data, $attribute = "id")
    {
        $this->model->where($attribute, '=', $id)->update($data);
        return $this;
    }
    
}
