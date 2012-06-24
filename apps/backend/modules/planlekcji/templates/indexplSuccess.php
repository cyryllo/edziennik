<h1>Planlekcjis List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Semestr</th>
      <th>Klasa</th>
      <th>Nauczyciel</th>
      <th>Przedmiot</th>
      <th>Czasstart</th>
      <th>Czasstop</th>
      <th>Dzientygodnia</th>
      <th>Godzinalekcyjna</th>
      <th>Grupa</th>
      <th>Obowiazkowa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Planlekcjis as $Planlekcji): ?>
    <tr>
      <td><a href="<?php echo url_for('planlekcji/edit?id='.$Planlekcji->getId()) ?>"><?php echo $Planlekcji->getId() ?></a></td>
      <td><?php echo $Planlekcji->getSemestrId() ?></td>
      <td><?php echo $Planlekcji->getKlasaId() ?></td>
      <td><?php echo $Planlekcji->getNauczycielId() ?></td>
      <td><?php echo $Planlekcji->getPrzedmiotId() ?></td>
      <td><?php echo $Planlekcji->getCzasstart() ?></td>
      <td><?php echo $Planlekcji->getCzasstop() ?></td>
      <td><?php echo $Planlekcji->getDzientygodnia() ?></td>
      <td><?php echo $Planlekcji->getGodzinalekcyjna() ?></td>
      <td><?php echo $Planlekcji->getGrupaId() ?></td>
      <td><?php echo $Planlekcji->getObowiazkowa() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('planlekcji/new') ?>">New</a>
