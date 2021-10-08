<?php
/*
Plugin Name: Spare Plugin
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Create spare plugin
Version: 1.0.0
Author: Spare team
Author URI: http://health-check-team.example.com
*/

require_once(plugin_dir_path(__FILE__).'/includes/plugin-scripts.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>SparePlugin</title>
</head>
<body>
  <div class="container mt-4">
    <div class="btn-group" role="group">
      <a href="wp-content/plugins/spare-plugin/merchant.php" class="btn btn-primary">Merchant</a>
      <a href="transactions.php" class="btn btn-secondary">Products</a>
    </div>
    <hr>
    <h2>Products</h2>
    <table class="table table-striped">
      <thead>
        <tr class="style-box">
          <th>Product ID</th>
          <th>Name</th>
          <th>price</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($customers as $c): ?>
          <tr>
            <td><?php echo $c->id; ?></td>
            <td><?php echo $c->first_name; ?> <?php echo $c->last_name; ?></td>
            <td><?php echo $c->email; ?></td>
            <td><?php echo $c->created_at; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    <p><a href="wp-content/plugins/spare-plugin/sign-in.php">Check out</a></p>
  </div>
</body>
</html>