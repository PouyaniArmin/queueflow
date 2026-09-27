<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
    }
    .dashboard-wrap {
      height: calc(100vh - 56px);
      display: flex;
      overflow: hidden;
    }
    .dashboard-sidebar {
      width: 220px;
      flex-shrink: 0;
      border-right: 1px solid #dee2e6;
      background: #fff;
      overflow-y: auto;
    }
    .dashboard-main {
      flex: 1;
      min-width: 0;
      min-height: 0;
      overflow-y: auto;
      padding: 1.5rem;
    }
    .img-profile {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <div class="d-flex align-items-center gap-2">
        <img src="images/noun-user-avatar-4035889.png" class="img-profile" alt="...">
        <a href="/logout" class="text-light">Logout</a>
      </div>
    </div>
  </nav>

  <div class="dashboard-wrap">

    <aside class="dashboard-sidebar">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <i class="bi bi-speedometer2"></i>
          <a href="/dashboard">Dashboard</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-shop"></i>
          <a href="/dashboard-business">Businesses</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-briefcase"></i>
          <a href="/dashboard-service">Services</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-calendar-check"></i>
          <a href="/dashboard-appointment">Appointments</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-people"></i>
          <a href="/dashboard-customers">Customers</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-gear"></i>
          <a href="/dashboard-settings">Settings</a>
        </li>
        <li class="list-group-item">
          <i class="bi bi-box-arrow-right"></i>
          <a href="/logout">Logout</a>
        </li>
      </ul>
    </aside>

    <main class="dashboard-main">
      {{content}}
    </main>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>