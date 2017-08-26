<?php
  function adapter($userDisability){
    $userDisability = str_replace(' ', '', $userDisability);
	if (strtoupper($userDisability)=="DALTONISMO") {
	 	return "daltonismo";
	} else if (strtoupper($userDisability)=="CEGUERA") {
		return "ceguera";
	} else if (strtoupper($userDisability)=="VISIONBORROSA") {
		return "visionBorrosa";
	} else {
		return "sinDiscapacidad";
	}
  }
?>