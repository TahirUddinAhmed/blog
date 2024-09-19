<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
 <!-- Login Form -->
 <div class="container mt-5 row">
        <h3 class="text-center mb-4">Login</h3>

        <div class="container col-sm-4 mb-5">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username or Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username or email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Passowrd">
                </div>
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-between">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                    </div>
                    </div>

                    <div class="col d-flex justify-content-end">
                    <!-- Simple link -->
                    <a href="#!" class="text-link-primary">Forgot password?</a>
                    </div>
                </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>

              <p class="mt-3">Don't have an account? <a href="/signup" class="text-link-primary">Create</a></p>
              
        </div>
    </div>
    <!-- !Login Form -->
<?= loadPartial('footer') ?>