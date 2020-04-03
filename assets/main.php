<?php
header("Content-Type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);



//BITRIX
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("crm");
CModule::IncludeModule("main");
CModule::IncludeModule("im");



//VARIABLE
const TOKEN = 'AaWbCFsLkrcQdnk49Kym08W3EoWyP';
const ENTITY = [
    'DEAL',
    'CONTACT',
    'COMPANY',
    'LEAD'
];



//CLASSES INTEGRATION
require __DIR__.'/classes/integration/CRM_GET_NEW.php';
require __DIR__.'/classes/integration/ACCEPT_NEW_1C.php';
require __DIR__.'/classes/integration/CRM_GET_UPDATE.php';
require __DIR__.'/classes/integration/CRM_GET_DELETE.php';

require __DIR__.'/classes/integration/CRM_PUT_NEW.php';
require __DIR__.'/classes/integration/CRM_PUT_UPDATE.php';
require __DIR__.'/classes/integration/CRM_PUT_DELETE.php';

require __DIR__.'/classes/integration/B24_NOTIFY.php';



//CLASSES ADDITION
require __DIR__.'/classes/Entity.php';
require __DIR__.'/classes/Infoblock.php';



//SCRIPTS
function writeToLog($data, $title = '') {
    $log = "\n------------------------\n";
    $log .= date("Y.m.d G:i:s") . "\n";
    $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
    $log .= print_r($data, 1);
    $log .= "\n------------------------\n";
    file_put_contents(getcwd() . '/hook.log', $log, FILE_APPEND);
    return true;
}

