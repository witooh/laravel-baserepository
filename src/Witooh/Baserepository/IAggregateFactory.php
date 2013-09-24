<?php
namespace Witooh\Aggregates;

interface IAggregateFactory {
    /**
     * @param string $name
     * @param null|array $attr
     * @return \Witooh\Entities\AbstractEntitiy
     */
    public function create($name, $attr=null);
}