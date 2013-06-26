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
              <a class="btn btn-inverse" href="<?php eh(url('users/create')) ?>">
                  <span class="icon-white icon-user"></span> Create an Account
              </a>
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
