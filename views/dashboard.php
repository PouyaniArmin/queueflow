<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="container">
    <div class="pt-4 text-center">
        <h2 class="text-center mb-4">Dashboard Statistics</h2>
    </div>
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
    <!-- table -->
    <div class="container mt-5 mb-5 pb-5"">
        <h4 class="mb-3">Today's Appointments</h4>

        <div class="appointments card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 ">
                        <thead class="table-light">
                            <tr class="appointments-header">
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ali Rezaei</td>
                                <td>Haircut</td>
                                <td>10:00 AM</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Sara Mohammadi</td>
                                <td>Consultation</td>
                                <td>11:30 AM</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                            </tr>
                            <tr>
                                <td>Reza Karimi</td>
                                <td>Hair Color</td>
                                <td>01:00 PM</td>
                                <td><span class="badge bg-primary">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Neda Ahmadi</td>
                                <td>Manicure</td>
                                <td>03:15 PM</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Hossein Jafari</td>
                                <td>Beard Trim</td>
                                <td>05:00 PM</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- end table -->
     <!-- quick acess button -->
      <div class="container mt-4 mb-5 pb-5">
    <h4 class="mb-3">Quick Actions</h4>

    <div class="row g-3">
        <div class="col-md-4">
            <a href="#" class="btn btn-primary w-100 py-3">
                <i class="bi bi-calendar-plus me-2"></i>
                Add Appointment
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="btn btn-success w-100 py-3">
                <i class="bi bi-briefcase me-2"></i>
                Add Service
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="btn btn-info w-100 py-3 text-white">
                <i class="bi bi-shop me-2"></i>
                Add Business
            </a>
        </div>
    </div>
</div>
</div>