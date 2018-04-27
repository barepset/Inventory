<?
class connection {
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $db_name = "test";
	
	function get_db() {
		return $db = new PDO("mysql:dbname=".$this->db_name
		.";host=".$this->host.";", $this->username, $this->password);
	}
}
?>