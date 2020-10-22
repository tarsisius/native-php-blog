<div class="inner">
    <form class="form-horizontal" method="post" action="<?php echo APP_URL; ?>admin/editpost/<?php echo $data['post']['id']; ?>" id="form1" enctype="multipart/form-data">
        <div class="form-group">
            <label class="label-control sm">Judul</label>
            <div class="big">
                <input type="text" name="post_name" id="post_name" value="<?php echo $data['post']['post_name']; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="label-control sm">Category</label>
            <div class="big">
                <select name="category_name" id="category_name" class="form-control">
                    <option value="" style="display:none"></option>
                    <?php
                    foreach ($data['category'] as $key => $value) {
                        $selected = '';
                        if ($data['post']['category_name'] == $value['category_name']) {
                            $selected = 'selected';
                        }
                        echo '<option value="' . $value['category_name'] . '" ' . $selected . '>' . $value['category_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="label-control sm">Isi</label>
            <div class="big">
                <textarea class="form-control" name="text" id="text"><?php echo $data['post']['text']; ?></textarea>
            </div>
        </div>
        <div class="big">
            <img src="<?php echo APP_URL . 'image/' . $data['post']['thumbnail'];; ?>" style="margin-bottom:1em;object-fit:contain;display:block;width:200px;height:150px;border:1px solid silver;">
        </div>

        <div class="form-group">
            <label class="label-control sm">Ganti Thumbnail</label>
            <div class="big">
                <input class="form-control" type="file" name="thumbnail_new" accept="image/*">
            </div>
        </div>
        <div class="form-group">
            <label class="label-control sm">Aktif</label>
            <div class="big">
                <input class="form-control" type="checkbox" id="active" name="active" value="1" <?php if ($data['post']['active']) echo 'checked'; ?>>
            </div>
        </div>
        <button type="submit" class="button blue submit">Submit</button>
    </form>
</div>