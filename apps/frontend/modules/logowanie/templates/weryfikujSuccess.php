<?php
$login= $sf_params->get('login');
$haslo= $sf_params->get('haslo');
$haslo=sha1($haslo);


 if ($login && $haslo) {
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
