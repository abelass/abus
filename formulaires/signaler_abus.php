<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/editer');



/**
 * Declarer les champs postes et y integrer les valeurs par defaut
 */
function formulaires_signaler_abus_charger_dist($objet,$id_objet){
	$valeurs=array('commentaire'=>'');
	return $valeurs;
}

/**
 * Verifier les champs postes et signaler d'eventuelles erreurs
 */
function formulaires_signaler_abus_verifier_dist($objet,$id_objet){
	$erreurs=array();
	
	if(!_request('commentaire'))$erreurs['commentaire']=_T("info_obligatoire");
	
	return $erreurs;
}

/**
 * Traiter les champs postes
 */
function formulaires_signaler_abus_traiter_dist($objet,$id_objet){
	$valeurs=array();
	
	$commentaire=_request('commentaire');
	
	$signaler=charger_fonction('signaler_abus','inc');
	$signaler=$signaler($id_objet,$objet,'signale',$commentaire);
	$valeurs['message_ok']=_T('abus:objets_signale_abusif');
	return $valeurs;
}


?>
