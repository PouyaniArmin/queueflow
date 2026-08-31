<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            Appointment
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">

                <li class="nav-item">
                    <a class="nav-link" href="/login">
                        Login
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary px-4" href="/register">
                        Register
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>


<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Book an Appointment</h1>
        <p class="text-muted">
            Select a service, date and available time.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <!-- Service -->
                    <div class="mb-4">
                        <label for="service" class="form-label fw-semibold">
                            Select Service
                        </label>

                        <select id="service" name="service" class="form-select">
                            <option selected disabled>Choose a service</option>
                            <option value="consultation">Consultation</option>
                            <option value="meeting">Meeting</option>
                            <option value="support">Support</option>
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mb-4">
                        <label for="date" class="form-label fw-semibold">
                            Select Date
                        </label>

                        <input
                            type="date"
                            id="date"
                            name="date"
                            class="form-control"
                        >
                    </div>

                    <!-- Time -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            Available Time
                        </label>

                        <div class="row g-2">

                            <div class="col-6 col-md-3">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="time"
                                    id="time1"
                                    value="09:00"
                                >
                                <label
                                    class="btn btn-outline-primary w-100"
                                    for="time1"
                                >
                                    09:00 AM
                                </label>
                            </div>

                            <div class="col-6 col-md-3">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="time"
                                    id="time2"
                                    value="10:00"
                                >
                                <label
                                    class="btn btn-outline-primary w-100"
                                    for="time2"
                                >
                                    10:00 AM
                                </label>
                            </div>

                            <div class="col-6 col-md-3">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="time"
                                    id="time3"
                                    value="11:00"
                                >
                                <label
                                    class="btn btn-outline-primary w-100"
                                    for="time3"
                                >
                                    11:00 AM
                                </label>
                            </div>

                            <div class="col-6 col-md-3">
                                <input
                                    type="radio"
                                    class="btn-check"
                                    name="time"
                                    id="time4"
                                    value="14:00"
                                >
                                <label
                                    class="btn btn-outline-primary w-100"
                                    for="time4"
                                >
                                    02:00 PM
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Customer Information -->
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control"
                                placeholder="Enter your name"
                            >
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                            >
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Book Appointment
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>