<?php
$total    = count($data ?? []);
$active   = 0;
$inactive = 0;

if (!empty($data)) {
    foreach ($data as $service) {
        if (!empty($service['is_active'])) {
            $active++;
        } else {
            $inactive++;
        }
    }
}
?>

<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Services</h3>
        <p class="text-muted mb-0">Manage the services you offer to your customers</p>
    </div>
    <a href="/dashboard-service/create" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Add New Service
    </a>
</div>

<!-- Summary Stats -->
<div class="row g-3 mb-4">

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Total Services</div>
                        <div class="fs-3 fw-bold mt-1"><?= $total ?></div>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-bag fs-5"></i>
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
                        <div class="text-muted small text-uppercase fw-semibold">Active</div>
                        <div class="fs-3 fw-bold mt-1 text-success"><?= $active ?></div>
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
                        <div class="text-muted small text-uppercase fw-semibold">Today's Bookings</div>
                        <div class="fs-3 fw-bold mt-1">—</div>
                    </div>
                    <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
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
                        <div class="text-muted small text-uppercase fw-semibold">Inactive</div>
                        <div class="fs-3 fw-bold mt-1 text-muted"><?= $inactive ?></div>
                    </div>
                    <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-pause-circle fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Services List -->
<div class="row g-4">

    <?php if (empty($data)): ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-bag display-4 text-muted"></i>
                    <h5 class="mt-3">No services yet</h5>
                    <p class="text-muted">Create your first service to get started.</p>
                    <a href="/dashboard-service/create" class="btn btn-primary mt-2">
                        <i class="bi bi-plus-lg me-1"></i> Add New Service
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>

        <?php foreach ($data as $service): ?>
            <?php
                $isActive = !empty($service['is_active']);
                $cardClass = $isActive ? '' : 'opacity-75';
            ?>
            <div class="col-xl-4 col-lg-6">
                <div class="card border-0 shadow-sm h-100 service-card <?= $cardClass ?>">
                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                    <i class="bi bi-bag fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-semibold"><?= htmlspecialchars($service['name']) ?></h5>
                                    <div class="text-muted small"><?= (int)$service['duration_minutes'] ?> minutes</div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li>
                                        <a class="dropdown-item" href="/dashboard-service/edit/<?= $service['id'] ?>">
                                            <i class="bi bi-pencil me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="/dashboard-service/delete/<?= $service['id'] ?>"
                                           onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3 mt-auto">
                            <?php if ($isActive): ?>
                                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                    <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                    <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Inactive
                                </span>
                            <?php endif; ?>

                            <span class="fw-semibold">$<?= number_format((float)$service['price'], 2) ?></span>
                        </div>

                        <div class="row text-center border-top pt-3">
                            <div class="col-6">
                                <div class="text-muted small">Max Capacity</div>
                                <div class="fw-bold"><?= (int)$service['max_capacity'] ?></div>
                            </div>
                            <div class="col-6 border-start">
                                <div class="text-muted small">Duration</div>
                                <div class="fw-bold"><?= (int)$service['duration_minutes'] ?> min</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

</div>