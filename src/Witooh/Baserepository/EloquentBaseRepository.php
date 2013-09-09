<?php

namespace Witooh\BaseRepository;

abstract class EloquentBaseRepository implements IBaseRepository
{

    /**
     * @var \Eloquent
     */
    protected $model;

    public function __construct()
    {
//        $this->model = $this->getModelQuery();
        $this->model = $this->instance();
    }

    /**
     * @param array $data
     * @return
     */
    abstract public function instance($data = array());

    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'))
    {
        return $this->model->get($column);
    }

    /**
     * @param array $attr
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store($attr)
    {
        $model = $this->model->getModel();

        return $model->create($attr);
    }

    /**
     * @param array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection $data
     * @return bool
     */
    public function storeAll($data)
    {
        if (($data instanceof \Illuminate\Support\Collection) && $data->count() > 0) {
            return $this->model->insert($data->toArray());
        } elseif (is_array($data)) {
            return $this->model->insert($data);
        }
    }

    /**
     * @param int $id
     * @param array $attr
     * @return bool
     */
    public function update($id, $attr)
    {
        $model = $this->model->find($id);
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