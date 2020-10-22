<div class="container">
    <div class="jumbotron">
        <h1>
            Halo 
        </h1>
    </div>
    <div class="index">
        <?php foreach ($data['post'] as $key => $value) : ?>
            <div class="post">
                <div class="img-post">
                    <a href="<?= APP_URL ?>read/<?= $value['slug'];  ?>">
                        <img src="<?= APP_URL ?>image/<?= $value['thumbnail'] ?>" alt="<?= $value['thumbnail'] ?>">
                    </a>
                </div>
                <div class="info-post">
                    <div class="title">
                        <a href="<?= APP_URL ?>read/<?= $value['slug'];  ?>">
                            <?= $value['post_name'] ?>
                        </a>
                    </div>
                </div>

            </div>
        <?php endforeach ?>
    </div>
    <?php if ($data['jumlah_page'] > 1) { ?>
        <ul class="pagination">
            <?php
            if ($data['page'] == 1) {
            ?>
                <li class="page-item none"><a class="page-link" href="#">First</a></li>
            <?php
            } else {  ?>
                <li class="page-item"><a class="page-link" href="<?= APP_URL ?>page/1">First</a></li>
            <?php } ?>
            <?php
            for ($i = $data['start_number']; $i <= $data['end_number']; $i++) {
                $link_active = ($data['page'] == $i) ? 'active' : '';
            ?>
                <li class="page-item <?php echo $link_active; ?>"><a class="page-link" href="<?= APP_URL ?>page/<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            <?php if ($data['page'] == $data['jumlah_page']) { ?>
                <li class="page-item none"><a class="page-link" href="#">Last</a></li>
            <?php } else {
                $link_next = ($data['page'] < $data['jumlah_page']) ? $data['page'] + 1 : $data['jumlah_page'];
            ?>
                <li class="page-item"><a class="page-link" href="<?= APP_URL ?>page/<?php echo $data['jumlah_page']; ?>">Last</a></li>
            <?php
            }
            ?>
        </ul>
    <?php } ?>

</div>
</div>