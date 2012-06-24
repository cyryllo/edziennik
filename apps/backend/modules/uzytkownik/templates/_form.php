<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('uzytkownik/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('uzytkownik/indexus') ?>">Wróć do listy</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'uzytkownik/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Czy napewno usunąć?')) ?>
          <?php endif; ?>
          <input type="submit" value="Zapisz" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['rodzaj']->renderLabel() ?></th>
        <td>
          <?php echo $form['rodzaj']->renderError() ?>
          <?php echo $form['rodzaj'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['imie']->renderLabel() ?></th>
        <td>
          <?php echo $form['imie']->renderError() ?>
          <?php echo $form['imie'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nazwisko']->renderLabel() ?></th>
        <td>
          <?php echo $form['nazwisko']->renderError() ?>
          <?php echo $form['nazwisko'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['login']->renderLabel() ?></th>
        <td>
          <?php echo $form['login']->renderError() ?>
          <?php echo $form['login'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['haslo']->renderLabel() ?></th>
        <td>
          <?php echo $form['haslo']->renderError() ?>
          <?php echo $form['haslo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefon']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefon']->renderError() ?>
          <?php echo $form['telefon'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['klasa_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['klasa_id']->renderError() ?>
          <?php echo $form['klasa_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['pesel']->renderLabel() ?></th>
        <td>
          <?php echo $form['pesel']->renderError() ?>
          <?php echo $form['pesel'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dataurodzin']->renderLabel() ?></th>
        <td>
          <?php echo $form['dataurodzin']->renderError() ?>
          <?php echo $form['dataurodzin'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['miejsceurodzin']->renderLabel() ?></th>
        <td>
          <?php echo $form['miejsceurodzin']->renderError() ?>
          <?php echo $form['miejsceurodzin'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ojciec']->renderLabel() ?></th>
        <td>
          <?php echo $form['ojciec']->renderError() ?>
          <?php echo $form['ojciec'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['matka']->renderLabel() ?></th>
        <td>
          <?php echo $form['matka']->renderError() ?>
          <?php echo $form['matka'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ulica']->renderLabel() ?></th>
        <td>
          <?php echo $form['ulica']->renderError() ?>
          <?php echo $form['ulica'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nrdomu']->renderLabel() ?></th>
        <td>
          <?php echo $form['nrdomu']->renderError() ?>
          <?php echo $form['nrdomu'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['kodpocztowy']->renderLabel() ?></th>
        <td>
          <?php echo $form['kodpocztowy']->renderError() ?>
          <?php echo $form['kodpocztowy'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['panstwo']->renderLabel() ?></th>
        <td>
          <?php echo $form['panstwo']->renderError() ?>
          <?php echo $form['panstwo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['info']->renderLabel() ?></th>
        <td>
          <?php echo $form['info']->renderError() ?>
          <?php echo $form['info'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['aktywny']->renderLabel() ?></th>
        <td>
          <?php echo $form['aktywny']->renderError() ?>
          <?php echo $form['aktywny'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
