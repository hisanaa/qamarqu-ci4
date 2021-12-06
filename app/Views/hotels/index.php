<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<a href="/hotel/create" class="btn btn-primary mb-3">Add Hotel</a>
<?php if (session()->getFlashData('msg')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('msg'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Location</th>
            <th>Thumbnail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($hotels as $hotel) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $hotel->title ?></td>
                <td><?= $hotel->description ?></td>
                <td><?= $hotel->location ?></td>
                <td><a href="/img/<?= $hotel->thumbnail ?>">img url</a></td>
                <td><a href="/hotel/<?= $hotel->id ?>">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>