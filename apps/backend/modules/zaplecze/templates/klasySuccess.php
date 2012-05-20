<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodajk') ?>"><img src="/images/dodaj.png" alt="Dodaj klasę" /></a>
	 <a href="<?php echo url_for('zaplecze/admin') ?>"><img src="/images/powrot.png" alt="Powrót" /></a>
	 <a href="<?php echo url_for('zaplecze/mkonto') ?>" title="Moje konto"><img src="/images/mkonto.png" alt="Moje konto" /></a>
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>"><img src="/images/wyloguj.png" alt="Wyloguj" /></a>
	 
 
</div>
<div>
	Klasy:<br />
	
	<?php
	$c = new Criteria();
	$klasy = KlasyPeer::doSelect($c);
	
	foreach ($klasy as $klasa) {
     echo $klasa->getPoziom().$klasa->getZnak()." Wychowawca: ".$klasa->getWychowawca()."<br />";
		
}
	?>
	
	
</div>