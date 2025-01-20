<?= loadPartial('admin-head', ['slot' => 'CampusCourse - ']) ?>
<?= loadPartial('admin-sidebar') ?>     
<?= loadPartial('admin-navbar') ?>
<main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Edit Post</h1>
            <form method="POST" action="/admin/posts/<?= $post->id ?>/edit" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              <div class="row border bg-white rounded p-3">
                <div class="col-8">
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                      type="text"
                      name="title"
                      class="form-control <?= isset($errors['title']) ? 'border-danger' : '' ?>"
                      placeholder="Enter Post Title"
                      value="<?= $post->title ?? '' ?>"
                    />
                    <span class="text-danger"><?= $errors['title'] ?? '' ?></span>
                  </div>

                  <div class="mb-3">
                    <?php if(!empty($categories)) : ?>
                    <label for="category" class="form-label"
                      >Category: <span class="badge bg-success"><?= $post->category_name ?></span></label
                    >
                    <select class="form-select mb-3 <?= isset($errors['category_id']) ? 'border-danger' : '' ?>" name="category_id">
                      <option selected value="<?= $post->category_id ?>">Choose</option>
                      <?php foreach($categories as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                      <?php endforeach; ?>
                      </select>
                      <?php else : ?>
                       <a href="#" class=""><strong>Create new Category </strong><i class="align-middle" data-feather="plus"></i></a>
                      <?php endif; ?>
                      <?php if(isset($errors['category_id'])) : ?>
                        <span class="text-danger">Category is required</span>
                      <?php endif; ?>
                  </div>

                  <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input
                      type="text"
                      name="tags"
                      class="form-control <?= isset($errors['tags']) ? 'border-danger' : '' ?>"
                      placeholder="Enter Tags separated by commas"
                      value="<?= $post->tags ?? '' ?>"
                    />
                    <span class="text-danger"><?= $errors['tags'] ?? '' ?></span>
                  </div>

                  <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea
                      class="form-control <?= isset($errors['content']) ? 'border-danger' : '' ?>"
                      name="content"
                      rows="10"
                      placeholder="Write post content..."
                    ><?= $post->content ?? '' ?></textarea>
                    <span class="text-danger"><?= $errors['content'] ?? '' ?></span>
                  </div>
                </div>

                <div class="col-4">
                  <div class="mb-3">
                    <label for="title" class="form-label">Featured image</label>
                    <input
                        type="file"
                        name="post_image"
                        class="form-control <?= isset($errors['post_image']) ? 'border-danger' : '' ?>"
                        
                    />
                    <span class="text-danger"><?= $errors['post_image'] ?? '' ?></span>
                    <?php if(!empty($post->post_image)) : ?>
                    <div class="border p-2 mt-2">
                    <figure class="mb-4"><img class="img-fluid rounded border" src="/../upload/featuredImage/<?= $post->post_image ?>" alt="..." /></figure>
                    </div>
                    <?php endif; ?>
                    </div>
                  <div class="mb-4">
                    <label for="category" class="form-label"
                      >Post Status: <span class="badge 
                                        <?php if($post->status === 'published'): ?>
                                            bg-success
                                        <?php elseif($post->status === 'draft') : ?>
                                            bg-warning
                                        <?php else : ?>
                                            bg-danger
                                        <?php endif; ?>
                                        ">
                                        <?= $post->status ?>
                                    </span></label
                    >
                    <select class="form-select mb-3" name="status">
                      <option selected value="<?= $post->status ?>" default>Select Status</option>
                      <option value="private">Private</option>
                      <option value="draft">Draft</option>
                      <option value="published">Published</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary d-inline-block w-100">Update Post</button>

                </div>
              </div>
            </form>
          </div>
        </main>

<?= loadPartial('admin-footer') ?>