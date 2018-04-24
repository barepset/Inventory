<?php
include "config/connection.php";
include "collection/collection.php";
function myErrorHandler($errno, $errstr, $errfile, $errline) {
if(!!$errstr){
	throw new Exception($errstr);
	}
return false;
}
set_error_handler('myErrorHandler');
	
	try {
		$status = $_GET['uac'];
		switch($status){
			case 1:
				$data = get_object();
				break;
			case 2:
				$data = do_insert();
				break;
			case 3:
				$data = do_delete();
				break;
			case 4:
				$data = do_update();
				break;
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	} catch(Exception $ex) {
		$obj_json = new stdClass();
		$obj_json->Status = false;
		$obj_json->Message = $ex->getMessage();
		header('Content-Type: application/json');
		echo json_encode($obj_json);
}
// Fungsi Get Object
function get_object() {
		$jsonObject = new stdClass();
		$jsonObject->Status = true;
		$jsonObject->Data = array();
		
		$core = new connection();
		$db = $core->get_db();
		
		if(isset($_GET['code'])) {
			$code = $_GET['code'];
			$stat = $db->prepare("SELECT * FROM collection WHERE code=:code ");
			$stat->bindParam(':code', $code, PDO::PARAM_STR);
		} else {
			$stat = $db->prepare("SELECT * FROM collection");
		}
		$stat->execute();
		
		$model = new collection($jsonObject);
		while($data = $stat->fetch(PDO::FETCH_ASSOC)) {
			$model->add_data($data["code"], $data["currdate"], $data["pic"], $data["total"], $data["description"]);
		}
		return $jsonObject;
}

// Fungsi INSERT
function do_insert() {
	$postdata = json_decode(file_get_contents("php://input"));
	
	$code = $postdata->code;
	$currdate = $postdata->currdate;
	$pic = $postdata->pic;
	$total = $postdata->total;
	$description = $postdata->description;
	
	$core = new connection();
	$db = $core->get_db();
	
	$stat = $db->prepare("INSERT INTO collection (code,currdate,pic,total,description) VALUES (:code, :currdate, :pic, :total, :description) ");
	// $stat = $db->prepare("INSERT INTO `collection`(`code`, `currdate`, `pic`, `total`, `description`) VALUES (:code, :currdate, ':pic', :total, ':description') ");
	$stat->bindParam(':code', $code, PDO::PARAM_STR);
	$stat->bindParam(':currdate', $currdate, PDO::PARAM_STR);
	$stat->bindParam(':pic', $pic, PDO::PARAM_STR);
	$stat->bindParam(':total', $total, PDO::PARAM_STR);
	$stat->bindParam(':description', $description, PDO::PARAM_STR);

	$stat->execute();
}

// Fungsi UPDATE
function do_update(){
	$postdata = json_decode(file_get_contents("php://input"));
	
	$code = $postdata->code;
	$currdate = $postdata->currdate;
	$pic = $postdata->pic;
	$total = $postdata->total;
	$description = $description->description;
	
	$code = new connection();
	$db = $core->get_db();
	
	$stat = $db->prepare("UPDATE 'collection' SET 'currdate'=:currdate , 'pic'=:pic , 'total'=:total, 'description'=:description  WHERE collection 'code=:code");
	$stat = bindParam(':code',$code,PDO::PARAM_STR);
	$stat = bindParam(':currdate',$code,PDO::PARAM_STR);
	$stat = bindParam(':pic',$code,PDO::PARAM_STR);
	$stat = bindParam(':total',$code,PDO::PARAM_STR);
	$stat = bindParam(':description',$description, PDO::PARAM_STR);
	$stat -> execute();
	
	$jsonObject = new stdClass();
	$jsonObject -> Status = true;
	
	return $jsonObject;
}
// Fungsi DELETE
function do_delete() {
	$code = $_GET['code'];
	
	$core = new connection();
	$db = $core->get_db();
	
	$stat = $db->prepare("DELETE FROM collection WHERE code = :code");
	$stat->bindParam(':code', $code, PDO::PARAM_STR);
	$stat->execute();
	
	$jsonObject = new stdClass();
	$jsonObject->Status = true;
	
	return $jsonObject;
}


error_reporting(E_ERROR);
ini_set('display_errors', 1);  
?>