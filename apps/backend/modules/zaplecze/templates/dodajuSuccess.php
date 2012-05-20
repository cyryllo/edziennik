<div id="menu">
	
	 <a href="<?php echo url_for('zaplecze/dodaju') ?>"><img src="/images/dodaj.png" alt="Dodaj użytkowika" /></a>
	 <a href="<?php echo url_for('zaplecze/admin') ?>"><img src="/images/powrot.png" alt="Powrót" /></a>
	 <a href="<?php echo url_for('zaplecze/mkonto') ?>" title="Moje konto"><img src="/images/mkonto.png" alt="Moje konto" /></a>
	 <a href="<?php echo url_for('zaplecze/wyloguj') ?>" title="Wyloguj się z dziennika"><img src="/images/wyloguj.png" alt="Wyloguj" /></a>
	 
 
</div>
<div>
<br />
<b>Dodawanie użytkownika.</b><br /><br />
<form action="<?php echo url_for('zaplecze/zapiszu') ?>" method="post">
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