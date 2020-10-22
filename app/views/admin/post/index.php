<a class="button grey" href="<?php echo APP_URL; ?>admin/createpost">New post</a>
<?php
Flasher::Message();
?>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>Category</th>
            <th style="width: 20%">Action</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($data['post'] as $key => $value) : ?>
        <tbody>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $value['post_name'] ?></td>
                <td><img src="<?= APP_URL ?>image/<?= $value['thumbnail'] ?>" class="thumb"></td>
                <td><?= $value['category_name'] ?></td>
                <td><a href="<?= APP_URL ?>admin/editpost/<?= $value['id'] ?>" title="Edit" class="button green">Edit</a>
                    <a href="<?= APP_URL ?>admin/deletepost/<?= $value['id'] ?>" title="Delete" class="button red">Hapus</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach ?>
</table>
</div>