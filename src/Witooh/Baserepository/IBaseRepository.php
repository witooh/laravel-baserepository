<?php

namespace Witooh\BaseRepository;

interface IBaseRepository
{
    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'));

    /**
     * @param array|\Illuminate\Support\Collection $data
     */
    public function insertAll($data);

    /**
     * @param \Witooh\Entities\AbstractEntitiy|null|array $entity
     */
    public function flush($entity=null);

    /**
     * @param \Witooh\Entities\AbstractEntitiy $entity
     */
    public function persist($entity);

    /**
     * @param int $id
     * @return \Witooh\Entities\AbstractEntitiy
     */
    public function find($id);

    /**
     * @param \Witooh\Entities\AbstractEntitiy $entity
     */
    public function remove($entity);

    /**
     * @param \Witooh\Entities\AbstractEntitiy $entity
     */
    public function detach($entity);

    /**
     * @param \Witooh\Entities\AbstractEntitiy $entity
     */
    public function merge($entity);

}