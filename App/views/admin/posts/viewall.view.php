<?= loadPartial('admin-head', ['slot' => 'CampusCourse - ']) ?>
<?= loadPartial('admin-sidebar') ?>
<?= loadPartial('admin-navbar') ?>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3 text-center">View All Posts</h1>
        <hr>
        <?php //inspectAndDie($posts) ?>
        <!-- Table -->
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Latest Projects</h5>
            </div>
            <table class="table table-hover my-0 p-3">
                <thead>
                    <tr>
                        <th>SNO</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="d-none d-xl-table-cell">Start Date</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($posts)) : ?>
                        <?php $sno = 1;  ?>
                       <?php foreach($posts as $post) : ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td class="d-none d-xl-table-cell"><?= $post->title; ?></td>
                                <td class="d-none d-xl-table-cell"><?= $post->category_name; ?></td>
                                <td><span class="badge 
                                        <?php if($post->status === 'published'): ?>
                                            bg-success
                                        <?php elseif($post->status === 'draft') : ?>
                                            bg-warning
                                        <?php else : ?>
                                            bg-danger
                                        <?php endif; ?>
                                        ">
                                        <?= $post->status ?>
                                    </span></td>
                                <td class="d-none d-md-table-cell"><?= formateDate($post->created_at) ?></td>
                                <td class="d-none d-md-table-cell">
                                    <!-- Edit post -->
                                     <a href="#" class="btn btn-sm btn-success me-2 rounded"><i class="align-middle" data-feather="edit"></i>
                                     <!-- Delete Post -->
                                      <a href="#" class="btn btn-sm btn-danger me-2 rounded"><i class="align-middle" data-feather="delete"></i>
                                </td>
                            </tr>
                            <?php $sno++; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">No posts is available</td>
                        </tr>
                    <?php endif; ?>
                    
                    
                    
                </tbody>
            </table>
        </div>
        <!-- !Table -->

    </div>
</main>

<?= loadPartial('admin-footer') ?>