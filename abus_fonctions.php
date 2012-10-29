<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


function donnees_objet($objet,$id_objet,$champ=''){
	
	if(!$champ)$data=sql_fetsel('*','spip_'.$objet.'s','id_'.$objet.'='.$id_objet);
	else$data=sql_getfetsel($champ,'spip_'.$objet.'s','id_'.$objet.'='.$id_objet);

	return $data;
	}


?>
