<?php
$total    = count($data ?? []);
$active   = 0;
$inactive = 0;

if (!empty($data)) {
    foreach ($data as $customer) {
        if (!empty($customer['is_active'])) {
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
        <h3 class="mb-1">Customers</h3>
        <p class="text-muted mb-0">Manage your customers and their appointment history</p>
    </div>
    <a href="/dashboard-customers/create" class="btn btn-primary">
        <i class="bi bi-person-plus me-1"></i>
        Add New Customer
    </a>
</div>

<!-- Summary Stats -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted small text-uppercase fw-semibold">Total Customers</div>
                        <div class="fs-3 fw-bold mt-1"><?= $total ?></div>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-people fs-5"></i>
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
                        <i class="bi bi-person-check fs-5"></i>
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
                        <i class="bi bi-person-x fs-5"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Customers List -->
<div class="row g-4">

    <?php if (empty($data)): ?>
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-people display-4 text-muted"></i>
                    <h5 class="mt-3">No customers yet</h5>
                    <p class="text-muted">Customers will appear here after appointments are booked.</p>
                </div>
            </div>
        </div>
    <?php else: ?>

        <?php foreach ($data as $customer): ?>
            <?php $isActive = !empty($customer['is_active']); ?>
            <div class="col-xl-4 col-lg-6">
                <div class="card border-0 shadow-sm h-100 <?= $isActive ? '' : 'opacity-75' ?>">
                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                                    <i class="bi bi-person fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-semibold"><?= htmlspecialchars($customer['name']) ?></h5>
                                    <div class="text-muted small"><?= htmlspecialchars($customer['phone']) ?></div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li>
                                        <a class="dropdown-item" href="/dashboard-customers/edit/<?= $customer['id'] ?>">
                                            <i class="bi bi-pencil me-2"></i>Edit
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="/dashboard-customers/delete/<?= $customer['id'] ?>"
                                           onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <?php if ($isActive): ?>
                                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                                    <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                    <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Inactive
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3 text-muted small">
                            <?php if (!empty($customer['email'])): ?>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="bi bi-envelope me-2"></i>
                                    <?= htmlspecialchars($customer['email']) ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($customer['notes'])): ?>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-sticky me-2"></i>
                                    <?= htmlspecialchars($customer['notes']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

</div>