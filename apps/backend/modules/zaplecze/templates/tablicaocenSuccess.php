<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodajto') ?>"><img src="/images/dodaj.png" alt="Dodaj użytkowika" /></a>
	 <a href="<?php echo url_for('zaplecze/admin') ?>"><img src="/images/powrot.png" alt="Powrót" /></a>
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>"><img src="/images/wyloguj.png" alt="Wyloguj" /></a>
	 
 
</div>
<div>
	Tablica ocen:<br />
	
	<?php
	$c = new Criteria();
	$tablica = TablicaocenPeer::doSelect($c);
	
	foreach ($tablica as $tabl) {
     echo $tabl->getNazwa()." ".$tabl->getWartosc()."<br />";
		
}
	?>
	
</div>