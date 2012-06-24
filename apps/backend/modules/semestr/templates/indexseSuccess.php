<h1>Semestrs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Rok</th>
      <th>Polowa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Semestrs as $Semestr): ?>
    <tr>
      <td><a href="<?php echo url_for('semestr/edit?id='.$Semestr->getId()) ?>"><?php echo $Semestr->getId() ?></a></td>
      <td><?php echo $Semestr->getRok() ?></td>
      <td><?php echo $Semestr->getPolowa() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('semestr/new') ?>">New</a>
