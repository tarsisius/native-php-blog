<a class="button grey" href="<?php echo APP_URL; ?>admin/createcategory">New Category</a>
<?php
Flasher::Message();
?>
<table class="table">
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($data['cat'] as $cat) : ?>
        <tbody>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $cat['category_name'] ?></td>
                <td>
                    <a href="<?= APP_URL ?>admin/deletecategory/<?= $cat['id'] ?>" title="Delete" class="button red">Hapus</a>
                </td>
            </tr>
        </tbody>

    <?php endforeach ?>
</table>
