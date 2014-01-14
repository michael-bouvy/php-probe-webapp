<?php /** @var \PhpProbe\Probe\ProbeInterface $probe */ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>PhpProbe</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
  </style>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://github.com/michael-bouvy/php-probe" title="PhpProbe on GitHub">PhpProbe</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="index.php" title="Refresh"><i class="glyphicon glyphicon-refresh"></i></a>
        </li>
      </ul>
    </nav>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <h2>Probes results</h2>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Probe name</th>
            <th>Status</th>
            <th>Errors</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($probes as $probe): ?>
            <tr>
              <td>
                <?php echo $probe->getName(); ?>
              </td>
              <td>
                <?php if ($probe->hasSucceeded()): ?>
                  <span class="label label-success">Success</span>
                <?php elseif ($probe->getAdapter()->getResponse()->isSuccessful() && $probe->hasFailed()): ?>
                  <span class="label label-warning">Warning</span>
                <?php
                elseif ($probe->hasFailed()): ?>
                  <span class="label label-danger">Failed</span>
                <?php endif; ?>
              </td>
              <td>
                <?php echo implode("<br/>", array_map(function ($value) {
                  return htmlentities($value);
                }, $probe->getErrorMessages())); ?>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <hr>

  <footer class="text-center">
    <p>
      <a href="https://github.com/michael-bouvy/php-probe">PhpProbe on GitHub</a>
    </p>
  </footer>
</div>
<!-- /container -->

</body>
</html>
