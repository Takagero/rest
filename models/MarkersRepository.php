<?php
//return self::getConnections()->fetchAll("SELECT...");
/**
 * Created by PhpStorm.
 * User: DenJ
 * Date: 09.10.2016
 * Time: 16:15
 */
 class MarkersRepository 
{
     /*
      * запрос к базе и получение данных по cityID
      */
    public static function getMarkers ($cityId)
    {
        //инициализация массива для маркеров.
        $arr='';
        //многомерный массив с маркерами
        $markers = [
            ['cityId' => '1', 'lat' => '40.8171321', 'lng'=>'-73.996854', 'content' => 'Некий текст 1',
                'pathFoto' =>'/путь к фото', 'autor' => 'Автрор 1', 'date' => '05.10.2016'],
            ['cityId' => '2', 'lat' => '40.7416627', 'lng'=>'-74.0728354', 'content' => 'Некий текст 2',
                'pathFoto' =>'/путь к фото', 'autor' => 'Автрор 2', 'date' => '05.10.2016'],
            ['cityId' => '3', 'lat' => '40.814505', 'lng'=>'-74.07272910000002', 'content' => 'Некий текст 3',
                'pathFoto' =>'/путь к фото', 'autor' => 'Автрор 2', 'date' => '05.10.2016'],
            ['cityId' => '4', 'lat' => '40.7428759', 'lng'=>'-74.00584719999999', 'content' => 'Некий текст 4',
                'pathFoto' =>'/путь к фото', 'autor' => 'Автрор 3', 'date' => '05.10.2016'],
        ];
        //пробежка по массиву с маркерами
        foreach ($markers as $city => $value)
        {
            //ищим совпадение с входной переменной $cityId
            if ($value['cityId'] == $cityId)
            {
                //нашли совпадение? добавляем найденый массив данный в массив $arr
                $arr[] = $value;
            }
        }
        //Проверяем является ли переменная $arr массивом
        if (gettype($arr) != 'array')
        {
            //если не является переменной, то длбавляем инфу с ошибкой
            $arr['err'] = 'нет города';
        }
        //отправляем массив
        return $arr;
    }
}
