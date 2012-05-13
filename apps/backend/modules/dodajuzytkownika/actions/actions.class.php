<?php

/**
 * dodajuzytkownika actions.
 *
 * @package    edziennik
 * @subpackage dodajuzytkownika
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dodajuzytkownikaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeDodajuzytkownika(sfWebRequest $request)
  {
	$this->form = new DodajuzytkownikaForm();
  }
}
