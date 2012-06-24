<?php

/**
 * Obecnosci form base class.
 *
 * @method Obecnosci getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseObecnosciForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'pupil'           => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'lekcja_id'       => new sfWidgetFormPropelChoice(array('model' => 'Lekcje', 'add_empty' => false)),
      'rodzajobecnosci' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'           => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'lekcja_id'       => new sfValidatorPropelChoice(array('model' => 'Lekcje', 'column' => 'id')),
      'rodzajobecnosci' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('obecnosci[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Obecnosci';
  }


}
