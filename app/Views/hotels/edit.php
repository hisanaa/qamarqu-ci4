<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<h3>Edit Hotel</h3>

<form action="/hotel/<?= $hotel->id ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="put">
    <div class="mb-3">
        <label for="title" class="form-label ">Title</label>
        <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : null ?>" value="<?= $hotel->title ?>" id="title">
        <div class="invalid-feedback">
            <?= $validation->getError('title') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : null ?>" id="description" rows="3"><?= $hotel->description ?></textarea>
        <div class="invalid-feedback">
            <?= $validation->getError('description') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label ">Location</label>
        <input type="text" name="location" class="form-control <?= ($validation->hasError('location')) ? 'is-invalid' : null ?>" value="<?= $hotel->location ?>" id="location">
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
    <a class="btn btn-warning" href="<?= previous_url() ?>">Back</a>
</form>
<?= $this->endSection() ?>