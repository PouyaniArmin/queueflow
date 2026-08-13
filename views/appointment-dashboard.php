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
                        <div class="fs-3 fw-bold mt-1">12</div>
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
                        <div class="fs-3 fw-bold mt-1 text-warning">5</div>
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
                        <div class="fs-3 fw-bold mt-1 text-success">7</div>
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
                        <div class="fs-3 fw-bold mt-1 text-info">18</div>
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

    <!-- Appointment Card 1 -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">

                    <!-- Left: Customer + Service -->
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="bi bi-person fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-semibold">Ali Rezaei</h5>
                            <div class="text-muted small">Haircut</div>
                        </div>
                    </div>

                    <!-- Center: Date & Time -->
                    <div class="text-center d-none d-md-block">
                        <div class="fw-semibold">Today</div>
                        <div class="text-muted small">10:00 AM</div>
                    </div>

                    <!-- Right: Status + Actions -->
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

                <!-- Mobile Date (only shows on small screens) -->
                <div class="d-md-none mt-3 text-muted small">
                    <i class="bi bi-calendar-event me-1"></i>
                    Today · 10:00 AM
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Card 2 -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">

                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="bi bi-person fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-semibold">Sara Mohammadi</h5>
                            <div class="text-muted small">Consultation</div>
                        </div>
                    </div>

                    <div class="text-center d-none d-md-block">
                        <div class="fw-semibold">Today</div>
                        <div class="text-muted small">11:30 AM</div>
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
                    Today · 11:30 AM
                </div>
            </div>
        </div>
    </div>

    <!-- Appointment Card 3 -->
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">

                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-info bg-opacity-10 text-info rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="bi bi-person fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-semibold">Reza Karimi</h5>
                            <div class="text-muted small">Hair Color</div>
                        </div>
                    </div>

                    <div class="text-center d-none d-md-block">
                        <div class="fw-semibold">Today</div>
                        <div class="text-muted small">01:00 PM</div>
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
                    Today · 01:00 PM
                </div>
            </div>
        </div>
    </div>

</div>