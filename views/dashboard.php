<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="container">
    <h2 class="text-center mb-4">Dashboard Statistics</h2>

    <div class="row g-4">
        <!-- Today's Appointments -->
        <div class="col-xl-3 col-md-6">
            <div class="card stats-card card-hover-primary shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-muted text-uppercase fw-bold small">Today's Appointments</div>
                            <div class="stat-value text-primary">12</div>
                            <div class="stat-change text-success">
                                <i class="fas fa-arrow-up trend-icon"></i>
                                <span>2 more than yesterday</span>
                            </div>
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
                            <div class="stat-value text-success">5</div>
                            <div class="stat-change text-danger">
                                <i class="fas fa-arrow-down trend-icon"></i>
                                <span>1 less than yesterday</span>
                            </div>
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
                            <div class="stat-value text-info">48</div>
                            <div class="stat-change text-success">
                                <i class="fas fa-arrow-up trend-icon"></i>
                                <span>3 more this week</span>
                            </div>
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
                            <div class="stat-value text-warning">8</div>
                            <div class="stat-change text-muted">
                                <i class="fas fa-minus trend-icon"></i>
                                <span>No change</span>
                            </div>
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
</div>