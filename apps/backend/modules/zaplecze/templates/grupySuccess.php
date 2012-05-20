<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodajg') ?>"><img src="/images/dodaj.png" alt="Dodaj grupę" /></a>
	 <a href="<?php echo url_for('zaplecze/admin') ?>"><img src="/images/powrot.png" alt="Powrót" /></a>
	 <a href="<?php echo url_for('zaplecze/mkonto') ?>" title="Moje konto"><img src="/images/mkonto.png" alt="Moje konto" /></a>
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>"><img src="/images/wyloguj.png" alt="Wyloguj" /></a>
	 
 
</div>
<div>
	Grupy:<br />
	
	<?php
	$c = new Criteria();
	$grupy = GrupyPeer::doSelect($c);
	
	foreach ($grupy as $grupa) {
     echo $grupa->getPupil()." ".$grupa->getGrupa()."<br />";
		
}
	?>
	
	
	
</div>