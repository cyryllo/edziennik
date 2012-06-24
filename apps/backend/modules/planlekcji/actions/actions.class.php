<?php

/**
 * planlekcji actions.
 *
 * @package    dziennik
 * @subpackage planlekcji
 * @author     Cyryl Sochacki
 */
class planlekcjiActions extends sfActions
{
  public function executeIndexpl(sfWebRequest $request)
  {
    $this->Planlekcjis = PlanlekcjiPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PlanlekcjiForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PlanlekcjiForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Planlekcji = PlanlekcjiPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Planlekcji does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlanlekcjiForm($Planlekcji);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Planlekcji = PlanlekcjiPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Planlekcji does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlanlekcjiForm($Planlekcji);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Planlekcji = PlanlekcjiPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Planlekcji does not exist (%s).', $request->getParameter('id')));
    $Planlekcji->delete();

    $this->redirect('planlekcji/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Planlekcji = $form->save();

      $this->redirect('planlekcji/edit?id='.$Planlekcji->getId());
    }
  }
}
