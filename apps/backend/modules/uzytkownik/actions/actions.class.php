<?php

/**
 * uzytkownik actions.
 *
 * @package    dziennik
 * @subpackage uzytkownik
 * @author     Cyryl Sochacki
 */
class uzytkownikActions extends sfActions
{
  public function executeIndexus(sfWebRequest $request)
  {
    $this->Uzytkowniks = UzytkownikPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UzytkownikForm();
  }
	
   public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UzytkownikForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Uzytkownik = UzytkownikPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Uzytkownik does not exist (%s).', $request->getParameter('id')));
    $this->form = new UzytkownikForm($Uzytkownik);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Uzytkownik = UzytkownikPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Uzytkownik does not exist (%s).', $request->getParameter('id')));
    $this->form = new UzytkownikForm($Uzytkownik);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Uzytkownik = UzytkownikPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Uzytkownik does not exist (%s).', $request->getParameter('id')));
    $Uzytkownik->delete();

    $this->redirect('uzytkownik/indexus');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Uzytkownik = $form->save();

	  $this->redirect('uzytkownik/indexus');
      //$this->redirect('uzytkownik/edit?id='.$Uzytkownik->getId());
    }
  }
}
