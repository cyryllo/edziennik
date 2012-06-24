<?php

/**
 * dyrektor actions.
 *
 * @package    dziennik
 * @subpackage dyrektor
 * @author     Cyryl Sochacki
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dyrektorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndexd(sfWebRequest $request)
  {
    
  }
  public function executeWyloguj(sfWebRequest $request)
  {

    $this->getUser()->setAuthenticated(false);

    $this->getUser()->setAuthenticated(FALSE);
    
	return $this->redirect('/logowanie/loguj');
  }
  
}
