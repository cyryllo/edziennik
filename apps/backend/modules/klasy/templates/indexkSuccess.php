<h1>Klasys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Poziom</th>
      <th>Znak</th>
      <th>Opis</th>
      <th>Wychowawca</th>
      <th>Startsemestr</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Klasys as $Klasy): ?>
    <tr>
      <td><a href="<?php echo url_for('klasy/edit?id='.$Klasy->getId()) ?>"><?php echo $Klasy->getId() ?></a></td>
      <td><?php echo $Klasy->getPoziom() ?></td>
      <td><?php echo $Klasy->getZnak() ?></td>
      <td><?php echo $Klasy->getOpis() ?></td>
      <td><?php echo $Klasy->getWychowawca() ?></td>
      <td><?php echo $Klasy->getStartsemestr() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('klasy/new') ?>">New</a>
