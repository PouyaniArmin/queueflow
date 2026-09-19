<?php
function countByStatus(array $data, string $status): int
{
    return count(array_filter($data, fn($item) => $item['status'] === $status));
}

$filterByStatus = function (array $data, string $status) {
    return array_filter($data, function ($appointment) use ($status) {
        return $appointment['status'] === $status;
    });
};

// تابع کمکی برای نمایش تاریخ هوشمند
function formatAppointmentDate(string $dateTime): array
{
    $dt = new DateTime($dateTime);
    $today = new DateTime('today');
    $tomorrow = new DateTime('tomorrow');

    if ($dt->format('Y-m-d') === $today->format('Y-m-d')) {
        $dayLabel = 'Today';
    } elseif ($dt->format('Y-m-d') === $tomorrow->format('Y-m-d')) {
        $dayLabel = 'Tomorrow';
    } else {
        $dayLabel = $dt->format('d M Y'); // مثلاً 20 Sep 2026
    }

    $timeLabel = $dt->format('h:i A'); // 10:00 AM

    return [
        'day'  => $dayLabel,
        'time' => $timeLabel
    ];
}
?>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Appointments</h3>
        <p class="text-muted mb-0">Manage and track all your appointments</p>
    </div>
    <a href="#" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Add Appointment
    </a>
</div>

<!-- Summary Stats -->
<div class="row g-3 mb-4">

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Today</div>
                        <div class="fs-3 fw-bold mt-1">
                            <?= count(array_filter($data, function($item) {
                                return (new DateTime($item['date_time']))->format('Y-m-d') === (new DateTime('today'))->format('Y-m-d');
                            })) ?>
                        </div>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-calendar-check fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Pending</div>
                        <div class="fs-3 fw-bold mt-1 text-warning"><?= countByStatus($data, 'pending') ?></div>
                    </div>
                    <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-clock-history fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Confirmed</div>
                        <div class="fs-3 fw-bold mt-1 text-success"><?= countByStatus($data, 'confirmed') ?></div>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-check-circle fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Completed</div>
                        <div class="fs-3 fw-bold mt-1 text-info"><?= countByStatus($data, 'completed') ?></div>
                    </div>
                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-check2-all fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Appointments List -->
<div class="row g-4">

    <!-- Pending -->
    <?php $pending = $filterByStatus($data, 'pending'); ?>
    <?php foreach ($pending as $key): ?>
        <?php $dateInfo = formatAppointmentDate($key['date_time']); ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">

                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                <i class="bi bi-person fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-semibold"><?= htmlspecialchars($key['customer_name']) ?></h5>
                                <div class="text-muted small"><?= htmlspecialchars($key['service_name'] ?? '—') ?></div>
                            </div>
                        </div>

                        <div class="text-center d-none d-md-block">
                            <div class="fw-semibold"><?= $dateInfo['day'] ?></div>
                            <div class="text-muted small"><?= $dateInfo['time'] ?></div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">
                                <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i>
                                Pending
                            </span>

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-check2-circle me-2"></i>Confirm</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-x-circle me-2"></i>Cancel</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="d-md-none mt-3 text-muted small">
                        <i class="bi bi-calendar-event me-1"></i>
                        <?= $dateInfo['day'] ?> · <?= $dateInfo['time'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Confirmed -->
    <?php $confirmed = $filterByStatus($data, 'confirmed'); ?>
    <?php foreach ($confirmed as $key): ?>
        <?php $dateInfo = formatAppointmentDate($key['date_time']); ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">

                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                <i class="bi bi-person fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-semibold"><?= htmlspecialchars($key['customer_name']) ?></h5>
                                <div class="text-muted small"><?= htmlspecialchars($key['service_name'] ?? '—') ?></div>
                            </div>
                        </div>

                        <div class="text-center d-none d-md-block">
                            <div class="fw-semibold"><?= $dateInfo['day'] ?></div>
                            <div class="text-muted small"><?= $dateInfo['time'] ?></div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i>
                                Confirmed
                            </span>

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-check2-circle me-2"></i>Confirm</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-x-circle me-2"></i>Cancel</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="d-md-none mt-3 text-muted small">
                        <i class="bi bi-calendar-event me-1"></i>
                        <?= $dateInfo['day'] ?> · <?= $dateInfo['time'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Completed -->
    <?php $completed = $filterByStatus($data, 'completed'); ?>
    <?php foreach ($completed as $key): ?>
        <?php $dateInfo = formatAppointmentDate($key['date_time']); ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">

                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-info bg-opacity-10 text-info rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                <i class="bi bi-person fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-semibold"><?= htmlspecialchars($key['customer_name']) ?></h5>
                                <div class="text-muted small"><?= htmlspecialchars($key['service_name'] ?? '—') ?></div>
                            </div>
                        </div>

                        <div class="text-center d-none d-md-block">
                            <div class="fw-semibold"><?= $dateInfo['day'] ?></div>
                            <div class="text-muted small"><?= $dateInfo['time'] ?></div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i>
                                Completed
                            </span>

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-check2-circle me-2"></i>Confirm</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-x-circle me-2"></i>Cancel</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="d-md-none mt-3 text-muted small">
                        <i class="bi bi-calendar-event me-1"></i>
                        <?= $dateInfo['day'] ?> · <?= $dateInfo['time'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>