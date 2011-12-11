<?php
class LogowanieForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login'    => new sfWidgetFormInputText(array('label' => 'Login')),
      'haslo'   => new sfWidgetFormInputPassword(array('label' => 'Hasło'))
      ));

  }
  
  
}