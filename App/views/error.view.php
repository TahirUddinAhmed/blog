<?= loadPartial('head') ?>
<?= loadPartial('navbar'); ?>

<section class="py-6">
    <div class="container min-vh-50 py-6 d-flex justify-content-center align-items-center" style="max-width:1920px; min-height: 100vh;">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h1 class="fw-bold display-1"><?= $status ?></h1>
                    </div>
                </div>
                <div class="lc-block">
                    <div editable="rich">
                        <p class="h2"><?= $message ?></p>
                    </div>
                </div>
                <div class="lc-block">
                    <a href="/" role="button">Go Back to Blogs Page</a>
                </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>
</section>


<?= loadPartial('footer') ?>