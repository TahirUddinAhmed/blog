<!-- Page header with logo and tagline-->
<header class="<?= isset($category) ? 'py-4' : 'py-5' ?> bg-dark border-bottom mb-4">
    <div class="container">
        <div class="text-center text-capitalize <?= isset($category) ? 'my-1' : 'my-5' ?>">
            <h1 class="fw-bolder"><?= $category->name ?? 'Welcome to Blog Home!' ?></h1>
            <?php if(!isset($category)) : ?>
                <p class="lead mb-0">A tech blog website that drives your knowledge to another level.</p>
            <?php endif; ?>
        </div>
    </div>
</header>