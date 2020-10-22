<?php Flasher::Message() ?>
<form method="post" action="<?php echo APP_URL; ?>admin/setting" class="form-horizontal" id="form1">
    <div class="form-group">
        <label class="label-control sm">Judul</label>
        <div class="big">
            <input value="<?php echo $data['sett']['title']; ?>" type="text" name="title" id="title" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Jumbotron</label>
        <div class="big">
            <input value="<?php echo $data['sett']['jumbotron']; ?>" type="text" name="jumbotron" id="jumbotron" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control sm">Halaman</label>
        <div class="big">
            <input value="<?php echo $data['sett']['page']; ?>" type="number" name="page" id="page" class="form-control" required>
        </div>
    </div>
    </div>
    <button type="submit" class="button blue submit">Update</button>
</form>