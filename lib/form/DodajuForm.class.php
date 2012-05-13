<?php
class DodajuForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'imie'    => new sfWidgetFormInputText(array('label' => 'Imię'),array('size' => 14)),
      'nazwisko'    => new sfWidgetFormInputText(array('label' => 'Nazwisko'),array('size' => 14)),
      'haslo'   => new sfWidgetFormInputPassword(array('label' => 'Hasło'),array('size' => 14))
      ));

  }
  
  
}