<?php
class ControllerRating
{
	protected $statusError = array('status' => '406', 'content' => '' , 'content_type' => 'text/html');
	
    public function add_rating($data)
    {
    	$placeId = $data['id_article'];
    	$rating = $data['rating'];
    	$userId = $data['id_user'];
    	
    	$ratingRepository = new RatingRepository();
    	
    	// Получение user_id и place_id из таблицы place_rating
    	$placeRating = $ratingRepository->getPlaceRating();
    	
    	// Проверяем ставил ранее пользователь рейтинг или нет
    	foreach ($placeRating as $idUsPl)
    	{
    		if ($idUsPl['user_id'] == $idUsPl && $idUsPl['place_id'] == $placeId) {
    			return $this->statusError;
    		}
    	}
    	
    	return (is_numeric($placeId) && is_numeric($rating) && is_numeric($userId)) ? $ratingRepository->add_rating($placeId, $rating, $userId) : $this->statusError;
    }
}
?>