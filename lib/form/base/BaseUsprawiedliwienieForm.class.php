<?php

/**
 * Usprawiedliwienie form base class.
 *
 * @method Usprawiedliwienie getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseUsprawiedliwienieForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'obecnosci_id'  => new sfWidgetFormPropelChoice(array('model' => 'Obecnosci', 'add_empty' => true)),
      'uzytkownik_id' => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'tresc'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'obecnosci_id'  => new sfValidatorPropelChoice(array('model' => 'Obecnosci', 'column' => 'id', 'required' => false)),
      'uzytkownik_id' => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'tresc'         => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usprawiedliwienie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usprawiedliwienie';
  }


}
