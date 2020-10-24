
<br>
<center>Текущий пользователь: <b>{{ Auth::user()->name }}</b>, e-mail: {{ Auth::user()->email }}
<br>
    <font size="2">Последний вход: <b>{{ Auth::user() -> last_login_at }}</b>, IP: <b>{{ Auth::user() -> last_login_ip }}</b>
<br>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Выход из панели администрирования</font>
    </a>

</center>

<center><table width="40%" border="0"><tr width="100%"><td width="100%" align="center"><hr></td></tr></table></center>


<center><font size="1"><b>Разработано для MODUL.OOO</b><br>Created by <a href="http://best-itpro.ru" target="_blank">Best IT Pro</a> © 2017 - <?= date('Y', time()) ?>
        <br><b><a href="{{ route('versions') }}"><font color="#000">Version 3.2</font></a></b></font></center><br>



</div> <!-- app -->


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script src="/js/sweetalert.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
