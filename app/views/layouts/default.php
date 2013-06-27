<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DC Board</title>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px;
      }
    </style>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="<?php eh(APP_URL) ?>">DC Board</a>
          <div class="pull-right">
              <?php if(!isset($_SESSION['login']) || $_SESSION['login'] !== true): ?>
              <a class="btn btn-info" href="<?php eh(url('users/login')) ?>">
                  <span class="icon-white icon-lock"></span> Login
              </a>

              <a class="btn btn-danger" href="<?php eh(url('users/register')) ?>">
                  <span class="icon-white icon-user"></span> Register
              </a>
              <?php else: ?>
              <a class="btn btn-danger" href="<?php eh(url('users/logout')) ?>">
                  <span class="icon-white icon-user"></span> Logout
              </a>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <?php echo $_content_ ?>

    </div>

    <script>
    console.log(<?php eh(round(microtime(true) - TIME_START, 3)) ?> + 'sec');
    </script>

  </body>
</html>
