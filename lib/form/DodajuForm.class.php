<?php
class DodajuForm extends BaseForm
{
  protected static $rodzaje = array('U' => 'Uczeń', 'R' => 'Rodzic', 'N' => 'Nauczyciel', 'S' => 'Sekretarka', 'D' => 'Dyrektor', 'A' => 'Administrator');
  protected static $narod = array('Polska' => 'Polska', 'Niemcy' => 'Niemcy', 'Francja' => 'Francja', 'Czechy' => 'Czechy', 'Szwecja' => 'Szwecja');
  protected static $yon = array('1' => 'Tak', '0' => 'Nie');
  protected static $klasy = array('0' => 'Brak', '1' => '1E');
  public function configure()
  {
  	$lata = range(date('Y')-60, date('Y'));
    $this->setWidgets(array(
      'rodzaj' => new sfWidgetFormSelect(array('choices' => self::$rodzaje), array('label' => 'Rodzaj')),
      'imie'    => new sfWidgetFormInputText(array('label' => 'Imię'),array('size' => 14)),
      'nazwisko'    => new sfWidgetFormInputText(array('label' => 'Nazwisko'),array('size' => 14)),
      'haslo'   => new sfWidgetFormInputPassword(array('label' => 'Hasło'),array('size' => 14)),
      'email'    => new sfWidgetFormInputText(array('label' => 'E-mail'),array('size' => 14)),
      'telefon'    => new sfWidgetFormInputText(array('label' => 'Telefon'),array('size' => 14)),
      'klasa'	=>	new sfWidgetFormSelect(array('choices' => self::$klasy, 'label' => 'Klasa'), array()),
      'pesel'    => new sfWidgetFormInputText(array('label' => 'Pesel'),array('size' => 14)),
      'data'	=> new sfWidgetFormDate(array('format' => '%year% - %month% - %day%','years' => array_combine($lata, $lata), 'label' => 'Data urodzenia')),
      'matka'    => new sfWidgetFormInputText(array('label' => 'Mama'),array('size' => 14)),
      'tata'    => new sfWidgetFormInputText(array('label' => 'Tata'),array('size' => 14)),
      'miejsceurodzenia'    => new sfWidgetFormInputText(array('label' => 'Miejsce urodzenia'),array('size' => 14)),
      'ulica'    => new sfWidgetFormInputText(array('label' => 'Ulica'),array('size' => 14)),
      'nrdomu'    => new sfWidgetFormInputText(array('label' => 'Nr domu'),array('size' => 14)),
      'kodpocztowy'    => new sfWidgetFormInputText(array('label' => 'Kod pocztowy'),array('size' => 6)),
      'panstwo'   => new sfWidgetFormSelect(array('choices' => self::$narod, 'label' => 'Państwo')),
      'info'	=>	new sfWidgetFormTextarea(array('label' => 'Dodatkowe informacje')),
      'status'	=>	new sfWidgetFormSelect(array('choices' => self::$yon, 'label' => 'Aktywny'), array()),
      ));

  }
  
  
}