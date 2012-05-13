<?php

/**
 * zaplecze actions.
 *
 * @package    edziennik
 * @subpackage zaplecze
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class zapleczeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeUczen(sfWebRequest $request)
  {
    
  }
  
  public function executeRodzic(sfWebRequest $request)
  {
    
  }
  
  public function executeNuczyciel(sfWebRequest $request)
  {
    
  }
  
  public function executeSekretariat(sfWebRequest $request)
  {
    
  }
  
  public function executeAdmin(sfWebRequest $request)
  {
    
  }
  
  public function executeUsers(sfWebRequest $request)
  {
    
  }
  
  public function executeDodajusera(sfWebRequest $request)
  {
    
  }
  
  
  public function executeWyloguj(sfWebRequest $request)
  {

    $this->getUser()->setAuthenticated(false);

    $this->getUser()->setAuthenticated(FALSE);
    
	return $this->redirect('/logowanie/loguj');
  }
  
}
