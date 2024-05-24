<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/toastr.css">
  <title>TaskMaster — TODO List Web App</title>
</head>
<body>
  <!-- Header Section: Intro Part, TODO Form Inputs -->
  <header>
    <div id="intro">
      <h1>TaskMaster</h1>
      <h2>Gestion des tâches Web App</h2>
    </div>
    <div id="todoForm">
      <form action="index.php" method="POST" id="splinterForm">
        <input type="hidden" name="id" id="todo_id" value="">
        <input type="text" name="title" id="todo_title" placeholder="Start writing your todo task" required maxlength="65" aria-label="Task Title">
        <input type="text" name="details" id="todo_details" placeholder="Don't miss out to write the details, please!" maxlength="150" aria-label="Task Details" style="
    width: 550px;
">        <button id="submitBtn" type="submit" aria-label="Add/Update Task">+</button>
      </form>
    </div>
  </header>
  
  <!-- Main Section: TODO Cards -->
  <main>
    <h2>TASKS</h2>
    <!-- Todo Cards Grid -->
    <div id="todo"></div>
  </main>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/toastr.min.js"></script>
  <script src="assets/js/app.js"></script>

  <script>
    toastr.options = {
      closeButton: false,
      debug: false,
      newestOnTop: true,
      positionClass: "toast-bottom-right",
      preventDuplicates: false,
      onclick: null,
      showDuration: "300",
      hideDuration: "1000",
      timeOut: "3000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut",
      progressBar: true,
    };

    <?php
    session_start();
    if (!isset($_SESSION["welcome"])) {
      $_SESSION["welcome"] = true;
      echo "toastr.info('Howdy, Welcome To TaskMaster! 👋');";
    }
    ?>
  </script>
</body>
</html>
