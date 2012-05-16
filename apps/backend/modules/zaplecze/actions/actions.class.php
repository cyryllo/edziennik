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
  
	$rodzaj= $this->getRequestParameter('rodzaj');
	$imie= $this->getRequestParameter('imie');
  	$haslo= $this->getRequestParameter('haslo');
	$email= $this->getRequestParameter('email');
	$telefon= $this->getRequestParameter('telefon');
	$klasa= $this->getRequestParameter('klasa');
	$pesel= $this->getRequestParameter('pesel');
	$data_ur= $this->getRequestParameter('data');
	$miejsceurodzenia= $this->getRequestParameter('miejsceurodzenia');
	$ojciec= $this->getRequestParameter('tata');
	$mama= $this->getRequestParameter('mama');
	$ulica= $this->getRequestParameter('ulica');
	$nrdomu= $this->getRequestParameter('nrdomu');
	$kod= $this->getRequestParameter('kodpocztowy');
	$panstwo= $this->getRequestParameter('panstwo');
	$info= $this->getRequestParameter('info');
	$status= $this->getRequestParameter('status');
	
	$zapiszludka = new Zapiszludka();
	$zapiszludka->setRodzaj($rodzaj);
    $zapiszludka->setImie($imie);
	$zapiszludka->setNazwisko($nazwisko);
	$zapiszludka->setHaslo($haslo);
	$zapiszludka->setEmail($email);
	$zapiszludka->setTelefon($telefon);
	$zapiszludka->setKlasaId($klasa);
	$zapiszludka->setPesel($pesel);
	$zapiszludka->setDataurodzin($data_ur);
	$zapiszludka->setMiejsceurodzin($miejsceurodzenia);
	$zapiszludka->setOjciec($ojciec);
	$zapiszludka->setMatka($mama);
	$zapiszludka->setUlica($ulica);
	$zapiszludka->setDataurodzin($data);
	$zapiszludka->setNrdomu($nrdomu);
	$zapiszludka->setKodpocztowy($kod);
	$zapiszludka->setPanstwo($panstwo);
	$zapiszludka->setInfo($info);
	$zapiszludka->setAktywny($status);
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
  
  
}
