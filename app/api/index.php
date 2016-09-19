<?PHP 

error_reporting(E_ALL);
ini_set("display_errors", 1);

$userFileName = './user_storage_x.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST' || !empty($_POST)) {
	$reqBody = file_get_contents('php://input');
	// file_put_contents($userFileName, $reqBody);
	echo $reqBody;
	echo "<br/>";
	echo "<br/>";
	echo $_GET['userid'];
} else  {
	echo file_get_contents($userFileName, true);
}


?>