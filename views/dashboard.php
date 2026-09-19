<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<?php
function countByStatus(array $data, string $status): int
{
    return count(array_filter($data, fn($item) => $item['status'] === $status));
}

// تعداد مشتری‌های یکتا بر اساس شماره تلفن
$uniqueCustomers = count(array_unique(array_column($data, 'customer_phone')));
?>

<div class="container">
    <div class="pt-4 text-center">
        <h2 class="text-center mb-4">Dashboard Statistics</h2>
    </div>

    <?php if ($role === 'owner' || $role === 'admin') { ?>
        <div class="row g-4">

            <!-- Today's Appointments -->
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card card-hover-primary shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-muted text-uppercase fw-bold small">Today's Appointments</div>
                                <div class="stat-value text-primary"><?= count($today) ?></div>
                            </div>
                            <div class="icon-circle">
                                <i class="bi bi-card-checklist text-primary"></i>
                            </div>
                        </div>
                        <div class="progress mt-4">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                        </div>
                        <div class="mini-chart mt-auto">
                            <div class="chart-bar" style="height: 60%"></div>
                            <div class="chart-bar" style="height: 40%"></div>
                            <div class="chart-bar" style="height: 80%"></div>
                            <div class="chart-bar" style="height: 65%"></div>
                            <div class="chart-bar" style="height: 75%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Appointments -->
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card card-hover-success shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-muted text-uppercase fw-bold small">Pending Appointments</div>
                                <div class="stat-value text-success"><?= countByStatus($data, 'pending') ?></div>
                            </div>
                            <div class="icon-circle">
                                <i class="bi bi-card-list text-success"></i>
                            </div>
                        </div>
                        <div class="progress mt-4">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                        </div>
                        <div class="mini-chart mt-auto">
                            <div class="chart-bar" style="height: 50%"></div>
                            <div class="chart-bar" style="height: 70%"></div>
                            <div class="chart-bar" style="height: 85%"></div>
                            <div class="chart-bar" style="height: 75%"></div>
                            <div class="chart-bar" style="height: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers -->
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card card-hover-info shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-muted text-uppercase fw-bold small">Customers</div>
                                <div class="stat-value text-info"><?= $uniqueCustomers ?></div>
                            </div>
                            <div class="icon-circle">
                                <i class="bi bi-people-fill text-info"></i>
                            </div>
                        </div>
                        <div class="progress mt-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 65%"></div>
                        </div>
                        <div class="mini-chart mt-auto">
                            <div class="chart-bar" style="height: 80%"></div>
                            <div class="chart-bar" style="height: 65%"></div>
                            <div class="chart-bar" style="height: 55%"></div>
                            <div class="chart-bar" style="height: 65%"></div>
                            <div class="chart-bar" style="height: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="col-xl-3 col-md-6">
                <div class="card stats-card card-hover-warning shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <div class="text-muted text-uppercase fw-bold small">Services</div>
                                <div class="stat-value text-warning"><?= count($service) ?></div>
                            </div>
                            <div class="icon-circle">
                                <i class="bi bi-bag text-warning"></i>
                            </div>
                        </div>
                        <div class="progress mt-4">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"></div>
                        </div>
                        <div class="mini-chart mt-auto">
                            <div class="chart-bar" style="height: 30%"></div>
                            <div class="chart-bar" style="height: 45%"></div>
                            <div class="chart-bar" style="height: 40%"></div>
                            <div class="chart-bar" style="height: 45%"></div>
                            <div class="chart-bar" style="height: 45%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Appointments Table -->
        <div class="container mt-5 mb-5 pb-5">
            <h4 class="mb-3">Today's Appointments</h4>

            <div class="appointments card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr class="appointments-header">
                                    <th>Customer</th>
                                    <th>Service</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($today)): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No appointments for today
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($today as $appointment): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($appointment['customer_name']) ?></td>
                                            <td>
                                                <?php
                                                $serviceName = '—';
                                                foreach ($service as $s) {
                                                    if ($s['id'] == $appointment['service_id']) {
                                                        $serviceName = $s['name'];
                                                        break;
                                                    }
                                                }
                                                echo htmlspecialchars($serviceName);
                                                ?>
                                            </td>
                                            <td><?= date('h:i A', strtotime($appointment['date_time'])) ?></td>
                                            <td>
                                                <?php
                                                $status = $appointment['status'];
                                                $badgeClass = match ($status) {
                                                    'pending'   => 'bg-warning text-dark',
                                                    'confirmed' => 'bg-success',
                                                    'completed' => 'bg-primary',
                                                    'cancelled' => 'bg-danger',
                                                    default     => 'bg-secondary'
                                                };
                                                ?>
                                                <span class="badge <?= $badgeClass ?>">
                                                    <?= ucfirst($status) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="container mt-4 mb-5 pb-5">
            <h4 class="mb-3">Quick Actions</h4>

            <div class="row g-3">
                <div class="col-md-4">
                    <a href="/dashboard-appointment" class="btn btn-primary w-100 py-3">
                        <i class="bi bi-calendar-plus me-2"></i>
                        Add Appointment
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/dashboard-service" class="btn btn-success w-100 py-3">
                        <i class="bi bi-briefcase me-2"></i>
                        Add Service
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="/dashboard-business" class="btn btn-info w-100 py-3 text-white">
                        <i class="bi bi-shop me-2"></i>
                        Add Business
                    </a>
                </div>
            </div>
        </div>

    <?php } else { ?>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <div class="mb-4">
                        <i class="bi bi-shop display-1 text-primary"></i>
                    </div>

                    <h2 class="fw-bold mb-3">You don't have a business yet</h2>

                    <p class="text-muted mb-4 fs-5">
                        To start managing appointments, customers and services, you need to create a business first.
                    </p>

                    <a href="/dashboard-business/create" class="btn btn-primary btn-lg px-5 py-3 mb-5">
                        <i class="bi bi-plus-lg me-2"></i>
                        Create Business
                    </a>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-calendar-check fs-2 text-primary mb-3"></i>
                                    <h5>Manage Appointments</h5>
                                    <p class="text-muted small mb-0">Easily manage your daily appointments</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-people fs-2 text-success mb-3"></i>
                                    <h5>Customers</h5>
                                    <p class="text-muted small mb-0">View your customers and their history</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <i class="bi bi-briefcase fs-2 text-warning mb-3"></i>
                                    <h5>Services</h5>
                                    <p class="text-muted small mb-0">Define and price your services</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
</div>