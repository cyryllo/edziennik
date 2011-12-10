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
   
  
  if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('loguj'));
      if ($this->form->isValid())
      {
        $this->redirect('loguj/weryfikuj?'.http_build_query($this->form->getValues()));
      }
    }
  }
  
public function executeWeryfikuj($request)
{
  
  $this->forward404Unless($request->isMethod('post'));
  
  $params = array(
    'login'    => $request->getParameter('login'),
    'haslo'   => $request->getParameter('haslo'),
    
  );
 
  
}
 

 
 


}
  
 


