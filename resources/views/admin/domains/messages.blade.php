
@if(isset($error))
    <div class="container">
        <div class="row">
            <center>
            <div class="alert alert-danger col-12" id="FormAlert">
                {!!  $error !!}
            </div>
            </center>
        </div>
    </div>
@endif


@if(isset($success))
    <div class="container">
        <div class="row">
            <center>
            <div class="alert alert-success col-12" >
                {!! $success !!}
            </div>
            </center>
        </div>
    </div>

@endif
