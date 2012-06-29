<?php

/**
 * semestr actions.
 *
 * @package    dziennik
 * @subpackage semestr
 * @author     Cyryl Sochacki
 */
class semestrActions extends sfActions
{
  public function executeIndexse(sfWebRequest $request)
  {
    $this->Semestrs = SemestrPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SemestrForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SemestrForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Semestr = SemestrPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Semestr does not exist (%s).', $request->getParameter('id')));
    $this->form = new SemestrForm($Semestr);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Semestr = SemestrPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Semestr does not exist (%s).', $request->getParameter('id')));
    $this->form = new SemestrForm($Semestr);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Semestr = SemestrPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Semestr does not exist (%s).', $request->getParameter('id')));
    $Semestr->delete();

    $this->redirect('semestr/indexse');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Semestr = $form->save();

       $this->redirect('semestr/indexse');
      //$this->redirect('semestr/edit?id='.$Semestr->getId());
    }
  }
}
