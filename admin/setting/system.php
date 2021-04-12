<?php
class kontrols{
	public function __construct($db){
		$this->kon=$db;
	}
	function login($username,$password){
		$sql=(" select * from user where username=? and password=? and level=?");
		$masuk=$this->kon->prepare($sql);
		$masuk->bindparam(1,$username);
		$masuk->bindparam(2,$password);
		$masuk->bindparam(3,$level);
		$masuk->execute();
		$mulai=$masuk->fetchAll();
		return $mulai;
	}
}
?>