<form method="post" class="form-horizontal" action="<?php echo APP_URL; ?>admin/createpost" enctype="multipart/form-data">
    <div class="form-group">
        <label class="label-control sm">Judul</label>
        <div class="big">
            <input class="form-control" type="text" name="post_name" id="post_name">
        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Category</label>
        <div class="big">
            <select class="form-control" name="category_name" id="category_name">
                <option value="" style="display:none"></option>
                <?php
                foreach ($data['category'] as $key => $value) {
                    $selected = '';
                    echo '<option value="' . $value['category_name'] . '" ' . $selected . '>' . $value['category_name'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Text</label>
        <div class="big">
            <textarea class="form-control" name="text"></textarea>

        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Thumbnail</label>
        <div class="big">
            <input class="form-control" type="file" name="thumbnail" accept="image/*" required>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Active</label>
        <div class="big">
            <input type="checkbox" name="active" checked value="1">
        </div>
    </div>

    <button type="submit" class="button blue submit">Submit</button>
</form>