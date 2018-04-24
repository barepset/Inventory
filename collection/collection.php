<?php
class collection{
	var $obj_json;
	
	function __construct($obj_json){
	    $this->obj_json = $obj_json;
	}
	
	function add_data($code, $currdate, $pic, $total, $description){
        $objectIn = new stdClass();
        $objectIn -> code = $code;
        $objectIn -> currdate = $currdate;
        $objectIn -> pic = $pic;
        $objectIn -> total = $total;
        $objectIn -> description = $description;
        array_push($this->obj_json->Data, $objectIn);
	}
	
	function get_collection(){
	    return $this->obj_json;
	}
}
	?>