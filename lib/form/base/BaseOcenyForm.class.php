<?php

/**
 * Oceny form base class.
 *
 * @method Oceny getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseOcenyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'pupil'         => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'ocena_id'      => new sfWidgetFormPropelChoice(array('model' => 'Tablicaocen', 'add_empty' => false)),
      'waga'          => new sfWidgetFormInputText(),
      'nauczyciel_id' => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'przedmiot_id'  => new sfWidgetFormPropelChoice(array('model' => 'Przedmiot', 'add_empty' => false)),
      'semestr_id'    => new sfWidgetFormPropelChoice(array('model' => 'Semestr', 'add_empty' => false)),
      'dataoceny'     => new sfWidgetFormDate(),
      'info'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'         => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'ocena_id'      => new sfValidatorPropelChoice(array('model' => 'Tablicaocen', 'column' => 'id')),
      'waga'          => new sfValidatorString(array('max_length' => 255)),
      'nauczyciel_id' => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'przedmiot_id'  => new sfValidatorPropelChoice(array('model' => 'Przedmiot', 'column' => 'id')),
      'semestr_id'    => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'dataoceny'     => new sfValidatorDate(array('required' => false)),
      'info'          => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('oceny[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Oceny';
  }


}
