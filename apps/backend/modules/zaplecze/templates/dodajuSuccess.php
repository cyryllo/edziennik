<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodaju') ?>">Dodaj użytkowika</a> |
	 <a href="<?php echo url_for('zaplecze/admin') ?>">Powrót</a> |.:.|
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>">Wyloguj</a>
	 
 
</div>
<div>
<br />
<b>Dodawanie użytkownika.</b><br /><br />
<form action="<?php echo url_for('zaplecze/zapiszuzytkowika') ?>" method="post">
 <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Dodaj"/>
      </td>
    </tr>
  </table>
</form>

</div>