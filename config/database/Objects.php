<?php

class Objects
{
    public static function objectsForCatalog ($get = []) : array {
        if (isset($get) && !empty($get)) {
            $objects = self::getFilteredObjects($get);
        }
        else $objects = self::getAllObjects();

        $objectsForCatalog = [];

        foreach ($objects as $object) {
            if (count($objectsForCatalog) === 3 || count($objectsForCatalog) === 9) {
                $text = [
                    4 => [
                        'type'  => 'text',
                        'class' => 'text-1',
                        'text'  => Router::getLocale() === 'RU' ? 'МЫ ДЕЛАЕМ ТАК, ЧТОБЫ ВАШИ МИЛЛИАРДЫ РАБОТАЛИ НА ВАС' : 'Big money attracts even more money'
                    ],
                    10 => [
                        'type'  => 'text',
                        'class' => 'text-2',
                        'text'  => Router::getLocale() === 'RU' ? 'МЫ НЕ БОИМСЯ ПРОДАВАТЬ НА МИЛЛИАРДЫ' : 'We are not afraid to sell for billions'
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
        return DB::select('soho_int_objects_site', '*', ['where' => ['archive = 0', 'foto_coverHoriz != ""']]);
    }

    public static function getFilteredObjects($get) {
        $where = self::getFilterWhere($get);

        return DB::select('soho_int_objects_site', '*', $where);
    }

    public static function getFilterWhere($get) : array {
        $where = ['where' => []];

        if (!empty($get['price'])) {
            $price = explode(';', $get['price']);

            $where['where'][] = "from_price_m2 >= ${price[0]} and from_price_m2 <= ${price[1]}";
        }

        if (!empty($get['district'])) {
            if (count($get['district']) > 1) {
                $arrayQueryElement = [];

                foreach ($get['district'] as $nameDistrict => $value) {
                    $arrayQueryElement[] = "district = '${nameDistrict}'";
                }

                $stringQueryElement = implode(' OR ', $arrayQueryElement);
                $where['where'][] = "(${stringQueryElement})";
            } else {
                $district = key($get['district']);
                $where['where'][] = "district = '${district}'";
            }
        }

        if (!empty($get['type'])) {
            if (count($get['type']) > 1) {
                $arrayQueryElement = [];

                foreach ($get['type'] as $typeName => $value) {
                    $arrayQueryElement[] = "types_of_apart = '%".$typeName."%'";
                }

                $stringQueryElement = implode(' and ', $arrayQueryElement);
                $where['where'][] = "(${stringQueryElement})";
            } else {
                $type = key($get['type']);
                $where['where'][] = "types_of_apart LIKE '%${type}%'";
            }
        }

        if (!empty($get['realty'])) {
            if (count($get['realty']) > 1) {
                $arrayQueryElement = [];

                foreach ($get['realty'] as $typeName => $value) {
                    $arrayQueryElement[] = "types_of_realty = '%".$typeName."%'";
                }

                $stringQueryElement = implode(' and ', $arrayQueryElement);
                $where['where'][] = "(${stringQueryElement})";
            } else {
                $type = key($get['realty']);
                $where['where'][] = "types_of_realty LIKE '%${type}%'";
            }
        }

        $newWhere['where'] = array_merge($where['where'], ['archive = 0', 'foto_coverHoriz != ""']);

        return $newWhere;
    }

    public static function getGeoJSONObjects() : array {
        $objects = self::getAllObjects();

        $json = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($objects as $object) {
            $arr = [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$object['longitude'], $object['latitude']]
                ],
                'properties' => [
                    'title' => $object['title'],
                    'subtitle' => $object['subtitle'],
                    'id' => $object['id'],
                    'from_price' => $object['from_price_m2'],
                    'photoSrc' => $object['foto_coverHoriz']
                ]
            ];

            $json['features'][] = $arr;
        }

        return $json;
    }

    public static function getTopObjects() : array {
        return DB::select('soho_int_objects_site', '*', ['where' => ["isTop = 1"]]);
    }

    public static function getOneObject($id) : array {
        return DB::select('soho_int_objects_site', '*', ['where' => ["id = ${id}"]]);
    }

    public static function getPhotoUrl($id, $nameField, $src) : string {
        $privateLink = "https://crm.oxecapital.ru/files/int/objects_dubai/${id}/${nameField}/${src}";
        $publicLink  = "https://crm.oxecapital.ru/export/img.php?watermark=false&img=". Objects::encrypt("sohokeyskeyssoho","files/int/objects_dubai/${id}/${nameField}/${src}");
        $file        = IMG_PATH . "$id/$src";

        if (!file_exists($file)) {

            $folderPath = IMG_PATH . $id;
            if (!is_dir($folderPath)) {
                mkdir($folderPath);
            }

            file_put_contents($file, file_get_contents($privateLink));
            return $publicLink;
        } else {
            return Router::getSite() . "/public/images/$id/$src";
        }
    }

    public static function getRealtyString(string $str) {
        $strToArr     = explode(', ', $str);
        $middleArray  = [];

        foreach ($strToArr as $item) {
            if ($item === 'AP') {
                $middleArray[] = 'Apartments';
            } else if ($item === 'PE') {
                $middleArray[] = 'Penthouse';
            } else if ($item === 'VI') {
                $middleArray[] = 'Villa';
            } else if ($item === 'TO') {
                $middleArray[] = 'Townhouse';
            }
        }

        return implode(', ', $middleArray);
    }

    public static function checkPhoto($id, $src) : bool {
        $file = IMG_PATH . "$id/$src";

        return file_exists($file);
    }

    public static function encrypt($key,$s) {
	$encrypted_text = base64_encode(openssl_encrypt($s, 'aes-256-ctr', $key,0,'vectorvectorvect'));
	$encrypted_text = str_replace("=","",$encrypted_text); // Удаляем знаки "="
	return rawurlencode($encrypted_text);
    }
}