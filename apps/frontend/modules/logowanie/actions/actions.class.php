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
  public function executeLogowanie(sfWebRequest $request)
  {
      $this->form = new LogowanieForm();
  } 
  
  
public function executeSubmit(sfWebRequest $request)
{
  
  $this->forward404Unless($request->isMethod('post'));
  
  $params = array(
    'login'    => $request->getParameter('login'),
    'haslo'   => $request->getParameter('haslo'),
    
  );
 
  $this->redirect('logowanie/sprawdz?'.http_build_query($params));
}
 
public function executeSprawdz()
{
} 
 
 


}
  
 


