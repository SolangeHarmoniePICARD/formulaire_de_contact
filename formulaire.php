<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Formulaire de contact</title>
  <meta charset="UTF-8">
  <meta name="author" content="Solange Harmonie PICARD">
  <meta name="description" content="Un formulaire de contact.">
  <meta name="keywords" content="formulaire, contact">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
  <?php if(array_key_exists('errors', $_SESSION)): ?>
    <div class="errors">
      <?= implode('<br>', $_SESSION['errors']); ?>
    </div>
  <?php endif; ?>
  <?php if(array_key_exists('success', $_SESSION)): ?>
    <div class="success">
      Votre email a bien été envoyé, je vous répondrai prochainement !
    </div>
  <?php endif; ?>
  <form action="contact.php" method="post">
    <table>
      <tr>
        <th>
          <label for="input-name">Votre nom : </label>
        </th>
        <td>
          <input type="text" name="name" class="form-control" id="input-name" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
        </td>
      </tr>
      <tr>
        <th>
          <label for="input-email">Votre email: </label>
        </th>
        <td>
          <input type="text" name="email" class="form-control" id="input-email" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
        </td>
      </tr>
      <tr>
        <th>
          <label for="input-message">Votre message : </label>
        </th>
        <td>
          <textarea name="message" class="form-control" id="input-message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
        </td>
      <td>
    </table>
    <button type="submit" class="form-btn">Envoyer</button>
  </form>
</body>
</html>
<?php
  unset($_SESSION['inputs']);
  unset($_SESSION['success']);
  unset($_SESSION['errors']);
?>
