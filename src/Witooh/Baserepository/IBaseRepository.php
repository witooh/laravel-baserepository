<?php

namespace Witooh\BaseRepository;

interface IBaseRepository
{
    /**
     * @param array $column
     * @return \Illuminate\Support\Collection
     */
    public function all($column = array('*'));

    /**
     * @param \Eloquent $entity
     * @return \Eloquent
     */
    public function store($entity);

    /**
     * @param array|\Illuminate\Support\Collection $data
     * @return void
     */
    public function storeAll($data);

    /**
     * @param \Eloquent $entity
     * @param string $primaryKey
     */
    public function update($entity, $primaryKey='id');

    /**
     * @param int $id
     * @return \Eloquent
     */
    public function find($id);

    /**
     * @param \Eloquent $entity
     */
    public function destroy($entity);

}