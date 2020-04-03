<?php

class ACCEPT_NEW_1C
{

    static public function start($data)
    {
        foreach ($data['DATA'] as $key => $item) {

            foreach ($item as $entity) {
                $entity_class = 'CCrm'.$key;
                $entity_st = new $entity_class();
                $arFields = array('ORIGIN_ID' =>  $entity['ORIGIN_ID']);
                $entity_st->Update($entity['ID'],$arFields);
            }

        }

        return [
            'TYPE' => 'OKAY',
            'MESSAGE' => 'Updated'
        ];

    }

}