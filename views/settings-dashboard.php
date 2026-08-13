<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-1">Settings</h3>
        <p class="text-muted mb-0">Manage your account and preferences</p>
    </div>
</div>


<div class="row g-4">

    <!-- Profile Settings -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="mb-4 fw-semibold">
                    <i class="bi bi-person-circle me-2 text-primary"></i>
                    Profile
                </h5>

                <div class="mb-3">
                    <label class="form-label small text-muted">Full Name</label>
                    <input type="text" class="form-control" value="Armin Pouyani">
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">Email</label>
                    <input type="email" class="form-control" value="armin@example.com">
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">Phone</label>
                    <input type="text" class="form-control" value="+98 912 000 0000">
                </div>

                <button class="btn btn-primary btn-sm mt-2">
                    <i class="bi bi-check-lg me-1"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div>


    <!-- Change Password -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="mb-4 fw-semibold">
                    <i class="bi bi-shield-lock me-2 text-primary"></i>
                    Change Password
                </h5>

                <div class="mb-3">
                    <label class="form-label small text-muted">Current Password</label>
                    <input type="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">New Password</label>
                    <input type="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">Confirm New Password</label>
                    <input type="password" class="form-control">
                </div>

                <button class="btn btn-primary btn-sm mt-2">
                    <i class="bi bi-key me-1"></i>
                    Update Password
                </button>
            </div>
        </div>
    </div>


    <!-- Notifications -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="mb-4 fw-semibold">
                    <i class="bi bi-bell me-2 text-primary"></i>
                    Notifications
                </h5>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                    <label class="form-check-label" for="emailNotif">
                        Email notifications
                    </label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="smsNotif" checked>
                    <label class="form-check-label" for="smsNotif">
                        SMS notifications
                    </label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="appointmentRemind">
                    <label class="form-check-label" for="appointmentRemind">
                        Appointment reminders
                    </label>
                </div>

                <button class="btn btn-primary btn-sm mt-2">
                    <i class="bi bi-check-lg me-1"></i>
                    Save Preferences
                </button>
            </div>
        </div>
    </div>


    <!-- General / Danger Zone -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <h5 class="mb-4 fw-semibold">
                    <i class="bi bi-gear me-2 text-primary"></i>
                    General
                </h5>

                <div class="mb-3">
                    <label class="form-label small text-muted">Language</label>
                    <select class="form-select">
                        <option selected>English</option>
                        <option>Persian (فارسی)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label small text-muted">Timezone</label>
                    <select class="form-select">
                        <option selected>Asia/Tehran (UTC+3:30)</option>
                        <option>UTC</option>
                    </select>
                </div>

                <hr>

                <div class="mt-3">
                    <h6 class="text-danger mb-3">Danger Zone</h6>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>