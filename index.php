<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kira Elektrik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
.center_div{
  margin: 0 auto;
  width: 50% 
}
.result_div {
  border-radius: 5px;
  border: 1px solid #1E90FF;
  padding: 15px;
  margin-top: 30px;
  margin-bottom: 20px;
}

.result_table{
  margin-top: 30px;
  margin-bottom: 20px;
}

.result_table th{
  border-bottom: 1px solid black;
}

</style>

<body>

<?php
  $power= '';
  $rate = '';
  $voltage = '';
  $current = '';
  $current_rate = '';

  if (isset($_POST['submit'])) 
  {
    $voltage = $_POST['voltage'];
    $current = $_POST['current'];
    $current_rate = $_POST['current_rate'];

    if (!empty($voltage) && !empty($current) && !empty($current_rate)) 
    {
      $power = $voltage * $current / 1000;
      $rate = $current_rate / 100;
    }
  }
  
?>


<div class="container center_div">
  <h2>Calculate</h2>
  <form action="" method="POST">

    <div class="form-group">
      <label for="voltage">Voltage</label>
      <input type="text" class="form-control" id="voltage" name="voltage" value="<?php echo $voltage; ?>">
      <label for="voltage">Voltage (V)</label>
    </div>

    <div class="form-group">
      <label for="current">Current</label>
      <input type="text" class="form-control" id="current" name="current" value="<?php echo $current; ?>">
      <label for="current">Ampere (A)</label>
    </div>

    <div class="form-group">
      <label for="current_rate">CURRENT RATE</label>
      <input type="text" class="form-control" id="current_rate" name="current_rate" value="<?php echo $current_rate; ?>">
      <label for="current_rate">sen/kWh</label>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary" name="submit">Calculate</button>
    </div>
  </form>
  
  <div class="result_div">
    <?php echo "<b>POWER : " . $power . "kw</b>"; ?>
    <?php echo '<br><br><b>RATE : ' . $rate . 'RM</b>'; ?>
  </div>
  

  <?php
  if(isset($_POST['submit'])){
    $counterpower = $power;
    $totalRM = 0;
    ?>
    <div class="result_table">
      <table class="table">
        <tr>
          <th>#</th>
          <th>Hour</th>
          <th>Energy (kWh)</th>
          <th>TOTAL (RM)</th>
        </tr>
        
        <?php
        for($i = 1; $i <= 24; $i++){
          $totalRM = $power * $rate;
          ?>
          <tr>
            <td>
              <?php echo "<b>" . $i . "</b>"; ?>
            </td>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $power; ?>
            </td>
            <td>
              <?php echo round(($totalRM), 2); ?>
            </td>
          </tr>
        <?php

        $power = $power + $counterpower;

        }

        ?>
        
      </table>
    </div>
    <?php
  }
  ?>

 
</div>

</body>
</html>
