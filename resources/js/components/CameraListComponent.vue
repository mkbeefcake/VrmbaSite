<template>
    <ul class="nav" id="cameraList">
        <li v-for="camera in cameras" :id="camera.cameraId" v-on:click="onCameraSelected(camera)">
            <a>
                <i class='tim-icons icon-camera-18'></i><p>{{ camera.cameraName }}</p>
            </a>
        </li>            
    </ul>
</template>

<script>
import { mapState } from 'vuex'

export default {
    mounted() {
        console.log('CameraList-Component mounted.')
    },
    methods: {
        onCameraSelected: function(camera) {
            console.log('onCameraSelected is called');

            var cameras = document.getElementById("cameraList").getElementsByTagName("li");
            for (let i = 0; i < cameras.length; i++) {
                cameras[i].classList.remove('active');
                if (cameras[i].id == camera.cameraId)
                    cameras[i].classList.add('active');
            }    

            VueStore.commit('updateSelectedCameraId', camera.cameraId);

            /** Update information */
            selectedCameraId = camera.cameraId;
            var command = {
                type : 'get-info'
            };
            socket.emit('admin', selectedCameraId, JSON.stringify(command));
        }
    },
    computed: mapState({
        cameras: state => state.cameras.filter(item => item != null && item != undefined && item.cameraId != undefined),
    })
}
</script>
