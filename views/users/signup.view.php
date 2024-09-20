<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
<!-- signup Form  -->
  <div class="container mt-5">
        <h3 class="text-center mb-4">Sign Up</h3>

        <div class="container col-sm-4 mb-5">
            <form>
                <div class="mb-2">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your fullname">
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter phone number">
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                </div>
                <div class="mb-2">
                    <label for="confimr-pwd" class="form-label">Retype Password</label>
                    <input type="password" class="form-control" id="confirm-pwd" placeholder="Enter confirm password">
                </div>

              <div class="w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-100 btn-block mt-3">Sign Up</button>
              </div>  
              </form>

              <p class="mt-3">Already have an account? <a href="/login" class="text-link-primary">Login</a></p>
              
        </div>
    </div>
    <!-- !signup Form -->
<?= loadPartial('footer') ?>