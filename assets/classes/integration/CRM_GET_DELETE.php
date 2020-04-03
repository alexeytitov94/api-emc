<?php

class CRM_GET_DELETE
{

    static public function start($data)
    {
        //Получаю все новые сущности
        $arResult = Infoblock::getEntitys(33);

        if (!count($arResult)) {
            return [
                'TYPE' => 'ERROR',
                'MESSAGE' => 'New elements not found'
            ];
        } else {
            return $arResult;
        }

    }

}