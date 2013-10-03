<?php

namespace Witooh\BaseRepository;

use Illuminate\Support\Collection;
use Witooh\Doctrine\DoctrineManager;
use Witooh\Entity\AbstractEntity;

abstract class DoctrineBaseRepository implements IBaseRepository
{
    /**
     * @var DoctrineManager
     */
    protected $dm;

    protected $entity;

    /**
     * @param array $column
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($column = array('*'))
    {
        return $this->dm->em()->getRepository($this->entity)->findAll();
    }

    /**
     * @param array|Collection $data
     */
    public function insertAll($data)
    {
        foreach($data as $item){
            if($item instanceof AbstractEntity){
                $this->dm->em()->persist($item);
            }
        }

        $this->dm->em()->flush();
    }

    /**
     * @param AbstractEntity|null|array $entity
     */
    public function flush($entity=null)
    {
        $this->dm->em()->flush($entity);
    }

    /**
     * @param AbstractEntity $entity
     */
    public function persist($entity)
    {
        $this->dm->em()->persist($entity);
    }

    /**
     * @param int $id
     * @return AbstractEntity
     */
    public function find($id)
    {
        return $this->dm->em()->find($this->entity, $id);
    }

    /**
     * @param AbstractEntity $entity
     */
    public function remove($entity)
    {
        $this->dm->em()->remove($entity);
    }

    /**
     * @param AbstractEntity $entity
     */
    public function detach($entity)
    {
        $this->dm->em()->detach($entity);
    }

    /**
     * @param AbstractEntity $entity
     */
    public function merge($entity)
    {
        $this->dm->em()->merge($entity);
    }
}