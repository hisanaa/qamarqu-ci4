<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<h3>Edit Room</h3>
<form action="/room/<?= $room->id ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="hotel_id" value="<?= $room->hotel_id ?>">
    <input type="hidden" name="old_thumbnail" value="<?= $room->thumbnail ?>">
    <div class="mb-3">
        <label for="title" class="form-label ">Title</label>
        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : null ?>" value="<?= $room->title ?>" id="title">
        <div class="invalid-feedback">
            <?= $validation->getError('title') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="room_quota" class="form-label ">room_quota</label>
        <input type="text" name="room_quota" class="form-control <?= ($validation->hasError('room_quota')) ? 'is-invalid' : null ?>" value="<?= $room->room_quota ?>" id="room_quota">
        <div class="invalid-feedback">
            <?= $validation->getError('room_quota') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="guest_quota" class="form-label ">guest_quota</label>
        <input type="text" name="guest_quota" class="form-control <?= ($validation->hasError('guest_quota')) ? 'is-invalid' : null ?>" value="<?= $room->guest_quota ?>" id="guest_quota">
        <div class="invalid-feedback">
            <?= $validation->getError('guest_quota') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label ">price</label>
        <input type="text" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : null ?>" value="<?= $room->price ?>" id="price">
        <div class="invalid-feedback">
            <?= $validation->getError('price') ?>
        </div>
    </div>
    <select name='status' class="form-select mb-3" aria-label="Default select example">
        <option value="1">Active</option>
        <option value="0">Not Active</option>
    </select>
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Thumbnail</label>
        <input name='thumbnail' class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : null ?>" type="file" id="thumbnail">
        <div class="invalid-feedback">
            <?= $validation->getError('price') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-warning" href="<?= previous_url() ?>">Back</a>

</form>



<?= $this->endSection() ?>