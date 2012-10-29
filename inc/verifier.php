<?php

function inc_verifier_dist($flux){
	include_spip('inc/texte');
	
	// si nospam est present on traite les spams
	if (include_spip('inc/nospam')) {
		$data = $flux['args']['contexte'];
		$objet = $flux['args']['objet'];
		$titre=$data ['titre'];

		if(is_array($data['texte'])) list($champ_texte,$texte) =each($data['texte']);
		else {
			$texte=$data['texte'];
			$champ_texte='texte';
			}

		$caracteres = compter_caracteres_utiles($texte);
		// moins de 10 caracteres sans les liens = spam !
		if ($caracteres < 10){
			$flux['data'][$champ_texte] = _T('forum:forum_attention_dix_caracteres');
		}
		// on analyse le sujet
		if($titre)$infos_sujet = analyser_spams($titre);
		// si un lien dans le sujet = spam !
		if ($infos_sujet['nombre_liens'] > 0)
			$flux['data']['titre'] = _T('nospam:erreur_spam');
		
		if(is_array($textes)){
			// on analyse les textes
			foreach($textes AS $t=>$v){
				$flux=verifier_texte($flux,$t,$v,$objet);
				unset($infos_texte );
				}
			}
		else{
			$flux=verifier_texte($flux,$champ_texte,$texte,$objet);
			}
		}
	return $flux;
	}
	
function verifier_texte($flux,$champ,$texte,$objet='article'){
	$infos_texte = analyser_spams($texte);

	if ($infos_texte['nombre_liens'] > 0) {
		// si un lien a un titre de moins de 3 caracteres = spam !
		if ($infos_texte['caracteres_texte_lien_min'] < 3) {
			$flux['data'][$champ] = _T('nospam:erreur_spam');
		}
		// si le texte contient plus de trois lien = spam !
		if ($infos_texte['nombre_liens'] >= 3)
			$flux['data'][$champ] = _T('nospam:erreur_spam');
	}
	// regarder si il y a des liens deja references par des spammeurs

	if (!isset($flux['data'][$champ])
	  AND isset($infos_texte['liens'])
	  AND count($infos_texte['liens'])){
		if ($h = rechercher_presence_liens_spammes($infos_texte['liens'],3,'spip_'.$objet.'s',array($champ))){
			spip_log("Refus texte de l'objet qui contient un lien vers $h, d&eacute;j&agrave; d&eacute;tecte pour cet objet","nospam");
			$flux['data'][$champ] = _T('nospam:erreur_url_deja_spammee');
		}
		elseif($h = rechercher_presence_liens_spammes($infos_texte['liens'],3,'spip_abusobjets',array('commentaire'),'statut !='.sql_quote('refuse'))){
			spip_log("Refus texte de l'objet de forum qui contient un lien vers $h d&eacute;ja pr&eacute;sent parmis les objets abusifs","nospam");
			$flux['data'][$champ] = _T('nospam:erreur_url_deja_spammee');			
			}

	}	

	return $flux;
	}	

?>
