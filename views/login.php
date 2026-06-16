<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="w-100" style="max-width: 650px;">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5">
                <h1 class="text-center mb-4">Login</h1>
                <form method="post" action="/login">
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <div>

                        <a class="mt-5" href="#">forget password?</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>