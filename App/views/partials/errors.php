<?php if (isset($errors)) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php inspect($errors) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>