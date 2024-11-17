<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>
<!-- Page content-->
<div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $post->title ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?= formateDate($post->created_at)  ?>, by <?= $author->username ?></div>
                            <!-- Post categories-->
                            <?php 
                                $tags = explode(',', $post->tags);
                            ?>
                            <?php foreach($tags as $tag) : ?>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?= $tag ?></a>
                            <?php endforeach; ?>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded border" src="<?= !empty($post->post_image) ? '../upload/featuredImage/' . $post->post_image : 'https://dummyimage.com/900x400/ced4da/6c757d.jpg' ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <?= $post->content ?>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <!-- Comment form-->
                                 <h4>Leave A Comment</h4>
                                <form class="mb-4">
                                    <input type="text" name="commentor-name" class="form-control mb-3" id="" placeholder="Enter your name">
                                    <textarea class="form-control mb-3" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                    <button type="submit" class="btn btn-primary">Leave Comment</button>
                                </form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4 border p-3 rounded">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4 border p-2 rounded">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4 border p-2 rounded">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex border p-3 rounded">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <?= loadPartial('side-widgets', ['categories' => $categories]) ?>
                
            </div>
        </div>
<?= loadPartial('footer') ?>