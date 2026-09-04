<?php
$timezones = [
    'Asia/Tehran' => 'Asia/Tehran',
    'Asia/Dubai' => 'Asia/Dubai',
    'Europe/Istanbul' => 'Europe/Istanbul',
    'Europe/London' => 'Europe/London',
    'America/New_York' => 'America/New_York',
    'America/Los_Angeles' => 'America/Los_Angeles',
];
?>

<div class="d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="w-100" style="max-width: 700px;">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">

                <h1 class="text-center mb-4">Create Business</h1>

                <form method="post" action="/dashboard-business/create-business">

                    <!-- Business Name -->
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-3 col-form-label">
                            Business Name
                        </label>

                        <div class="col-sm-9">
                            <input
                                type="text"
                                name="name"
                                id="inputName"
                                class="form-control"
                                maxlength="150"
                                required
                            >
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="row mb-3">
                        <label for="inputAddress" class="col-sm-3 col-form-label">
                            Address
                        </label>

                        <div class="col-sm-9">
                            <textarea
                                name="address"
                                id="inputAddress"
                                class="form-control"
                                rows="3"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="row mb-3">
                        <label for="inputPhone" class="col-sm-3 col-form-label">
                            Phone
                        </label>

                        <div class="col-sm-9">
                            <input
                                type="tel"
                                name="phone"
                                id="inputPhone"
                                class="form-control"
                                maxlength="20"
                                placeholder="9123456789"
                            >
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="row mb-3">
                        <label for="inputDescription" class="col-sm-3 col-form-label">
                            Description
                        </label>

                        <div class="col-sm-9">
                            <textarea
                                name="description"
                                id="inputDescription"
                                class="form-control"
                                rows="4"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Timezone -->
                    <div class="row mb-3">
                        <label for="inputTimezone" class="col-sm-3 col-form-label">
                            Timezone
                        </label>

                        <div class="col-sm-9">
                            <select
                                name="timezone"
                                id="inputTimezone"
                                class="form-select"
                            >
                                <?php foreach ($timezones as $value => $label): ?>
                                    <option
                                        value="<?= htmlspecialchars($value) ?>"
                                        <?= $value === 'Asia/Tehran' ? 'selected' : '' ?>
                                    >
                                        <?= htmlspecialchars($label) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Active -->
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Status
                        </label>

                        <div class="col-sm-9">
                            <div class="form-check form-switch mt-2">
                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    class="form-check-input"
                                    id="inputActive"
                                    checked
                                >

                                <label
                                    class="form-check-label"
                                    for="inputActive"
                                >
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Create Business
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>