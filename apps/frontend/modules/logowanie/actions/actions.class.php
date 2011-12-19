<?php

/**
 * logowanie actions.
 *
 * @package    edziennik
 * @subpackage logowanie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class logowanieActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeLoguj(sfWebRequest $request)
  {
      $this->form = new LogowanieForm();
   
  }
  
public function executeWeryfikuj($request)
{
  
  $this->forward404Unless($request->isMethod('post'));
  
	$login= $this->getRequestParameter('login');
  	$haslo= $this->getRequestParameter('haslo');  
	
 if($login == "" || $haslo == "")
 {
 	return $this->getContext()->getController()->redirect('logowanie/loguj?er=blad');
 }
	
  if ($login && $haslo) {
 	
  	$c = new Criteria();
  	$c->add(UzytkownikPeer::LOGIN, $login);
  	$c->addAND(UzytkownikPeer::HASLO, sha1($haslo));
  	$u = UzytkownikPeer::doSelectOne($c);		
	
		 
if($u)
{
	
	$this->getUser()->setAuthenticated(true);
	//$this->getUser()->setAttribute('login', $u->getLogin()); /nie działa  źle pobieram dane z zapytania chyba
	$this->getUser()->clearCredentials();
		
	if($u->getRodzaj() == 'admini'){
		$this->getUser()->addCredential('admin');
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/admin');
		
	}

	if($u->getRodzaj() == 'sekret'){
		$this->getUser()->addCredential('sekret');
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/sekretariat');
	}
	
	if($u->getRodzaj() == 'nauczy'){
		$this->getUser()->addCredential('naucz');
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/nauczyciel');
	}

	
	if($u->getRodzaj() == 'rodzic'){
		$this->getUser()->addCredential('rodzic');
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/rodzic');
	}
		
	if($u->getRodzaj() == 'uczens'){
		$this->getUser()->addCredential('uczen');
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/uczen');
	}
	
}else{
	$post['er'] = 'blad';
	return $this->getContext()->getController()->redirect('logowanie/loguj?'. http_build_query($post));
}	
 
  
}
 

 
}


}
  
 


