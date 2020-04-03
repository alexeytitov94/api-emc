<?php

class CRM_PUT_NEW
{

    static public function start()
    {

        $arResult = [
            'ANSWER' => 'Confirm'
        ];

        return json_encode($arResult);

    }

}