<?php

/**
 * Lekcje form base class.
 *
 * @method Lekcje getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseLekcjeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'przedmiot_id'  => new sfWidgetFormPropelChoice(array('model' => 'Przedmiot', 'add_empty' => false)),
      'klasa_id'      => new sfWidgetFormPropelChoice(array('model' => 'Klasy', 'add_empty' => false)),
      'semestr_id'    => new sfWidgetFormPropelChoice(array('model' => 'Semestr', 'add_empty' => false)),
      'temat'         => new sfWidgetFormTextarea(),
      'datalekcji'    => new sfWidgetFormDateTime(),
      'nauczyciel_id' => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'przedmiot_id'  => new sfValidatorPropelChoice(array('model' => 'Przedmiot', 'column' => 'id')),
      'klasa_id'      => new sfValidatorPropelChoice(array('model' => 'Klasy', 'column' => 'id')),
      'semestr_id'    => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'temat'         => new sfValidatorString(array('required' => false)),
      'datalekcji'    => new sfValidatorDateTime(array('required' => false)),
      'nauczyciel_id' => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('lekcje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lekcje';
  }


}
