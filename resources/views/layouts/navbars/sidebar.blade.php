<div id="sidebar" class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('home') }}" class="simple-text logo-mini">{{ __('BM') }}</a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">{{ __('Camera List') }}</a>
        </div>
        <cameralist-component></cameralist-component>
    </div>
</div>
<script>

// function refreshCameraList(cameraList) {
//     var child = "";
//     $('#cameraList').empty();

//     for (const [key, value] of Object.entries(cameraList)) {
//         console.log(key, value);        

//         if (value != "admin") {
//             var cameraObject = JSON.parse(value);
//             $('#cameraList').append("<li id='" + key + "' onClick='onCameraSelected(this)'><a><i class='tim-icons icon-camera-18'></i><p>" + cameraObject.cameraName + "</p></a></li>");
//         }
//     }
// }

// function onCameraSelected(selected) {
//     var cameras = document.getElementById("cameraList").getElementsByTagName("li");
//     for (let i = 0; i < cameras.length; i++) {
//         cameras[i].classList.remove('active');
//     }    

//     selected.classList.add('active');

//     /** Update information */
//     selectedCameraId = selected.id;
//     var command = {
//         type : 'get-info'
//     };
//     socket.emit('admin', selectedCameraId, JSON.stringify(command));
// }

</script>
