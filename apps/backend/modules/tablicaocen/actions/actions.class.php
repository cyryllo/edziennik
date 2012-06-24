<?php

/**
 * tablicaocen actions.
 *
 * @package    dziennik
 * @subpackage tablicaocen
 * @author     Cyryl Sochacki
 */
class tablicaocenActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Tablicaocens = TablicaocenPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TablicaocenForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TablicaocenForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Tablicaocen = TablicaocenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tablicaocen does not exist (%s).', $request->getParameter('id')));
    $this->form = new TablicaocenForm($Tablicaocen);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Tablicaocen = TablicaocenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tablicaocen does not exist (%s).', $request->getParameter('id')));
    $this->form = new TablicaocenForm($Tablicaocen);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Tablicaocen = TablicaocenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tablicaocen does not exist (%s).', $request->getParameter('id')));
    $Tablicaocen->delete();

    $this->redirect('tablicaocen/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Tablicaocen = $form->save();

      $this->redirect('tablicaocen/edit?id='.$Tablicaocen->getId());
    }
  }
}
