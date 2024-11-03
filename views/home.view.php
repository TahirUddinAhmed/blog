<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
<?= loadPartial('hero-section') ?>        
        <!-- Page content-->
        <div class="container">
            <!-- <?php //inspect() ?> -->
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                   
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="single-post.html" class="text-white"><h2 class="card-title">Featured Post Title</h2></a>
                            <div class="small text-muted">January 1, 2023</div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="single-post.html">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <?php foreach($posts as $post) : ?>
                                 <!-- Blog post-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <a href="single-post.html" class="text-white"><h2 class="card-title h4"><?= $post->title ?></h2></a>
                                        <div class="small text-muted"><?= $post->created_at ?></div>
                                        <p class="card-text"><?= $post->content ?></p>
                                        <a class="btn btn-primary" href="/post/<?= $post->id ?>">Read more →</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                           
                           
                        </div>
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
                <?= loadPartial('side-widgets') ?>
            </div>
        </div>

<?= loadPartial('footer') ?>