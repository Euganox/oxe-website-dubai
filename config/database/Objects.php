<?php

class Objects
{
    public static function objectsForCatalog ($where = '') : array {
        $objects = self::getAllObjects();
        $objectsForCatalog = [];

        foreach ($objects as $object) {
            if (count($objectsForCatalog) === 3 || count($objectsForCatalog) === 9) {
                $text = [
                    4 => [
                        'type' => 'text',
                        'class' => 'text-1',
                        'text' => 'Big money attracts even more money'
                    ],
                    10 => [
                        'type' => 'text',
                        'class' => 'text-2',
                        'text' => 'We are not afraid to sell for billions'
                    ]

                ];

                $objectsForCatalog[] = $text[count($objectsForCatalog) + 1];
            }

            if (count($objectsForCatalog) === 4) $object['class'] = 'double-1';
            else if (count($objectsForCatalog) === 8) $object['class'] = 'double-2';

            $objectsForCatalog[] = $object;
        }

        return $objectsForCatalog;
    }

    public static function getAllObjects(): array {
        return OBJECTS;
        // return DB::select('soho_int_objects_site', '*', ['where' => ['archive = 0', 'foto_coverHoriz != ""']]);
    }

    public static function getGeoJSONObjects() {
        $objects = OBJECTS;
    }

    public static function getOneObject($id) : array {
        //$object = DB::select('soho_int_objects_site', '*', ['where' => ["id = ${id}"]]);
        return [];
    }
}