<!DOCTYPE html>
<html>
<head>
<title><?=$status;?> <?=RestUtils::getStatusCodeMessage($status);?></title>
</head>
<body>
	<div>
		<h1><?=$status;?> <?=RestUtils::getStatusCodeMessage($status);?></h1>  
		<p><?=$message;?></p>  
		<hr />  
		<address><?=$signature;?></address> 
	</div>
</body>
</html