<?PHP 

error_reporting(E_ALL);
ini_set("display_errors", 1);

$defaultFileName = './user_files/user_storage_x.json';

$userid = null;

if(isset($_COOKIE["userid"])){
	$userid = $_COOKIE["userid"];
}
$userFileName = './user_files/user_storage_'.$userid.'.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// $reqBody = file_get_contents('php://input');
	$reqBody = $_POST['hashtaglists'];
	file_put_contents($userFileName, $reqBody);
	echo $reqBody;
} else  {
	if(file_exists($userFileName)){
		echo file_get_contents($userFileName, true);
	}else{
		echo file_get_contents($defaultFileName, true);	
	}
}


?>