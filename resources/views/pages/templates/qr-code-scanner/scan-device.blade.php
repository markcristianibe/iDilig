<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Device</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('js/qr-scanner.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scan-device.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    @include('layouts.navbar')

    <div id="header" class="container bg-m_green_dark pt-5 pb-5">
        <div class="row">
            <div class="col-2">
                <button class="btn" onclick="window.location.href='/home'"><i class="material-icons text-light mt-2">arrow_back</i></button>
            </div>
            <div class="col">
                <h5 class="text-light my-3 text-center">Scan Device</h5>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

    <div id="body" class="container bg-m_green_secondary">
        <h1 class="text-center text-light mt-5">Scan QR Code</h1>

        <div id="reader">
            <div class="qr-shaded-region">
                <img src="{{asset('img/PLANTS_icon.png')}}" alt="">
            </div>
        </div>

        <p class="note mt-5 text-center text-light mx-5"><small>Place a barcode inside the camera view to scan it.</small></p>
    </div>

    <script>
        const html5Qrcode = new Html5Qrcode('reader');
        const qrCodeSuccessCallback = (decodedText, decodedResult)=>{
            if(decodedText){
                $.ajax({
                    type: "get",
                    url: "/user/register-device",
                    data: {
                        serial_no: decodedText
                    },
                    dataType: "text",
                    success: function (response) {
                        if(response == 'success'){
                            alert('Device Added Successfulty');
                            window.location.href = "/home";
                        }
                        else{
                            alert('Device is already registered.');
                            window.location.reload();
                        }
                    }
                });
                html5Qrcode.stop();
            }
        }
        const config = {fps:10, qrbox:{width:250, height:250}}
        html5Qrcode.start({facingMode:"environment"}, config,qrCodeSuccessCallback );
    </script>
</body>
</html>