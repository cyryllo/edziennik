<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('planlekcji/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('planlekcji/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'planlekcji/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['semestr_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['semestr_id']->renderError() ?>
          <?php echo $form['semestr_id'] ?>
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
        <th><?php echo $form['nauczyciel_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['nauczyciel_id']->renderError() ?>
          <?php echo $form['nauczyciel_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['przedmiot_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['przedmiot_id']->renderError() ?>
          <?php echo $form['przedmiot_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['czasstart']->renderLabel() ?></th>
        <td>
          <?php echo $form['czasstart']->renderError() ?>
          <?php echo $form['czasstart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['czasstop']->renderLabel() ?></th>
        <td>
          <?php echo $form['czasstop']->renderError() ?>
          <?php echo $form['czasstop'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dzientygodnia']->renderLabel() ?></th>
        <td>
          <?php echo $form['dzientygodnia']->renderError() ?>
          <?php echo $form['dzientygodnia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['godzinalekcyjna']->renderLabel() ?></th>
        <td>
          <?php echo $form['godzinalekcyjna']->renderError() ?>
          <?php echo $form['godzinalekcyjna'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['grupa_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['grupa_id']->renderError() ?>
          <?php echo $form['grupa_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['obowiazkowa']->renderLabel() ?></th>
        <td>
          <?php echo $form['obowiazkowa']->renderError() ?>
          <?php echo $form['obowiazkowa'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
