<!-- Top admin menu -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <br>
            <a class="navbar-brand" id="console" href="{{ '/' }}"><h2><font color="#4285F4">F</font><font color="#FBBC05">i</font><font color="#34A853">l</font><font color="#EA4335">e</font>store</h2></a>

        </div>

        <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-right">
                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin') ? 'active' : '' ?>">
                        <a class="nav-link" href="{{ route('admin.index') }}"><i class="fas fa-database"></i> Информационная база<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/files') ? 'active' : '' ?>">
                        <a class="nav-link" href="{{ route('admin.filesdir') }}"><i class="far fa-folder-open"></i> Хранилище</a>
                    </li>
                    <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/admin/settings') ? 'active' : '' ?>">
                        <a class="nav-link" href="{{ route('admin.settings') }}"><i class="fas fa-cog"></i> Настройки (доп.инфо)</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>
<!-- Top admin menu -->
