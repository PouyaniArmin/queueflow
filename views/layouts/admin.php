<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="assest/css/main.css" rel="stylesheet">
</head>

<body class="overflow-hidden">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <div class="">
        <img src="images/noun-user-avatar-4035889.png" class="img-profile" alt="...">
        <a href="" class="text-light">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <aside class="col-2 vh-100 overflow-auto border-end">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <i class="bi bi-speedometer2"></i>
            <a href="">Dashboard</a>
          </li>
          <li class="list-group-item">
            <i class="bi bi-shop"></i>
            <a href="">Businesses</a>
          </li>
          <li class="list-group-item">
            <i class="bi bi-briefcase"></i>
            <a href="">Services</a>
          </li>
          <li class="list-group-item">
            <i class="bi bi-calendar-check"></i>
            <a href="">Appointments</a>
          </li>
          <li class="list-group-item">
            <i class="bi bi-people"></i>
            <a href="">Customers</a>
          </li>
          <li class="list-group-item">
            <i class="bi bi-gear"></i>
            <a href="">Settings</a>
          </li>

          <li class="list-group-item">
            <i class="bi bi-box-arrow-right"></i>
            <a href="">Logout</a>
          </li>
        </ul>
      </aside>
      <main class="col overflow-auto vh-100">
        {{content}}
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>