<?php
class LogowanieForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login'    => new sfWidgetFormInputText(),
      'haslo'   => new sfWidgetFormInputPassword(),
      ));
    $this->widgetSchema->setLabels(array(
      'login'    => 'Login',
      'haslo'   => 'Hasło',
      ));
  
  $this->setValidators(array(
      'login'    => new sfValidatorString(array('required' => true)),
      'haslo'    => new sfValidatorString(array('required' => true)),
    ));
  }
  
  
}