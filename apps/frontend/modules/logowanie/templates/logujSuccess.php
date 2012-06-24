<div id="kontener-logowanie">
<div id="logowanie"><h2>Logowanie</h2>
<center>
	<p style="color: red; font-size: 10px;">
	<?php
	$blad = $_GET['er'];
	if($blad == "blad"){
		echo "Nieprawidłowy login lub hasło!";
	}
	?></p>
<form action="<?php echo url_for('logowanie/weryfikuj') ?>" method="post">
 <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Zaloguj"/>
      </td>
    </tr>
  </table>
</form>
</center> 
<br />
</div>
</div>