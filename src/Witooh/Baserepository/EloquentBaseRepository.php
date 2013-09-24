<?php

namespace Witooh\BaseRepository;

use Illuminate\Database\Query\Builder;

abstract class EloquentBaseRepository implements IBaseRepository
{
    /**
     * @var \Illuminate\Database\Query\Builder
     */
    protected $db;

    /**
     * @return \Witooh\Entities\AbstractEntitiy
     */
    abstract public function instance();

    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'))
    {
        return $this->db->get($column);
    }

    /**
     * @param array $attr
     * @return \Witooh\Entities\AbstractEntitiy
     */
    public function store($attr)
    {
        $model = $this->instance();
        $model->fill($attr);

        $id = $this->db->insertGetId($attr);
        $model->setPrimaryKeyValue($id);

        return $model;
    }

    /**
     * @param array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $data
     * @return bool
     */
    public function storeAll($data)
    {
        if (($data instanceof \Illuminate\Support\Collection) && $data->count() > 0) {
            return $this->db->insert($data->toArray());
        } elseif (is_array($data)) {
            return $this->db->insert($data);
        }
    }

    /**
     * @param int $id
     * @param array $attr
     * @return bool
     */
    public function update($id, $attr)
    {
        $data = get_object_vars($this->db->find($id));

        if($data != null){
            $model = $this->instance()->fill($data);
            $this->db->where($model->getPrimaryKey(), $model->getPrimaryKeyValue())->update($model->v);
        }

        $model = $this->instance()->fill($data);

        if ($model != null) {
            return $model->fill($attr)->save();
        }

        return false;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array $attr
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateByModel($model, $attr = array())
    {
        $model->fill($attr)->save();

        return $model;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array|int $ids
     */
    public function destroy($ids)
    {
        $this->model->destroy($ids);
    }
}