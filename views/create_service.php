<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="w-100" style="max-width: 650px;">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h1 class="text-center mb-4">Add Service</h1>
                <form method="post" action="/dashboard-service/store">

                    <div class="row mb-3">
                        <label for="inputBusiness" class="col-sm-3 col-form-label">Business</label>
                        <div class="col-sm-9">
                            <select name="business_id" class="form-select" id="inputBusiness" required>
                                <option value="">-- Select Business --</option>
                                <!-- fake data - replace with database data -->
                                 <?php foreach($data as $key){?>
                                <option value="<?php echo $key['id']?>"><?php echo $key['name']?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-3 col-form-label">Service Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="inputName" maxlength="150" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputDuration" class="col-sm-3 col-form-label">Duration (minutes)</label>
                        <div class="col-sm-9">
                            <input type="number" name="duration_minutes" class="form-control" id="inputDuration" min="1" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPrice" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="number" step="0.01" min="0" name="price" class="form-control" id="inputPrice" value="0.00">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputCapacity" class="col-sm-3 col-form-label">Max Capacity</label>
                        <div class="col-sm-9">
                            <input type="number" name="max_capacity" class="form-control" id="inputCapacity" min="1" value="1">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Active</label>
                        <div class="col-sm-9">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="inputActive" checked>
                                <label class="form-check-label" for="inputActive">Active</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>