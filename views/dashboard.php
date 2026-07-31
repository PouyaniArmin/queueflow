<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="">
            <img src="images/noun-user-avatar-4035889.png" class="img-profile" alt="...">
            <a href="">Logout</a>
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
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft Word including versions of Lorem Ipsum.</p>
            <?php }; ?>
        </main>
    </div>
</div>