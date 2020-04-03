<?php

class B24_NOTIFY
{

    static public function start($data)
    {

        $arFields = array(
            "MESSAGE_TYPE" => "S",
            "TO_USER_ID" => $data['USER_ID'],
            "FROM_USER_ID" => $data['USER_ID'],
            "MESSAGE" => $data['MESSAGE'],
            "AUTHOR_ID" => 1,
            "EMAIL_TEMPLATE" => "some",
            "NOTIFY_TYPE" => 4,
            "NOTIFY_MODULE" => "main",
        );


        if(CIMMessenger::Add($arFields)) {
            return [
                'TYPE' => 'OKAY',
                'MESSAGE' => 'Updated'
            ];
        } else {
            return [
                'TYPE' => 'ERROR',
                'MESSAGE' => 'Notification not sent'
            ];
        }



    }

}