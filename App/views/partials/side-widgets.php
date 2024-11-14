<!-- Side widgets-->
<div class="col-lg-3">
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <?php if(!empty($categories)) : ?>
            <div class="row row-cols-1 gap-2">
                <?php foreach($categories as $category) : ?>
                <div class="col">
                    <ul class="list-unstyled mb-0">
                        <li><a class="text-link-primary" href="/category/<?= $category->id ?>/posts"><?= $category->name ?></a></li>
                    </ul>
                </div>
                <?php endforeach; ?>
                
            </div>
            <?php else : ?>
                <p class="text-muted">No Categories available</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">Enroll Our New Course</div>
    </div>
</div>