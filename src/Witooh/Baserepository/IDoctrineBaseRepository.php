<?php

namespace Witooh\BaseRepository;

interface IDoctrineBaseRepository
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
     * @param \Witooh\Entity\AbstractEntity|null|array $entity
     */
    public function flush($entity=null);

    /**
     * @param \Witooh\Entity\AbstractEntity $entity
     */
    public function persist($entity);

    /**
     * @param int $id
     * @return \Witooh\Entity\AbstractEntity
     */
    public function find($id);

    /**
     * @param \Witooh\Entity\AbstractEntity $entity
     */
    public function remove($entity);

    /**
     * @param \Witooh\Entity\AbstractEntity $entity
     */
    public function detach($entity);

    /**
     * @param \Witooh\Entity\AbstractEntity $entity
     */
    public function merge($entity);

}