<div id="logowanie"><h2>Logowanie</h2>
<center>
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