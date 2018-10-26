<!DOCTYPE html>
<html lang="de">
  <head>
    <?php
      require 'Classes/StringValidator.php';
      $pageName = isset($_GET['page']) ? StringValidator::validate($_GET['page']) : 'Home';

      echo('<title>' . $pageName . '</title>');

      require 'Head.php';
    ?>
  </head>
  <body>
    <div id="wrapper">
      <?php
        require 'Classes/NavBuilder.php';
        $navBar = new NavBuilder(['Home', 'Restaurant', 'Spezialitaeten', 'Reservierung', 'Speisekarte', 'Kontakt'], $pageName);

        require $pageName . '.php';
        include 'Footer.php';
      ?>
    </div>
  </body>
</html>