<?php

class ControllerMarkers
{
	protected $statusError = array('status' => '406', 'content' => '' , 'content_type' => 'text/html');
	
    public function getMarkers()
    {
    	$markerRepository = new MarkersRepository();
        return $markerRepository->getMarkers();
    }
    
    public function getMarkerId($cityId)
    {
    	$markerRepository = new MarkersRepository();
    	// Проверка переменной
    	return (!is_numeric($cityId)) ? $this->statusError : $markerRepository->getMarkerId($cityId);
    }
}
?>