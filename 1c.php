<?php

require('assets/main.php');

$data = $_POST;

$method = $data['METHOD'];
$token = $data['TOKEN'];

if ($token == TOKEN) {

    $result = $method::start($data);

    if($result['TYPE'] == 'ERROR') {

        $result = [
            'DATA' => $data,
            'MESSAGE' => $result['MESSAGE']
        ];

        writeToLog($result, 'ERROR');

        echo json_encode($result);

    } else {

        if ($result['TYPE'] == 'OKAY') {
            echo json_encode([
                'ANSWER' => $result['MESSAGE']
            ]);
        } else {
            echo  json_encode($result);
        }
    }

} else {

    $result = [
        'ANSWER' => 'error',
        'TYPE' => 'Invalid access token'
    ];

    writeToLog($result, 'ERROR');

    return json_encode($result);

}
