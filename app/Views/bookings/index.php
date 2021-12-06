<?= $this->extend('layouts/app') ?>

<?= $this->section('body') ?>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hp</th>
            <th>Hotel</th>
            <th>Room</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Status</th>
            <th>Payment Method</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($bookings as $booking) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $booking->name ?></td>
                <td><?= $booking->email ?></td>
                <td><?= $booking->hp ?></td>
                <td><?= $booking->hotel_id ?></td>
                <td><?= $booking->room_id ?></td>
                <td><?= $booking->checkin ?></td>
                <td><?= $booking->checkout ?></td>
                <td><?= $booking->status ?></td>
                <td><?= $booking->payment_method ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>