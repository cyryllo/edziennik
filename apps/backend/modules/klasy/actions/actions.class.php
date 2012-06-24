<?php

/**
 * klasy actions.
 *
 * @package    dziennik
 * @subpackage klasy
 * @author     Cyryl Sochacki
 */
class klasyActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Klasys = KlasyPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new KlasyForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new KlasyForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Klasy = KlasyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Klasy does not exist (%s).', $request->getParameter('id')));
    $this->form = new KlasyForm($Klasy);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Klasy = KlasyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Klasy does not exist (%s).', $request->getParameter('id')));
    $this->form = new KlasyForm($Klasy);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Klasy = KlasyPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Klasy does not exist (%s).', $request->getParameter('id')));
    $Klasy->delete();

    $this->redirect('klasy/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Klasy = $form->save();

      $this->redirect('klasy/edit?id='.$Klasy->getId());
    }
  }
}
