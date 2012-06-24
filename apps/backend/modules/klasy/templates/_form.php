<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('klasy/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('klasy/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'klasy/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['poziom']->renderLabel() ?></th>
        <td>
          <?php echo $form['poziom']->renderError() ?>
          <?php echo $form['poziom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['znak']->renderLabel() ?></th>
        <td>
          <?php echo $form['znak']->renderError() ?>
          <?php echo $form['znak'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['opis']->renderLabel() ?></th>
        <td>
          <?php echo $form['opis']->renderError() ?>
          <?php echo $form['opis'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['wychowawca']->renderLabel() ?></th>
        <td>
          <?php echo $form['wychowawca']->renderError() ?>
          <?php echo $form['wychowawca'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['startsemestr']->renderLabel() ?></th>
        <td>
          <?php echo $form['startsemestr']->renderError() ?>
          <?php echo $form['startsemestr'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
