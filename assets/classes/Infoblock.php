<?php

class Infoblock
{

    static public function getEntitys($id_block)
    {
        $arResult = [];

        $arSelect = [
            '*',
            'PROPERTY_*'
        ];

        $arFilter = [
            "IBLOCK_ID"=>$id_block,
            "ACTIVE"=>"Y"
        ];

        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

        while($ob = $res->GetNextElement()){

            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();

            $arAllEntity[$arFields['ID']] = [
                'ID_ELEMENT'=>$arFields['ID'],
                'ID_CRM_OBJECT'=>$arFields['NAME'],
                'DATE_CREATE'=>$arFields['DATE_CREATE'],
            ];

            $arAllEntity[$arFields['ID']]['OBJECT'] = $arProps['OBJECT']['VALUE_XML_ID'];

        }

        //Блок с удаленными сущностями
        if ($id_block == 33) {
            foreach ($arAllEntity as $item) {
                $arResult[$item['OBJECT']][] = [
                    'ID' => $item['ID_CRM_OBJECT']
                ];
            }
        } else {
            foreach ($arAllEntity as $item) {
                $entity = Entity::getEntity($item['OBJECT'], $item['ID_CRM_OBJECT']);
                $arResult[$item['OBJECT']][] = $entity;
            }
        }

        return $arResult;

    }

}