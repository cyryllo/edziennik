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
	
  if ($login && $haslo) {
 	
  	$c = new Criteria();
  	$c->add(UzytkownikPeer::LOGIN, $login);
  	$c->add(UzytkownikPeer::HASLO, sha1($haslo));
  	$u = UzytkownikPeer::doSelectOne($c);
	
if($u)
{
	echo "Zalogowano";
	$this->getUser()->setAuthenticated(true);
    $this->getUser()->addCredentials( $u->getRodzaj());
	
	
	
}else{
	
	return $this->getContext()->getController()->redirect('logowanie/loguj');
}	
 
  
}
 

 
}


}
  
 


