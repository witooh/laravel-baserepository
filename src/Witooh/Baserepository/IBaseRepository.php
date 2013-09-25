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
     * @param \Witooh\Entity\AbstractEntitiy|null|array $entity
     */
    public function flush($entity=null);

    /**
     * @param \Witooh\Entity\AbstractEntitiy $entity
     */
    public function persist($entity);

    /**
     * @param int $id
     * @return \Witooh\Entity\AbstractEntitiy
     */
    public function find($id);

    /**
     * @param \Witooh\Entity\AbstractEntitiy $entity
     */
    public function remove($entity);

    /**
     * @param \Witooh\Entity\AbstractEntitiy $entity
     */
    public function detach($entity);

    /**
     * @param \Witooh\Entity\AbstractEntitiy $entity
     */
    public function merge($entity);

}