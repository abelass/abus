<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function action_signaler_abus_dist($arg=null) {	
	if (is_null($arg)){
		$securiser_action = charger_fonction('securiser_action', 'inc');
		$arg = $securiser_action();
	}
	
	include_spip('inc/session');
	include_spip('inc/config');

	//Les variables
	list($id_objet,$objet,$args)= explode("-",$arg);	
	$statut='signale';	
	
	$signaler=charger_fonction('signaler_abus','inc');
	$signaler=$signaler($id_objet,$objet,$statut);

	return array($id_objet,$objet);
}

?>
