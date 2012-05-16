<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodaju') ?>"><img src="/images/dodaj.png" alt="Dodaj użytkowika" /></a>
	 <a href="<?php echo url_for('zaplecze/admin') ?>"><img src="/images/powrot.png" alt="Powrót" /></a>
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>" title="Wyloguj się z dziennika"><img src="/images/wyloguj.png" alt="Wyloguj" /></a>
	 
 
</div>
<div>
	Lista uzytkowników:<br />
	<?php
	$c = new Criteria();
	$uzytkownicy = UzytkownikPeer::doSelect($c);
	
	foreach ($uzytkownicy as $ludzie) {
  echo $ludzie->getImie()." ".$ludzie->getNazwisko();
		
}
	?>
</div>
