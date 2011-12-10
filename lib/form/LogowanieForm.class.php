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
      'login' => new sfValidatorString(array('required' => true),  array('required' => 'Musisz podać login')),
      'haslo' => new sfValidatorString(array('min_length' => 1), array('required' => 'Podaj haslo')),
    ));
  }
  
  
}