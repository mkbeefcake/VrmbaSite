@extends('layouts.app')

@section('content')
<div id="app">
    <div class="row">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <lens-component></lens-component>
                </div>
                <div class="col-12">
                    <recordvideo-component></recordvideo-component>
                </div>
                <div class="col-12">
                    <video-component></video-component>
                </div>
                <div class="col-12">
                    <display-component></display-component>
                </div>
                <div class="col-12">
                    <audio-component></audio-component>
                </div>
                <div class="col-12">
                    <output-component></output-component>
                </div>
                <div class="col-12">
                    <tally-component></tally-component>
                </div>
                <div class="col-12">
                    <configuration-component></configuration-component>
                </div>
                <div class="col-12">
                    <colorcorrection-component></colorcorrection-component>
                </div>
                <div class="col-12">
                    <ptzcontrol-component></ptzcontrol-component>
                </div>
                <!-- <div class="col-4">
                    <systeminfo-component></systeminfo-component>
                </div> -->
            </div>
        </div>
        <div class="col-xl-4">
            <systeminfo-component></systeminfo-component>
        </div>
    </div>
</div>
@endsection

@push('socketjs')
    <script src="{{ asset('black') }}/js/socket.io.js"></script>
    <script>
    var selectedCameraId = "";
    var socket;

    $(function(){
        socket = io("http://127.0.0.1:11000");
        
        socket.on('echo', function(msg) {
            socket.emit('peername', 'admin');
        });

        socket.on('devices-refresh', function(socketId, msg) {
            // remove un-existed camera list
            var cameraObjects = JSON.parse(msg);
            VueStore.commit('refreshCameraList', cameraObjects);
        });

        socket.on('device-added', function(socketId, msg) {
            console.log('device-added callback is called');
            if (socket.id == socketId) {
                console.log('This is me : ' + msg);
            }
            else {
                console.log('New device: ' + msg);

                // add new camera structure
                var cameraId = socketId;
                var cameraObject = JSON.parse(msg);
                VueStore.commit('addNewCamera', {cameraId, cameraObject});
            }
        });

        socket.on('device-removed', function(socketId, msg){
            console.log('device-removed callback is called');
            if (socket.id == socketId) {
                console.log('This is me');
            }
            else {
                console.log('Delete device: ' + msg);

                // remove existing camera structure
                var cameraId = socketId;
                var cameraObject = JSON.parse(msg);
                VueStore.commit('removeExistCamera', {cameraId, cameraObject});
            }
        });

        socket.on('status', function(socketId, msg) {
            console.log('status callback is called');

            if (socketId == selectedCameraId) 
                updateSelectedCamera(JSON.parse(msg));
        });

        socket.on('status-code', function(socketId, msg) {
            console.log('status-code callback is called');
            var cameraId = socketId;
            var statusObject = JSON.parse(msg);
            VueStore.commit('updateCameraStatusCode', { cameraId, statusObject });
        });

    })


    function updateSelectedCamera(statusObject) {

        if (statusObject.type == "get-info") {
            console.log("get-info is called");

            $('#ipAddress').text('IP Address : ' + statusObject.deviceInfo.ipAddress);
            $('#osType').text('Operating System: ' + statusObject.deviceInfo.osName);
        }
        else if (statusObject.type == "camera-status") {
            $('#cameraStatus').append(statusObject.cameraStatusMessage + "<br>");

        }
        else if (statusObject.type == "transport-mode") {
            console.log("transport-mode is called");

            $('#transportmode').text(statusObject.transportMode);
        }
        else if (statusObject.type == "remaining-time") {
            console.log("remaining-time is called");

            $('#remainingTime').text(statusObject.remainingTimeString);
        }
    }

    </script>
@endpush
