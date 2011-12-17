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
  	$c->add(UzytkownikPeer::HASLO, sha1($haslo));
  	$u = UzytkownikPeer::doSelectOne($c);
	
if($u)
{
	echo "Zalogowano";
	$this->getUser()->setAuthenticated(true);
	$this->getUser()->setAttribute('login', $u->getLogin());
	$this->getUser()->clearCredentials();
	$this->getUser()->addCredential($u->getRodzaj()); // nie działa :/
	

	
	
	if($this->getUser()->hasCredential('admin')){
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/admin');
	}
	if($this->getUser()->hasCredential('rodzic')){
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/rodzic');
	}
	if($this->getUser()->hasCredential('naucz')){
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/nauczyciel');
	}
	if($this->getUser()->hasCredential('sekre')){
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/sekretariat');
	}
	if($this->getUser()->hasCredential('uczen')){
		return $this->getContext()->getController()->redirect('/backend.php/zaplecze/uczen');
	}
	
}else{
	echo "Nie zalogowano";
	$post['er'] = 'blad';
	return $this->getContext()->getController()->redirect('logowanie/loguj?'. http_build_query($post));
}	
 
  
}
 

 
}


}
  
 


