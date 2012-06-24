<h1>Lista użytkowników</h1>

<table>
  <thead>
    <tr>
      <td>Id</td>
      <td>Imie</td>
      <td>Nazwisko</td>
      <td>Login</td>
      <td>Email</td>
      <td>Telefon</td>
      <td>Klasa</td>
      <td>Pesel</td>
      <td>Urodziny/a</td>
      <td>Ulica</td>
      <td>Nr</td>
      <td>Kod</td>
      <td>Panstwo</td>
      <td>Info</td>
      <td>R</td>
      <td>A</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Uzytkowniks as $Uzytkownik): ?>
    <tr>
      <td><a href="<?php echo url_for('uzytkownik/edit?id='.$Uzytkownik->getId()) ?>"><?php echo $Uzytkownik->getId() ?></a></td>
      <td><?php echo $Uzytkownik->getImie() ?></td>
      <td><?php echo $Uzytkownik->getNazwisko() ?></td>
      <td><?php echo $Uzytkownik->getLogin() ?></td>
      <td><?php echo $Uzytkownik->getEmail() ?></td>
      <td><?php echo $Uzytkownik->getTelefon() ?></td>
      <td><?php echo $Uzytkownik->getKlasaId() ?></td>
      <td><?php echo $Uzytkownik->getPesel() ?></td>
      <td><?php echo $Uzytkownik->getDataurodzin()." w ".$Uzytkownik->getMiejsceurodzin() ?></td>
      <td><?php echo $Uzytkownik->getUlica() ?></td>
      <td><?php echo $Uzytkownik->getNrdomu() ?></td>
      <td><?php echo $Uzytkownik->getKodpocztowy() ?></td>
      <td><?php echo $Uzytkownik->getPanstwo() ?></td>
      <td><?php echo $Uzytkownik->getInfo() ?></td>
      <td><?php echo $Uzytkownik->getRodzaj() ?></td>
      <td><?php echo $Uzytkownik->getAktywny() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('uzytkownik/new') ?>">Dodaj użytkownika</a>
