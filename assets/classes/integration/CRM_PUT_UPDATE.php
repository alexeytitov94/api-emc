<?php

class CRM_PUT_UPDATE
{

    static public function start()
    {

        $arResult = [
            'ANSWER' => 'Confirm'
        ];

        return json_encode($arResult);

    }

}