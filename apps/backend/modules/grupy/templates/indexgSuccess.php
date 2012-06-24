<h1>Grupys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Pupil</th>
      <th>Semestr</th>
      <th>Grupa</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Grupys as $Grupy): ?>
    <tr>
      <td><a href="<?php echo url_for('grupy/edit?id='.$Grupy->getId()) ?>"><?php echo $Grupy->getId() ?></a></td>
      <td><?php echo $Grupy->getPupil() ?></td>
      <td><?php echo $Grupy->getSemestrId() ?></td>
      <td><?php echo $Grupy->getGrupa() ?></td>
      <td><?php echo $Grupy->getInfo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('grupy/new') ?>">New</a>
