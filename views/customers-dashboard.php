<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Customers</h3>
        <p class="text-muted mb-0">Manage your customers and their appointment history</p>
    </div>
    <a href="#" class="btn btn-primary">
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
                        <div class="fs-3 fw-bold mt-1">48</div>
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
                        <div class="text-muted small text-uppercase fw-semibold">New This Week</div>
                        <div class="fs-3 fw-bold mt-1 text-success">6</div>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                        <i class="bi bi-person-plus fs-5"></i>
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
                        <div class="text-muted small text-uppercase fw-semibold">Active Today</div>
                        <div class="fs-3 fw-bold mt-1 text-info">12</div>
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
                        <div class="fs-3 fw-bold mt-1 text-muted">9</div>
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

    <!-- Customer Card 1 -->
    <div class="col-xl-4 col-lg-6">
        <div class="card border-0 shadow-sm h-100 business-card">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="business-icon" style="background-color: #e8f5e9; color: #2e7d32;">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">Ali Rezaei</h5>
                            <div class="text-muted small">+98 912 345 6789</div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>New Appointment</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                        <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                    </span>
                </div>

                <div class="mb-3 text-muted small">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        ali.rezaei@email.com
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2"></i>
                        Tehran, Iran
                    </div>
                </div>

                <div class="row text-center border-top pt-3 mt-auto">
                    <div class="col-4">
                        <div class="text-muted small">Total</div>
                        <div class="fw-bold">14</div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="text-muted small">This Month</div>
                        <div class="fw-bold">3</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Last Visit</div>
                        <div class="fw-bold small">2 days</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Card 2 -->
    <div class="col-xl-4 col-lg-6">
        <div class="card border-0 shadow-sm h-100 business-card">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="business-icon" style="background-color: #e3f2fd; color: #1565c0;">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">Sara Mohammadi</h5>
                            <div class="text-muted small">+98 935 111 2233</div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>New Appointment</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                        <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                    </span>
                </div>

                <div class="mb-3 text-muted small">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        sara.m@email.com
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2"></i>
                        Karaj, Iran
                    </div>
                </div>

                <div class="row text-center border-top pt-3 mt-auto">
                    <div class="col-4">
                        <div class="text-muted small">Total</div>
                        <div class="fw-bold">8</div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="text-muted small">This Month</div>
                        <div class="fw-bold">2</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Last Visit</div>
                        <div class="fw-bold small">5 days</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Card 3 -->
    <div class="col-xl-4 col-lg-6">
        <div class="card border-0 shadow-sm h-100 business-card">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="business-icon" style="background-color: #fff3e0; color: #ef6c00;">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">Reza Karimi</h5>
                            <div class="text-muted small">+98 921 777 8899</div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>New Appointment</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                        <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Inactive
                    </span>
                </div>

                <div class="mb-3 text-muted small">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        reza.k@email.com
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2"></i>
                        Isfahan, Iran
                    </div>
                </div>

                <div class="row text-center border-top pt-3 mt-auto">
                    <div class="col-4">
                        <div class="text-muted small">Total</div>
                        <div class="fw-bold">5</div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="text-muted small">This Month</div>
                        <div class="fw-bold">0</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Last Visit</div>
                        <div class="fw-bold small">32 days</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Card 4 -->
    <div class="col-xl-4 col-lg-6">
        <div class="card border-0 shadow-sm h-100 business-card">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="business-icon" style="background-color: #fce4ec; color: #c2185b;">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">Neda Ahmadi</h5>
                            <div class="text-muted small">+98 936 444 5566</div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>New Appointment</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                        <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                    </span>
                </div>

                <div class="mb-3 text-muted small">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        neda.ahmadi@email.com
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2"></i>
                        Tehran, Iran
                    </div>
                </div>

                <div class="row text-center border-top pt-3 mt-auto">
                    <div class="col-4">
                        <div class="text-muted small">Total</div>
                        <div class="fw-bold">11</div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="text-muted small">This Month</div>
                        <div class="fw-bold">4</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Last Visit</div>
                        <div class="fw-bold small">1 day</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Customer Card 5 -->
    <div class="col-xl-4 col-lg-6">
        <div class="card border-0 shadow-sm h-100 business-card">
            <div class="card-body p-4 d-flex flex-column">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="business-icon" style="background-color: #f3e5f5; color: #7b1fa2;">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-semibold">Hossein Jafari</h5>
                            <div class="text-muted small">+98 912 888 9990</div>
                        </div>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-light btn-sm rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-plus me-2"></i>New Appointment</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">
                        <i class="bi bi-circle-fill me-1" style="font-size:8px;"></i> Active
                    </span>
                </div>

                <div class="mb-3 text-muted small">
                    <div class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope me-2"></i>
                        hossein.j@email.com
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt me-2"></i>
                        Mashhad, Iran
                    </div>
                </div>

                <div class="row text-center border-top pt-3 mt-auto">
                    <div class="col-4">
                        <div class="text-muted small">Total</div>
                        <div class="fw-bold">7</div>
                    </div>
                    <div class="col-4 border-start border-end">
                        <div class="text-muted small">This Month</div>
                        <div class="fw-bold">1</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Last Visit</div>
                        <div class="fw-bold small">12 days</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>