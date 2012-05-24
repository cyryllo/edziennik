<?php
class DodajseForm extends BaseForm
{
  
  
  protected static $polowa = array('I' => 'I - semestr zimowy','II' =>'II - semestr letni');
  
  public function configure()
  {
    $this->setWidgets(array(
      'rok' => new sfWidgetFormInputText(array('label' => 'Rok')),
      'polowa'    => new sfWidgetFormSelect(array('choices' => self::$polowa), array('label' => 'semestr')),
      ));

  }
  
  
}