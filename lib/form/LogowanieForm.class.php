<?php
class LogowanieForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login'    => new sfWidgetFormInputText(array('label' => 'Login'),array('size' => 14)),
      'haslo'   => new sfWidgetFormInputPassword(array('label' => 'Hasło'),array('size' => 14))
      ));

  }
  
  
}