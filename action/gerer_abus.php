<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function action_gerer_abus_dist($arg=null) {	
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	
	include_spip('inc/session');
	include_spip('inc/config');

	//Les variables
	list($id_objet,$objet,$statut,$args)= explode("-",$arg);
	$data=sql_fetsel('*','spip_'.$objet.'s','id_'.$objet.'='.$id_objet);
	$s=$data['statut'];
	switch($statut){
		case 'accepte' : 
			if($s)sql_updateq('spip_'.$objet.'s',array('statut'=>'abus'),'id_'.$objet.'='.$id_objet);	
			break;
		case 'refuse' : 
			if($s)sql_updateq('spip_'.$objet.'s',array('statut'=>'publie'),'id_'.$objet.'='.$id_objet);	
			break;
		case 'spam' : 
			if($s)sql_updateq('spip_'.$objet.'s',array('statut'=>$statut),'id_'.$objet.'='.$id_objet);	
			break;
		}
	
	sql_updateq('spip_abusobjets',array('statut'=>$statut),'id_objet='.$id_objet.' AND objet ='.sql_quote($objet));


	return array($id_objet,$objet);
}

?>
