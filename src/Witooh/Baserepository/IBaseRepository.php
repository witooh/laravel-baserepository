<?php

namespace Witooh\BaseRepository;

interface IBaseRepository
{


    public function __construct();

    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'));

    /**
     * @param array $attr
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store($attr);

    /**
     * @param array|\Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Collection $data
     * @return bool
     */
    public function storeAll($data);

    /**
     * @param int $id
     * @param array $attr
     * @return bool
     */
    public function update($id, $attr);

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array $attr
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateByModel($model, $attr = array());

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id);

    /**
     * @param array|int $ids
     */
    public function destroy($ids);

    /**
     * @param array $data
     * @return
     */
    public function instance($data = array());

}