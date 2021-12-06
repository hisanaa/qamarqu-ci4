<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<h3>Add Hotel</h3>

<form action="/hotel" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="title" class="form-label ">Title</label>
        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : null ?>" value="<?= old('title') ?>" id="title">
        <div class="invalid-feedback">
            <?= $validation->getError('title') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : null ?>" value="<?= old('description') ?>" id="description" rows="3"></textarea>
        <div class="invalid-feedback">
            <?= $validation->getError('description') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label ">Location</label>
        <input type="text" name="location" class="form-control <?= ($validation->hasError('location')) ? 'is-invalid' : null ?>" value="<?= old('location') ?>" id="location">
        <div class="invalid-feedback">
            <?= $validation->getError('location') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Thumbnail</label>
        <input name='thumbnail' class="form-control <?= ($validation->hasError('thumbnail')) ? 'is-invalid' : null ?>" type="file" id="thumbnail">
        <div class="invalid-feedback">
            <?= $validation->getError('thumbnail') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-warning" href="/hotel">Back</a>
</form>
<?= $this->endSection() ?>