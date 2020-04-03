<?php

class Entity
{

    static public function getEntity($entity, $id)
    {
        $class = 'CCrm'.$entity;

        //order-filter-select
        return $class::GetList(['ID' => 'ASC'],['ID' => $id])->Fetch();
    }

}