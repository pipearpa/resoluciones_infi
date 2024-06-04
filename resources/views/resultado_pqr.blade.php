<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de PQR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #89c2d9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            position: relative;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        p {
            color: #666;
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        .field {
            margin-bottom: 10px;
        }

        .field label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .field span {
            color: #888;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            position: relative;
            width: fit-content;
            margin: 0 auto;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detalle de PQR</h1>
        <div class="field">
            <label>Numero Solicitud (ID):</label>
            <p>{{ $pqr->id }}</p>
        </div>
        <div class="field">
            <label>Tipo:</label>
            <p>{{ $pqr->tipo }}</p>
        </div>
        <div class="field">
            <label>Estado PQR:</label>
            <p>{{ $pqr->estado }}</p>
        </div>
        <div class="field">
            <label>Descripción:</label>
            <p>{{ $pqr->descripcion }}</p>
        </div>
        <div class="field">
            <label>Fecha de creación:</label>
            <p>{{ $pqr->created_at }}</p>
        </div>
        <div class="field">
            <label>Tipo Respuesta:</label>
            <p>{{ $pqr->respuesta }}</p>
        </div>
        <div class="field">
            <label>Nombre Del Solicitante:</label>
            <p>{{ $pqr->nombre }}</p>
        </div>
        <div class="field">
            <label>Tipo Documento:</label>
            <p>{{ $pqr->tipoDocumento }}</p>
        </div>
        <div class="field">
            <label>Numero Documento:</label>
            <p>{{ $pqr->numero_documento }}</p>
        </div>
        <div class="field">
            <label>Direccion:</label>
            <p>{{ $pqr->Direccion }}</p>
        </div>
        <div class="field">
            <label>Email:</label>
            <p>{{ $pqr->email }}</p>
        </div>
        <div class="field">
            <label>Numero Telefono:</label>
            <p>{{ $pqr->numeroTel }}</p>
        </div>
        <div class="field">
            <label>Numero Telefono:</label>
            <p>{{ $pqr->numeroTel }}</p>
        </div>
        <div class="field">
            <label>Archivos Adjuntos:</label>
            <p></p>
        </div>
        @if ($pqr->archivo)
            <a href="{{ route('download', $pqr->id) }}" class="btn btn-primary"
                style="width:fit-content; margin:0 auto;">
                <i class="fas fa-download"></i> Descargar archivo
            </a>
        @else
            <strong style="margin: 0 auto;"> Sin archivo adjunto </strong>
        @endif
        <br />

        <a href="http://localhost/pqr_infi_mzls/public" class="btn">Volver</a>
    </div>
</body>

</html>
