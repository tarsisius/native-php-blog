<img class="post-inner-image" src="<?= APP_URL ?>image/<?= $data['post']['thumbnail'] ?>" alt="<?= $data['post']['thumbnail'] ?>">
<div class="container post-inner">
    <div class="post-inner-name">
        <h1>
            <?= $data['post']['post_name'] ?>
        </h1>
    </div>
    <div class="post-inner-isi">
        <?= $data['post']['text'] ?>
    </div>
</div>