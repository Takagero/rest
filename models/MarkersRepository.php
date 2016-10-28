<?php

 class MarkersRepository extends Repository
{
	protected $statusError = array(
		array('status' => '500', 'content' => '' , 'content_type' => 'text/html'),
		array('status' => '406', 'content' => '' , 'content_type' => 'text/html'),
	);
    public function getMarkers ()
    {
		$result = $this->getConnection()->fetchAll("SELECT * FROM extreme.place as p");
		
		$statusComplete = array('status' => '200', 'content' => $result , 'content_type' => 'application/json');
		return (!empty($result)) ? $statusComplete : $this->statusError[0];
    }
    
    public function getMarkerId ($cityId)
    {
    	$dataExecute[] = $cityId;
        $query = $this->getConnection()->Qprepare("SELECT * FROM extreme.place
												WHERE city_id = ? ");
        $query->execute($dataExecute);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $statusComplete = array('status' => '200', 'content' => $result , 'content_type' => 'application/json');
        return ($result != false) ? $statusComplete : $this->statusError[1];
    }
}
?>