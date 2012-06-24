<h1>Tablicaocens List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nazwa</th>
      <th>Wartosc</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Tablicaocens as $Tablicaocen): ?>
    <tr>
      <td><a href="<?php echo url_for('tablicaocen/edit?id='.$Tablicaocen->getId()) ?>"><?php echo $Tablicaocen->getId() ?></a></td>
      <td><?php echo $Tablicaocen->getNazwa() ?></td>
      <td><?php echo $Tablicaocen->getWartosc() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tablicaocen/new') ?>">New</a>
