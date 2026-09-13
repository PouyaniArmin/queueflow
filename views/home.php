<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            QueueFlow
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary px-4" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">Book an Appointment</h1>
        <p class="text-muted">Choose a business, select a service and pick your preferred time.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <form method="post" action="/schedule">

                        <!-- Business -->
                        <div class="mb-4">
                            <label for="business" class="form-label fw-semibold">Select Business</label>
                            <select id="business" name="business_id" class="form-select" required>
                                <option selected disabled>Choose a business</option>
                                <?php foreach ($data['business'] as $bussiness) { ?>
                                    <option value="<?php echo $bussiness['id'] ?>"><?php echo $bussiness['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Service -->
                        <div class="mb-4">
                            <label for="service" class="form-label fw-semibold">Select Service</label>
                            <select id="service" name="service_id" class="form-select" required>
                                <option selected disabled>Choose a service</option>
                            </select>
                        </div>

                        <!-- Date -->
                        <div class="mb-4">
                            <label for="date" class="form-label fw-semibold">Select Date</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <!-- Time -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Available Time</label>
                            <div class="row g-2">
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time1" value="09:00" required>
                                    <label class="btn btn-outline-primary w-100" for="time1">09:00 AM</label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time2" value="10:00">
                                    <label class="btn btn-outline-primary w-100" for="time2">10:00 AM</label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time3" value="11:00">
                                    <label class="btn btn-outline-primary w-100" for="time3">11:00 AM</label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time4" value="14:00">
                                    <label class="btn btn-outline-primary w-100" for="time4">02:00 PM</label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time5" value="15:30">
                                    <label class="btn btn-outline-primary w-100" for="time5">03:30 PM</label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="radio" class="btn-check" name="time" id="time6" value="17:00">
                                    <label class="btn btn-outline-primary w-100" for="time6">05:00 PM</label>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Information -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label fw-semibold">Full Name</label>
                                <input type="text" id="name" name="customer_name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                <input type="text" id="phone" name="customer_phone" class="form-control" placeholder="Enter your phone" required>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="email" class="form-label fw-semibold">Email Address (optional)</label>
                                <input type="email" id="email" name="customer_email" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-4">
                            <label for="notes" class="form-label fw-semibold">Notes (optional)</label>
                            <textarea id="notes" name="notes" class="form-control" rows="2" placeholder="Any special request..."></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Book Appointment
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    // سرویس‌ها رو از PHP به جاوااسکریپت می‌دیم
    const allServices = <?php echo json_encode($data['service']); ?>;

    const businessSelect = document.getElementById('business');
    const serviceSelect = document.getElementById('service');

    businessSelect.addEventListener('change', function() {
        const selectedBusinessId = this.value;

        serviceSelect.innerHTML = '<option selected disabled>Choose a service</option>';

        const filteredServices = allServices.filter(function(service) {
            return service.business_id == selectedBusinessId;
        });

        filteredServices.forEach(function(service) {
            const option = document.createElement('option');
            option.value = service.id;
            option.textContent = service.name;
            serviceSelect.appendChild(option);
        });
    });
</script>