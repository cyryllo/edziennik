<h1>Przedmiots List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nazwa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Przedmiots as $Przedmiot): ?>
    <tr>
      <td><a href="<?php echo url_for('przedmiot/edit?id='.$Przedmiot->getId()) ?>"><?php echo $Przedmiot->getId() ?></a></td>
      <td><?php echo $Przedmiot->getNazwa() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('przedmiot/new') ?>">New</a>
