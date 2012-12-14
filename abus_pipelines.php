<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;



function abus_boite_infos($flux){
	include_spip('inc/config');
	$fond=$flux['args']['fond'];
	//$texte=$flux['data']['texte'];
	$contexte=$flux['args']['contexte'];
	
    $objets=lire_config('abus/objets_verifier')?lire_config('abus/objets_verifier'):array();
    list($chemin_fond,$objet_fond) =explode('_',$fond);	
	$objet=$flux['args']['type'];
	$contexte['id_objet']=$flux['args']['id'];
	$contexte['objet']=$objet;


	//Intervention dans le formulaire edition_article
    if (in_array($objet,$objets)){
	
		$flux['data'] .=recuperer_fond('inclure/boite_abus',$contexte,array(ajax=>true));
	}
	return $flux;
    }	


/**
 * Lister les formulaires a prendre en charge contre le SPAM
 * Ajout aux objets de nospam
 */
function abus_nospam_lister_formulaires($flux) {
	include_spip('inc/config');
	
	$objets=lire_config('abus/objets_verifier');

	if(is_array($objets)){
		$formulaires=array('signaler_abus');
		foreach($objets as $objet){
			$formulaires[]='editer_'.$objet;
		}
		$flux=array_merge($flux,$formulaires);
	}
	return $flux;
}

/**
 * Ajout de liste sur la vue d'un auteur
 */
/*function abus_affiche_auteurs_interventions($flux) {
	if ($id_auteur = intval($flux['args']['id_auteur'])) {

		$flux['data'] .= recuperer_fond('prive/objets/liste/abusobjets', array(
			'id_auteur' => $id_auteur,
			'titre' => _T('abus:titre_abusobjets')
		), array('ajax' => true));

	}
	return $flux;
}*/



function abus_formulaire_verifier($flux){
    include_spip('inc/config');	
    
    $form = $flux['args']['form'];
    $objets_abus=(lire_config('abus/objets_verifier')?lire_config('abus/objets_verifier'):array());
	list($action_form,$objet_form) =explode('_',$form);

    if ($action_form =='editer' AND in_array($objet_form,$objets_abus) AND !_request('exec') OR ($form =='signaler_abus')){
		 
	$titre=_request('titre');
	$texte=_request('texte');
	$descriptif=_request('descriptif');
	$chapo=_request('chapo');
	$commentaire=_request('commentaire');
	if($form=='signaler_abus'){
		$texte=$commentaire;
		$objet_form='abusobjet';	
		$flux['args']['contexte']=array(
			'texte'=>array('commentaire'=>$texte)
			);					
		}
	else {
		$textes=array('texte'=>$texte,'descriptif'=>$descriptif,'chapo'=>$chapo);
		$flux['args']['objet']=$objet_form;
		$flux['args']['contexte']=array(
			'titre'=>$titre,
			'textes'=>$textes,
			'texte'=>array('texte'=>$texte)
			);		
		
	}	 
	


	$verifier=charger_fonction('verifier','inc');
	$flux=$verifier($flux);	
	
	}
	
	

	return $flux ;
}


?>
