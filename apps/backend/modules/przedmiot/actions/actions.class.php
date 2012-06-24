<?php

/**
 * przedmiot actions.
 *
 * @package    dziennik
 * @subpackage przedmiot
 * @author     Cyryl Sochacki
 */
class przedmiotActions extends sfActions
{
  public function executeIndexp(sfWebRequest $request)
  {
    $this->Przedmiots = PrzedmiotPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PrzedmiotForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PrzedmiotForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Przedmiot = PrzedmiotPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Przedmiot does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrzedmiotForm($Przedmiot);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Przedmiot = PrzedmiotPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Przedmiot does not exist (%s).', $request->getParameter('id')));
    $this->form = new PrzedmiotForm($Przedmiot);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Przedmiot = PrzedmiotPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Przedmiot does not exist (%s).', $request->getParameter('id')));
    $Przedmiot->delete();

    $this->redirect('przedmiot/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Przedmiot = $form->save();

      $this->redirect('przedmiot/edit?id='.$Przedmiot->getId());
    }
  }
}
