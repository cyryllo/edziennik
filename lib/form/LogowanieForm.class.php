<?php
class LogowanieForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login'    => new sfWidgetFormInputText(),
      'haslo'   => new sfWidgetFormInputText(),
      ));
    $this->widgetSchema->setLabels(array(
      'login'    => 'Login',
      'haslo'   => 'Hasło',
      ));
  }
}