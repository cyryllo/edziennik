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
	protected static $rodzaje = array('u' => 'Uczeń', 'r' => 'Rodzic', 'n' => 'Nauczyciel', 's' => 'Sekretarka', 'a' => 'Administrator');
	protected static $klasy = array('0' => 'Brak', '1' => '1E');
	
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'rodzaj'         => new sfWidgetFormSelect(array('choices' => self::$rodzaje), array('label' => 'Rodzaj')),
      'imie'           => new sfWidgetFormInputText(),
      'nazwisko'       => new sfWidgetFormInputText(),
      'login'          => new sfWidgetFormInputText(),
      'haslo'          => new sfWidgetFormInputPassword(array('label' => 'Hasło'),array('size' => 14)),
      'email'          => new sfWidgetFormInputText(),
      'telefon'        => new sfWidgetFormInputText(),
      'klasa_id'       => new sfWidgetFormSelect(array('choices' => self::$klasy, 'label' => 'Klasa')),
      'pesel'          => new sfWidgetFormInputText(),
      'dataurodzin'    => new sfWidgetFormDate(),
      'miejsceurodzin' => new sfWidgetFormInputText(),
      'ojciec'         => new sfWidgetFormInputText(),
      'matka'          => new sfWidgetFormInputText(),
      'ulica'          => new sfWidgetFormInputText(),
      'nrdomu'         => new sfWidgetFormInputText(),
      'kodpocztowy'    => new sfWidgetFormInputText(),
      'panstwo'        => new sfWidgetFormI18nChoiceCountry(array('culture' => 'pl','add_empty' => true,'default' => 'PL', 'label' => 'Państwo')),
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
      'pesel'          => new sfValidatorInteger(array('min' => 10000000000, 'max' => 99999999999, 'required' => false)),
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
