<h1 class="text-dark">Willkommen zur <?php echo $_settings->info('name') ?></h1>
<?php
?>
<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Accounts</span>
          <span class="info-box-box">
            <?php
            echo number_format($conn->query("SELECT * FROM accounts")->num_rows);
            ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Datum</span>
          <span class="info-box-number">
            <?php
            date_default_timezone_set('Europe/Berlin');
            echo date("j F Y");
            ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>