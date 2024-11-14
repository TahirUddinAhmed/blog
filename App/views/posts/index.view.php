<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
<?= loadPartial('search') ?>       
       <!-- Page content-->
       <div class="container">
            <div class="row">

                <?= loadPartial('side-widgets', ['categories' => $categories]) ?>
                <?php if(!empty($posts)) : ?>
                <!-- Blog entries-->
                <div class="col-lg-9">
                    

                    <div class="row row-cols-1 row-cols-md-2 g-4">
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
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination bg-dark">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4 bg-dark">
                            <li class="page-item disabled bg-dark"><a class="page-link bg-dark" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link bg-dark" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link bg-dark" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link bg-dark" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link bg-dark" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link bg-dark" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link bg-dark" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <?php else : ?>
                    <p class="text-muted">No posts available</p>
                <?php endif; ?>
            </div>
        </div>

<?= loadPartial('footer') ?>