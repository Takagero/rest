<?php

/**
 * Created by PhpStorm.
 * User: DenJ
 * Date: 09.10.2016
 * Time: 15:32
 */
class ControllerMarkers
{


    /**  @param "lat" - широта
     *   @param "lng" - долгота
     *   @param "content" - описание места
     *   @param "pathFoto" - путь к фото места
     *   @param "autor" - Автор записи
     *   @param "date" - Дата создания записи
     *    или
     *   @param "err" - если город не найден.
     *   @print передаем результат в формате JSON
     */
    public function getMarkers($cityId)
    {
        $query = MarkersRepository::getMarkers($cityId);
        return json_encode($query);

    }
    /**
     * @param array $markers
     */
//    public function setMarkers($markers)
//    {
//        $this->markers = $markers;
//    }
}