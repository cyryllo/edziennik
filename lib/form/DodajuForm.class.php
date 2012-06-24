<?php
class DodajuForm extends BaseForm
{
  protected static $rodzaje = array('u' => 'Uczeń', 'r' => 'Rodzic', 'n' => 'Nauczyciel', 's' => 'Sekretarka', 'a' => 'Administrator');
  protected static $yon = array('1' => 'Tak', '0' => 'Nie');
  protected static $klasy = array('0' => 'Brak', '1' => '1E');
  protected static $rodzice = array('0' => 'Brak');
  
  public function configure()
  {
  	$lata = range(date('Y')-60, date('Y'));
    $this->setWidgets(array(
      'rodzaj' => new sfWidgetFormSelect(array('choices' => self::$rodzaje), array('label' => 'Rodzaj')),
      'imie'    => new sfWidgetFormInputText(array('label' => 'Imię'),array('size' => 14)),
      'nazwisko'    => new sfWidgetFormInputText(array('label' => 'Nazwisko'),array('size' => 14)),
      'login'    => new sfWidgetFormInputText(array('label' => 'Login'),array('size' => 14)),
      'haslo'   => new sfWidgetFormInputPassword(array('label' => 'Hasło'),array('size' => 14)),
      'email'    => new sfWidgetFormInputText(array('label' => 'E-mail'),array('size' => 14)),
      'telefon'    => new sfWidgetFormInputText(array('label' => 'Telefon'),array('size' => 14)),
      'klasa'	=>	new sfWidgetFormSelect(array('choices' => self::$klasy, 'label' => 'Klasa')),
      'pesel'    => new sfWidgetFormInputText(array('label' => 'Pesel'),array('size' => 14)),
      'dataur'	=> new sfWidgetFormI18nDate(array('format' => '%day%  %month%  %year%', 'culture' => 'pl', 'years' => array_combine($lata, $lata), 'label' => 'Data urodzenia')),
      'urodzonyw' => new sfWidgetFormInputText(array('label' => 'Miejsce urodzenia'),array('size' => 14)),
      'matka'  =>  new sfWidgetFormSelect(array('choices' => self::$rodzice), array('label' => 'Mama')),
      'tata'    =>  new sfWidgetFormSelect(array('choices' => self::$rodzice), array('label' => 'Tata')),
      'ulica'    => new sfWidgetFormInputText(array('label' => 'Ulica'),array('size' => 14)),
      'nrdomu'    => new sfWidgetFormInputText(array('label' => 'Nr domu'),array('size' => 14)),
      'kodpocztowy'    => new sfWidgetFormInputText(array('label' => 'Kod pocztowy'),array('size' => 6)),
      'panstwo'   => new sfWidgetFormI18nChoiceCountry(array('culture' => 'pl','add_empty' => true,'default' => 'PL', 'label' => 'Państwo')),
      'info'	=>	new sfWidgetFormTextarea(array('label' => 'Dodatkowe informacje')),
      'status'	=>	new sfWidgetFormSelect(array('choices' => self::$yon, 'label' => 'Aktywny'), array()),
      ));

  }
  
  
}