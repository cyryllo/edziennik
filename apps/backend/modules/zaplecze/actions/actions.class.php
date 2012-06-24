<?php

/**
 * zaplecze actions.
 *
 * @package    edziennik
 * @subpackage zaplecze
 * @author     Cyryl Sochacki
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class zapleczeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeUczen(sfWebRequest $request)
  {
    
  }
  
  public function executeRodzic(sfWebRequest $request)
  {
    
  }
  
  public function executeNuczyciel(sfWebRequest $request)
  {
    
  }
  
  public function executeSekretariat(sfWebRequest $request)
  {
    
  }
  
  public function executeAdmin(sfWebRequest $request)
  {
    
  }
  
  public function executeUsers(sfWebRequest $request)
  {
    
	
	
  }
  
	public function executeZapiszu(sfWebRequest $request)
  {
    //sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
  
	
	$zapiszludka = new Uzytkownik();
	//$zapiszludka->setId();
	$zapiszludka->setRodzaj($this->getRequestParameter('rodzaj'));
    $zapiszludka->setImie($this->getRequestParameter('imie'));
	$zapiszludka->setNazwisko($this->getRequestParameter('nazwisko'));
	$zapiszludka->setLogin($this->getRequestParameter('login'));
	$zapiszludka->setHaslo(sha1($this->getRequestParameter('haslo')));
	$zapiszludka->setEmail($this->getRequestParameter('email'));
	$zapiszludka->setTelefon($this->getRequestParameter('telefon'));
	$zapiszludka->setKlasaId($this->getRequestParameter('klasa'));
	$zapiszludka->setPesel($this->getRequestParameter('pesel'));
	$zapiszludka->setDataurodzin($this->getRequestParameter('dataur'));
	$zapiszludka->setMiejsceurodzin($this->getRequestParameter('urodzonyw'));
	$zapiszludka->setOjciec($this->getRequestParameter('tata'));
	$zapiszludka->setMatka($this->getRequestParameter('mama'));
	$zapiszludka->setUlica($this->getRequestParameter('ulica'));
	$zapiszludka->setNrdomu($this->getRequestParameter('nrdomu'));
	$zapiszludka->setKodpocztowy($this->getRequestParameter('kodpocztowy'));
	$zapiszludka->setPanstwo($this->getRequestParameter('panstwo'));
	$zapiszludka->setInfo($this->getRequestParameter('info'));
	$zapiszludka->setAktywny($this->getRequestParameter('status'));
	$zapiszludka->save();
	
  }
	
    
  public function executeWyloguj(sfWebRequest $request)
  {

    $this->getUser()->setAuthenticated(false);

    $this->getUser()->setAuthenticated(FALSE);
    
	return $this->redirect('/logowanie/loguj');
  }
  
  public function executeDodaju(sfWebRequest $request)
  {
	$this->form = new DodajuForm();
  }
  
  public function executeTablicaocen(sfWebRequest $request)
  {
	
  }
  public function executeDodajto(sfWebRequest $request)
  {
	$this->form = new DodajtoForm();
  }
  
  public function executeGrupy(sfWebRequest $request)
  {
	
  }
  
  public function executeKlasy(sfWebRequest $request)
  {
	
  }
  
  
  public function executePlanlekcji(sfWebRequest $request)
  {
	
  }
  public function executeDodajpl(sfWebRequest $request)
  {
	$this->form = new DodajplForm();
  }
  
  
  public function executeSemestry(sfWebRequest $request)
  {
	
  }
  public function executeDodajg(sfWebRequest $request)
  {
	$this->form = new DodajgForm();
	
  }
  
  public function executeDodajk(sfWebRequest $request)
  {
	$this->form = new DodajkForm();
  }
  
  public function executeMkonto(sfWebRequest $request)
  {
	
  }
  
  public function executeListaklas(sfWebRequest $request)
  {
	// pobieranie z bazy listy klas
  }
  
  public function executeRodzice(sfWebRequest $request)
  {
	// pobieranie z bazy listy rodziców
  }
  
  
}

