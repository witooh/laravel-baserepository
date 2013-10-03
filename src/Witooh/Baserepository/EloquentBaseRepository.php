<?php

namespace Witooh\BaseRepository;

abstract class EloquentBaseRepository implements IBaseRepository
{
    /**
     * @var \Eloquent
     */
    protected $model;

    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'))
    {
        return $this->model->all($column);
    }

    /**
     * @param \Eloquent $entity
     * @return \Eloquent
     */
    public function store($entity)
    {
        return $this->model->create($entity->toArray());
    }

    /**
     * @param array|\Illuminate\Support\Collection $data
     * @return void
     */
    public function storeAll($data)
    {
        if (($data instanceof \Illuminate\Support\Collection) && $data->count() > 0) {
            $this->model->insert($data->toArray());
        } elseif (is_array($data)) {
            $this->model->insert($data);
        }
    }

    /**
     * @param \Eloquent $entity
     * @param string $primaryKey
     */
    public function update($entity, $primaryKey='id')
    {
        $getKeyMethod = 'get'.ucfirst(camel_case($primaryKey));
        $this->model->find($entity->$getKeyMethod())->update($entity->toArray());
    }


    /**
     * @param int $id
     * @return \Eloquent
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param \Eloquent $entity
     */
    public function destroy($entity)
    {
        $entity->delete();
    }

    /**
     * @param $criterai
     * @param int $offset
     * @param int $limit
     * @param string $order
     * @param string $dir
     */
    public function criteriaPager(&$criterai ,&$offset, &$limit, &$order, &$dir='ASC')
    {
        if(empty($offset)){
            $offset = 0;
        }

        if(empty($limit)){
            $limit = 15;
        }

        if(!empty($order)){
            $criterai->orderBy($order, $dir);
        }

        $criterai->offset($offset);
        $criterai->limit($limit);
    }
}