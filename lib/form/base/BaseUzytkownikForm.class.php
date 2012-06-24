<?php

/**
 * Uzytkownik form base class.
 *
 * @method Uzytkownik getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseUzytkownikForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'rodzaj'         => new sfWidgetFormInputText(),
      'imie'           => new sfWidgetFormInputText(),
      'nazwisko'       => new sfWidgetFormInputText(),
      'login'          => new sfWidgetFormInputText(),
      'haslo'          => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'telefon'        => new sfWidgetFormInputText(),
      'klasa_id'       => new sfWidgetFormInputText(),
      'pesel'          => new sfWidgetFormInputText(),
      'dataurodzin'    => new sfWidgetFormDate(),
      'miejsceurodzin' => new sfWidgetFormInputText(),
      'ojciec'         => new sfWidgetFormInputText(),
      'matka'          => new sfWidgetFormInputText(),
      'ulica'          => new sfWidgetFormInputText(),
      'nrdomu'         => new sfWidgetFormInputText(),
      'kodpocztowy'    => new sfWidgetFormInputText(),
      'panstwo'        => new sfWidgetFormInputText(),
      'info'           => new sfWidgetFormTextarea(),
      'aktywny'        => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'rodzaj'         => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'imie'           => new sfValidatorString(array('required' => false)),
      'nazwisko'       => new sfValidatorString(array('required' => false)),
      'login'          => new sfValidatorString(),
      'haslo'          => new sfValidatorString(),
      'email'          => new sfValidatorString(array('required' => false)),
      'telefon'        => new sfValidatorString(array('required' => false)),
      'klasa_id'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'pesel'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'dataurodzin'    => new sfValidatorDate(array('required' => false)),
      'miejsceurodzin' => new sfValidatorString(array('required' => false)),
      'ojciec'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'matka'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'ulica'          => new sfValidatorString(array('required' => false)),
      'nrdomu'         => new sfValidatorString(array('required' => false)),
      'kodpocztowy'    => new sfValidatorString(array('required' => false)),
      'panstwo'        => new sfValidatorString(array('required' => false)),
      'info'           => new sfValidatorString(array('required' => false)),
      'aktywny'        => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('uzytkownik[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Uzytkownik';
  }


}
