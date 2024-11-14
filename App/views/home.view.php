<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
<?= loadPartial('hero-section') ?>        
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                   
                <?php if(!empty($latest)) : ?>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="/posts/<?= $latest->id ?>" class="text-white"><h2 class="card-title"><?= $latest->title ?></h2></a>
                            <div class="small text-muted"><?php formateDate($latest->created_at) ?></div>
                            <p class="card-text"><?= $latest->content ?></p>
                            <a class="btn btn-primary" href="/posts/<?= $latest->id ?>">Read more →</a>
                        </div>
                    </div>

                
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <?php if(!empty($posts)) : ?> 
                            <?php foreach($posts as $post) : ?>
                               <div class="col-lg-6">
                                 <!-- Blog post-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <a href="/posts/<?= $post->id ?>" class="text-white"><h2 class="card-title h4"><?= $post->title ?></h2></a>
                                        <div class="small text-muted"><?= formateDate($post->created_at) ?></div>
                                        <p class="card-text"><?= $post->content ?></p>
                                        <a class="btn btn-primary" href="/posts/<?= $post->id ?>">Read more →</a>
                                    </div>
                                </div>
                               </div>
                            <?php endforeach; ?>
                           <?php endif; ?>
                    </div>
                    <?php else : ?>
                        <p class="text-muted">No posts are available</p>
                    <?php endif; ?>
                    <div class="mt-5 mb-4 text-center">
                        <a href="/posts" class="border rounded-pill px-4 py-2 text-dark ">View All Posts</a>
                    </div>
                </div>
                <?= loadPartial('side-widgets', ['categories' => $categories]) ?>
            </div>
        </div>

<?= loadPartial('footer') ?>