<?php

 class RatingRepository extends Repository
{
	protected $statusError = array('status' => '204', 'content' => '' , 'content_type' => 'text/html');
	
	public function getPlaceRating()
	{
		return $this->getConnection()->fetchAll("SELECT user_id, place_id FROM place_rating");
	}
	public function add_rating($placeId, $rating, $userId)
	{
		$dataExecute[] = $userId;
		$dataExecute[] = $placeId;
		$dataExecute[] = $rating;
		
		$query = $this->getConnection()->Qprepare("INSERT INTO place_rating 
												( `user_id`, `place_id`, `rating` ) 
												VALUES (?, ?, ?) ");
		
		$query->execute($dataExecute[0], $dataExecute[1], $dataExecute[2]);
	    $lastId = $this->getConnection()->lastInsertId();
	    
	    $statusComplete = array('status' => '202', 'content' => '' , 'content_type' => 'text/html');
	    return (!empty($lastId)) ? $statusComplete : $this->statusError;
	}
}
?>