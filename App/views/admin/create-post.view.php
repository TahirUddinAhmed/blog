<?= loadPartial('admin-head', ['slot' => 'CampusCourse - ']) ?>
<?= loadPartial('admin-sidebar') ?>     
<?= loadPartial('admin-navbar') ?>

<main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Create Post</h1>

            <form method="POST" action="" enctype="multipart/form-data">
              <div class="row border bg-white rounded p-3">
                <div class="col-8">
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                      type="text"
                      name="title"
                      class="form-control"
                      placeholder="Enter Post Title"
                    />
                  </div>

                  <div class="mb-3">
                    <label for="category" class="form-label"
                      >Select Category</label
                    >
                    <select class="form-select mb-3">
                      <option selected>Select Category</option>
                      <option value="Web Development">Web Development</option>
                      <option value="Version Control">Version Control</option>
                      <option value="Java">Java</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input
                      type="text"
                      name="tags"
                      class="form-control"
                      placeholder="Enter Tags separated by commas"
                    />
                  </div>

                  <div class="mb-3">
                    <label for="tags" class="form-label">Content</label>
                    <textarea
                      class="form-control"
                      rows="10"
                      placeholder="Write post content..."
                    ></textarea>
                  </div>
                </div>

                <div class="col-4">
                  <div class="mb-3">
                    <label for="title" class="form-label">Featured image</label>
                    <input
                        type="file"
                        name="title"
                        class="form-control"
                        accept="image/png, image/jpeg, image/jpg, image/webp"
                    />
                  </div>
                  <div class="mb-4">
                    <label for="category" class="form-label"
                      >Post Status</label
                    >
                    <select class="form-select mb-3">
                      <option selected>Select Status</option>
                      <option value="private">Private</option>
                      <option value="draft">Draft</option>
                      <option value="public">Public</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary d-inline-block w-100">Add Post</button>

                </div>
              </div>
            </form>
          </div>
        </main>

<?= loadPartial('admin-footer') ?>