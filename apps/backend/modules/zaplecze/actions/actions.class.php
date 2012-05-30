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
  
  
  //-----------------------------------INDEX NIE UŻYWANY ----------------------------------
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  //-----------------------------------UCZEŃ ----------------------------------
  public function executeUczen(sfWebRequest $request)
  {
    
  }
  //-----------------------------------RODZIC ----------------------------------
  public function executeRodzic(sfWebRequest $request)
  {
    
  }
  //-----------------------------------NAUCZYCIEL ----------------------------------
  public function executeNauczyciel(sfWebRequest $request)
  {
    
  }
  //-----------------------------------SEKRETARIAT ----------------------------------
  public function executeSekretariat(sfWebRequest $request)
  {
    
  }
  
  //-----------------------------------ADMIN ----------------------------------
  public function executeAdmin(sfWebRequest $request)
  {
    
  }
  //===========================================================================================
  
  
  
  //-----------------------------------UŻYTKOWNICY ----------------------------------
  public function executeUsers(sfWebRequest $request)
  {
   
  }
  
  
  public function executeDodaju(sfWebRequest $request)
  {
	$this->form = new DodajuForm();
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
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do listy userów z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/users');
  }


  public function executeRodzice(sfWebRequest $request)
  {
	// pobieranie z bazy listy rodziców
  }
  

//-----------------------------------TABLICE OCEN ----------------------------------	
  public function executeTablicaocen(sfWebRequest $request)
  {
	
  }
  public function executeDodajto(sfWebRequest $request)
  {
	$this->form = new DodajtoForm();
  }
  
  public function executeZapiszto(sfWebRequest $request)
  {
  	
	//sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
	
	$ocena = new Tablicaocen();
	$ocena->setNazwa($this->getRequestParameter('nazwa'));
    $ocena->setWartosc($this->getRequestParameter('wartosc'));
	$ocena->save();
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do tablicy ocen z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/tablicaocen');
  }
  
  
  //-----------------------------------GRUPY ----------------------------------
  public function executeGrupy(sfWebRequest $request)
  {
	
  }
  
  public function executeDodajg(sfWebRequest $request)
  {
	$this->form = new DodajgForm();
  }
  
  public function executeZapiszg(sfWebRequest $request)
  {
  	
	//sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
	
  	$grupa = new Grupy();
	$grupa->setPupil($this->getRequestParameter('uczen'));
	$grupa->setSemestrId($this->getRequestParameter('semestr'));
	$grupa->setGrupa($this->getRequestParameter('grupa'));
	$grupa->setInfo($this->getRequestParameter('info'));
	$grupa->save();
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do listy grup z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/grupy');
	
  }
  
  
  //-----------------------------------KLASY ----------------------------------
  public function executeKlasy(sfWebRequest $request)
  {
	
  }
  
  public function executeDodajk(sfWebRequest $request)
  {
	$this->form = new DodajkForm();
  }
  
  public function executeZapiszk(sfWebRequest $request)
  {
  	//sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
	
  	$klasa = new Klasy();
	$klasa->setPoziom($this->getRequestParameter('poziom'));
	$klasa->setZnak($this->getRequestParameter('znak'));
	$klasa->setOpis($this->getRequestParameter('opis'));
	$klasa->setWychowawca($this->getRequestParameter('wychowawca'));
	$klasa->setStartsemestr($this->getRequestParameter('rocznik'));
	$klasa->save();
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do listy klas z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/klasy');
  }
  
  public function executeListaklas(sfWebRequest $request)
  {
	// pobieranie z bazy listy klas
  }
  
  
  //-----------------------------------PLAN LEKCJI ----------------------------------
  public function executePlanlekcji(sfWebRequest $request)
  {
	
  }
  
  public function executeDodajpl(sfWebRequest $request)
  {
	$this->form = new DodajplForm();
  }
  
  public function executeZapiszpl(sfWebRequest $request)
  {
  	//sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
	
	$plan = new Planlekcji();
	$plan->setSemestrId($this->getRequestParameter('semestr'));
	$plan->setKlasaId($this->getRequestParameter('klasa'));
	$plan->setNauczycielId($this->getRequestParameter('nauczyciel'));
	$plan->setPrzedmiotId($this->getRequestParameter('przedmiot'));
	$plan->setCzasstart($this->getRequestParameter('czas_start'));
	$plan->setCzasstop($this->getRequestParameter('czas_stop'));
	$plan->setDzientygodnia($this->getRequestParameter('dzien_tygodnia'));
	$plan->setGodzinalekcyjna($this->getRequestParameter('godzina_lekcyjna'));
	$plan->setGrupaId($this->getRequestParameter('grupa'));
	$plan->setObowiazkowa($this->getRequestParameter('obowiazkowa'));
	$plan->save();
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do planów lekcji z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/planlekcji');
  }
  
  
  
  //-----------------------------------SEMESTRY ----------------------------------
  public function executeSemestry(sfWebRequest $request)
  {
	
  }
  
  public function executeDodajse(sfWebRequest $request)
  {
	$this->form = new DodajseForm();
  }
  public function executeZapiszse(sfWebRequest $request)
  {
	//sprawdzenie czy przypadkiem użytkownik nie próbuje swoich danych w adresie przesłać
	$this->forward404Unless($request->isMethod('post'));
	
	$semestr = new Semestr();
	$semestr->setRok($this->getRequestParameter('rok'));
	$semestr->setPolowa($this->getRequestParameter('polowa'));
	$semestr->save();
	
	//nalezy dodać sprawdzenie czy zapytanie sie udało w przeciwnym razie ma wyrzućić błąd z info o nieudanym dodaniu i wrócic do formularza
	//jesli wszystko jet ok to przechodzi do listy semestrów z info o poprawnym dodaniu
	return $this->getContext()->getController()->redirect('/backend.php/zaplecze/semestry');
  }
  
  
  //-----------------------------------MOJE KONTO ----------------------------------
  public function executeMkonto(sfWebRequest $request)
  {
  		
  }
  
  
  
  
  
  //-----------------------------------WYLOGUJ ---------------------------------- 
  public function executeWyloguj(sfWebRequest $request)
  {

    $this->getUser()->setAuthenticated(false);

    $this->getUser()->setAuthenticated(FALSE);
    
	return $this->redirect('/logowanie/loguj');
  }
  
  
}

