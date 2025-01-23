<?= loadPartial('admin-head', ['slot' => 'CampusCourse - ']) ?>
<?= loadPartial('admin-sidebar') ?>     
<?= loadPartial('admin-navbar') ?>

<main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Category Page</h1>
            
              <div class="row border p-3">
                <div class="col-4 bg-white p-3">
                  <form action="/admin/category/create" method="post">
                    <div class="form-group mb-2">
                        <label for="category-name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" 
                            class="form-control <?= isset($errors) ? 'border-danger' : '' ?>">
                        <span class="text-danger"><?= $errors ?? '' ?></span>
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary">Add Category</button>
                  </form>
                </div>

                <div class="col-8">
                </div>
              </div>
           
          </div>
        </main>

<?= loadPartial('admin-footer') ?>