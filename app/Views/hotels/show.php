<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<div class="row">

    <h3 class="mb-3">Data Hotel</h3>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>thumbnail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $hotel->title ?></td>
                <td><?= $hotel->description ?></td>
                <td><?= $hotel->location ?></td>
                <td><a href="/img/<?= $hotel->thumbnail ?>">img url</a></td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-6 d-grid">
            <a href="/hotel/<?= $hotel->id ?>/edit" class="btn btn-warning my-2">Edit</a>
        </div>
        <div class="col-6">
            <form class="row no-gutters" action="/hotel/<?= $hotel->id ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="delete">
                <button onclick="return confirm('are you sure to delete?')" class="btn btn-danger my-2">Delete</button>
            </form>
        </div>
    </div>


</div>
<hr class="my-4">
<div class="row">
    <div class="col-md-3 border py-3">
        <form action="/room" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="hotel_id" value="<?= $hotel->id ?>">
            <div class="mb-3">
                <label for="title" class="form-label ">Title</label>
                <input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : null ?>" value="<?= old('title') ?>" id="title">
                <div class="invalid-feedback">
                    <?= $validation->getError('title') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="room_quota" class="form-label ">room_quota</label>
                <input type="text" name="room_quota" class="form-control <?= ($validation->hasError('room_quota')) ? 'is-invalid' : null ?>" value="<?= old('room_quota') ?>" id="room_quota">
                <div class="invalid-feedback">
                    <?= $validation->getError('room_quota') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="guest_quota" class="form-label ">guest_quota</label>
                <input type="text" name="guest_quota" class="form-control <?= ($validation->hasError('guest_quota')) ? 'is-invalid' : null ?>" value="<?= old('guest_quota') ?>" id="guest_quota">
                <div class="invalid-feedback">
                    <?= $validation->getError('guest_quota') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label ">price</label>
                <input type="text" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : null ?>" value="<?= old('price') ?>" id="price">
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
        </form>
    </div>

    <div class="col-md-9">
        <?php if (session()->getFlashData('msg')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('msg'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-between">
            <h3>Data Rooms</h3>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Room Quota</th>
                    <th>Guest Quota</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($rooms as $room) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $room->title ?></td>
                        <td><a href="/img/<?= $room->thumbnail ?>">url</a></td>
                        <td><?= $room->room_quota ?></td>
                        <td><?= $room->guest_quota ?></td>
                        <td><?= $room->price ?></td>
                        <td><?= $room->status ?></td>
                        <td class="">
                            <a href="/room/<?= $room->id ?>/edit" class="btn btn-sm btn-warning ">Edit</a>
                            |
                            <form class="d-inline" action="/room/<?= $room->id ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="hotel_id" value="<?= $hotel->id ?>">
                                <button onclick="return confirm('are you sure to delete?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>