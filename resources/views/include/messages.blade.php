<?php

// messages (!)

// Errors
?>

<!--
<example-component></example-component>
-->

@if($errors->any())
<center>
<div class="alert alert-danger col-5" id="FormAlert">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
</center>
@endif

<?php
// --------------------------

// Success
?>

@if(isset($success))
<center>
<div class="alert alert-success col-5" >
        {{ $success }} на e-mail: <b>{{ $email  }}</b>
    <br><br>
    <a href="{{ route('home') }}">
    <button class="btn btn-info">Отправить ещё один файл</button>
    </a>
</div>
</center>

@endif
