<div class="col-lg-3"></div>
<div class="col-lg-6">
    <form>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Número de solicitud:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->id}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Solicitante:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->nombres}} {{$consultarpqr->apellidos}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Número de identificación:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->cedula}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Tipo solicitud:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->tipo}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Fecha Solicitud:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->created_at, '%y-%m-%d'}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Estado solicitud:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->estado}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-6 col-form-label"><b>Tipo de respuesta:</b></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="{{$consultarpqr->respuesta}}" readonly>
                <br>
            </div>
        </div>
        <div class="form-group centered">
            <a type="button" class="btn btn-success" href="{{url('/consultapqrciudadano')}}">
                <span class="glyphicon glyphicon-repeat"></span> NUEVA CONSULTA
            </a><br><br>
            <a type="button" class="btn btn-info" href="{{url('/')}}">
                <span class="glyphicon glyphicon-log-out"></span> INICIO
            </a>
        </div>
    </form>
</div>