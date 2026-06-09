<?php
$countries = [
    ["code" => "+98",  "flag" => "🇮🇷", "name" => "Iran"],
    ["code" => "+93",  "flag" => "🇦🇫", "name" => "Afghanistan"],
    ["code" => "+90",  "flag" => "🇹🇷", "name" => "Turkey"],
    ["code" => "+971", "flag" => "🇦🇪", "name" => "UAE"],
    ["code" => "+44",  "flag" => "🇬🇧", "name" => "United Kingdom"],
    ["code" => "+1",   "flag" => "🇺🇸", "name" => "USA / Canada"],
    ["code" => "+966", "flag" => "🇸🇦", "name" => "Saudi Arabia"],
];
?>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="w-100" style="max-width: 650px;">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h1 class="text-center mb-4">Register</h1>
                <form method="post" action="register">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <div class="input-group">

                                <select name="country_code" class="form-select" style="max-width: 180px;">
                                    <?php foreach ($countries as $country): ?>
                                        <option value="<?= $country['code'] ?>"
                                            <?= $country['code'] === '+98' ? 'selected' : '' ?>>
                                            <?= $country['flag'] ?> <?= $country['code'] ?> (<?= $country['name'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <input type="tel"
                                    name="phone"
                                    class="form-control"
                                    placeholder="9123456789"
                                    required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
            </form>
        </div>
    </div>

</div>
</div>