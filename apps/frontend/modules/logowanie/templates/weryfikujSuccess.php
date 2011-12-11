<?php
$login= $sf_params->get('login');
$haslo= $sf_params->get('haslo');
//$haslo=sha1($haslo);


 if ($login && $haslo) {
 	
$c = new Criteria();
$c->add(UzytkownikPeer::LOGIN, $login);
$c->add(UzytkownikPeer::HASLO, sha1($haslo));
$u = UzytkownikPeer::doSelectOne($c);
	
if($u)
{
	echo "zalogowano";
	$this->getUser()->setAuthenticated(true);
    $this->getUser()->addCredentials($u->getRodzaj());
	
	
	
	
}else{
	echo "Nie zalogowano";
	
}	
	
?>
<ul>
  <li>Login:    <?php echo $login ?></li>
  <li>Hasło:   <?php echo $haslo ?></li>
  
</ul>
 
<?php 	
	
 }else{
 echo	"Nie podałeś danych do logowania";
	
 }


?>
