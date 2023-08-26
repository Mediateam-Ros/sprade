 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
     <div class="container px-4 px-lg-5 my-5">
         <div class="text-center text-white">
             <h1 class="display-4 fw-bolder">Willkommen zur Spieltagsinfo</h1>
         </div>
     </div>
 </header>
 <!-- Section-->
 <?php
    $sched_arr = array();
    $max = 0;
    ?>
 <section class="py-5">
     <div class="container d-flex justify-content-center">
         <div class="card col-md-6 p-0">
             <div class="card-header">
                 <div class="card-title text-center w-100">Login</div>
             </div>
             <div class="card-body">
                 <form action="" id="login-client">
                     <div class="form-group">
                         <label for="email" class='control-label'>Email</label>
                         <input type="text" class="form-control" name="email" required>
                     </div>
                     <div class="form-group">
                         <label for="password" class='control-label'>Password</label>
                         <input type="password" class="form-control" name="password" required>
                     </div>
                     <div class="d-flex">
                         <div class="form-group d-flex">
                             <a href="/sprade/admin" class="btn btn-sm btn-primary btn-flat">Got to Admin</a>
                         </div>
                         <div class="form-group d-flex" style="position: absolute; right: 20px;">
                             <button class="btn btn-sm btn-primary btn-flat">Login</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
 <script>
 </script>