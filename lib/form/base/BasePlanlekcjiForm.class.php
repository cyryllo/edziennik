<?php

/**
 * Planlekcji form base class.
 *
 * @method Planlekcji getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePlanlekcjiForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'semestr_id'      => new sfWidgetFormPropelChoice(array('model' => 'Semestr', 'add_empty' => false)),
      'klasa_id'        => new sfWidgetFormPropelChoice(array('model' => 'Klasy', 'add_empty' => false)),
      'nauczyciel_id'   => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'przedmiot_id'    => new sfWidgetFormPropelChoice(array('model' => 'Przedmiot', 'add_empty' => false)),
      'czasstart'       => new sfWidgetFormDate(),
      'czasstop'        => new sfWidgetFormDate(),
      'dzientygodnia'   => new sfWidgetFormInputText(),
      'godzinalekcyjna' => new sfWidgetFormInputText(),
      'grupa_id'        => new sfWidgetFormPropelChoice(array('model' => 'Grupy', 'add_empty' => true)),
      'obowiazkowa'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'semestr_id'      => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'klasa_id'        => new sfValidatorPropelChoice(array('model' => 'Klasy', 'column' => 'id')),
      'nauczyciel_id'   => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'przedmiot_id'    => new sfValidatorPropelChoice(array('model' => 'Przedmiot', 'column' => 'id')),
      'czasstart'       => new sfValidatorDate(array('required' => false)),
      'czasstop'        => new sfValidatorDate(array('required' => false)),
      'dzientygodnia'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'godzinalekcyjna' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'grupa_id'        => new sfValidatorPropelChoice(array('model' => 'Grupy', 'column' => 'id', 'required' => false)),
      'obowiazkowa'     => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('planlekcji[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Planlekcji';
  }


}
