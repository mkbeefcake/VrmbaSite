<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                   <a data-toggle="collapse" href="#collapseMedia">Media</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onRecord">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Record</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="1" v-on:click="onCodec">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Codec</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="2" v-on:click="onTransportMode">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Transport mode</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="2" v-on:click="onPlaybackControl">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Playback Control</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseMedia" class="card-body">
            <div class="form-group" id="show-record-body" v-if="this.showRecord">
                <button class="btn btn-primary" id="btnRecord" v-on:click="setRecord">Record</button>
                <button class="btn btn-primary" id="btnStop" v-on:click="setStop">Stop</button>
                <div class="form-group">
                    <label id="transportmode"></label>
                    <label id="remainingTime"></label>
                </div>
            </div>
            <div class="form-group" id="show-codec-body" v-if="this.showCodec">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Basic codec</label>
                        <select class="form-control" id="basicCodec" v-model="basicCodecValue" v-on:change="onChangedBasicCodec($event)">
                            <option value="0">CinemaDNG</option>
                            <option value="1">DNxHD</option>
                            <option value="2">ProRes</option>
                            <option value="3"> Blackmagic RAW</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Code Variant</label>
                        <select class="form-control" id="codeVariant" v-model="codeVariantValue">
                            <option v-for="(item, key) in codeVariantArray" :value="item">
                                {{key}}
                            </option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnCodec" v-on:click="setCodec">Set Codec</button>
            </div>
            <div class="form-group" id="show-transportmode-body" v-if="this.showTransportMode">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Mode</label>
                        <select class="form-control" id="transportMode" v-model="transportModeValue">
                            <option value="0">Preview</option>
                            <option value="1">Play</option>
                            <option value="2">Record</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Speed</label>
                        <select class="form-control" id="transportSpeed" v-model="transportSpeedValue">
                            <option value="-10">-10</option>
                            <option value="-5">-5</option>
                            <option value="0" selected>0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Flags</label>
                        <select class="form-control" id="transportFlags" v-model="transportFlagsValue">
                            <option value="1">Loop</option>
                            <option value="2">Play all</option>
                            <option value="32">Disk1 active</option>
                            <option value="64">Disk2 active</option>
                            <option value="128">Time-lapse recording</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Slot 1 storage medium</label>
                        <select class="form-control" id="slot1Storage" v-model="slot1StorageValue">
                            <option value="0">CFast card</option>
                            <option value="1">SD</option>
                            <option value="2">SSD Recorder</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Slot 2 storage medium</label>
                        <select class="form-control" id="slot2Storage" v-model="slot2StorageValue">
                            <option value="0">CFast card</option>
                            <option value="2">SD</option>
                            <option value="32">SSD Recorder</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnTransportMode" v-on:click="setTransportMode">Set Transport Mode</button>
            </div>
            <div class="form-group" id="show-playbackcontrol-body" v-if="this.showPlaybackControl">
                <button class="btn btn-primary" id="playbackPrevious" v-on:click="goPlaybackPrevious"><< Prev </button>
                <button class="btn btn-primary" id="playbackNext" v-on:click="goPlaybackNext">Next >></button>
            </div>
        </div>
    </div>
</template>

<script>
import CustomSlider from "vue-custom-range-slider";
import "vue-custom-range-slider/dist/vue-custom-range-slider.css";

export default {
    mounted() {
        console.log('RecordVideo-Component mounted.')
    },
    components: {
        CustomSlider
    },
    data() {
        return {
            title: "Record",
            showRecord : true,
            showCodec : false,
            showTransportMode : false,
            showPlaybackControl : false,
            // basicCodecValue: "0",
            // codeVariantValue: "0",
            codeVariantArray: {
                "uncompressed" : "0",
                "lossy 3:1" : "1",
                "lossy 4:1" : "2",
            },
            // transportModeValue: "0",
            // transportSpeedValue: "0",
            // transportFlagsValue: "1",
            // slot1StorageValue: "0",
            // slot2StorageValue: "0",
        }
    },
    computed: {
        transportModeValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.transportModeValue == undefined)
                    return "0";

                return selectedCamera.transportModeValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.transportModeValue = parseInt(newValue);
            }
        },
        transportSpeedValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.transportSpeedValue == undefined)
                    return "0";

                return selectedCamera.transportSpeedValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.transportSpeedValue = parseInt(newValue);
            }
        },
        transportFlagsValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.transportFlagsValue == undefined)
                    return "1";
                
                return selectedCamera.transportFlagsValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.transportFlagsValue = parseInt(newValue);
            }
        },
        slot1StorageValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.slot1StorageValue == undefined)
                    return "0";

                return selectedCamera.slot1StorageValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.slot1StorageValue = parseInt(newValue);
            }
        },
        slot2StorageValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.slot2StorageValue == undefined) 
                    return "0";

                return selectedCamera.slot2StorageValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.slot2StorageValue = parseInt(newValue);
            }
        },
        basicCodecValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.basicCodecValue == undefined)
                    return "0";

                return selectedCamera.basicCodecValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.basicCodecValue = parseInt(newValue);
            }
        },
        codeVariantValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.codeVariantValue == undefined)
                    return "0";

                return selectedCamera.codeVariantValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return "0";

                selectedCamera.codeVariantValue = parseInt(newValue);
            }
        }
    },
    methods: {
        getSelectedCamera: function() {
            var selectedCameraId = this.$store.state.selectedCameraId;
            if (selectedCameraId == "")
                return undefined;
            
            var cameras = this.$store.state.cameras;
            var index = cameras.findIndex(_ => _.cameraId === selectedCameraId);
            if (index == -1)
                return undefined;

            return cameras[index];
        },
        onRecord: function(event) {
            this.title = "Record";
            this.showRecord = true;
            this.showCodec = this.showTransportMode = this.showPlaybackControl = false;
        },
        onCodec: function(event) {
            this.title = "Codec";
            this.showCodec = true;
            this.showRecord = this.showTransportMode = this.showPlaybackControl = false;
        },
        onTransportMode: function(event) {
            this.title = "Transport Mode";
            this.showTransportMode = true;
            this.showRecord = this.showCodec = this.showPlaybackControl = false;
        },
        onPlaybackControl: function(event) {
            this.title = "Playback Control";
            this.showPlaybackControl = true;
            this.showRecord = this.showCodec = this.showTransportMode = false;
        },
        onChangedBasicCodec: function(event) {
            debugger;
            if (event.target.value == "0") {
                this.codeVariantArray = {
                    "uncompressed" : "0",
                    "lossy 3:1" : "1",
                    "lossy 4:1" : "2",
                };
            }
            else if (event.target.value == "1") {
                this.codeVariantArray = {};
            }
            else if (event.target.value == "2") {
                this.codeVariantArray = {
                    "HQ" : "0",
                    "422" : "1",
                    "LT" : "2",
                    "Proxy" : "3",
                    "444" : "4",
                    "444XQ" : "5" 
                };
            }
            else if (event.target.value == "3") {
                this.codeVariantArray = {
                    "Q0" : "0",
                    "Q5" : "1",
                    "3:1" : "2",
                    "5:1" : "3",
                    "8:1" : "4",
                    "12:1" : "5"
                };
            }
        },
        sendTransportModeCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setRecord: function(event) {
            debugger;
            var command = {
                type : 'record'
            };

            this.sendTransportModeCommand(command);
            alert('Sent Record command');
        },
        setStop: function(event) {
            debugger;
            var command = {
                type : 'preview'
            };

            this.sendTransportModeCommand(command);
            alert('Sent Stop command');
        },
        setCodec: function(event) {
            debugger;
            var command = {
                type : 'set-codec',
                basicCodecValue: this.basicCodecValue,
                codeVariantValue: this.codeVariantValue,                
            };

            this.sendTransportModeCommand(command);
            alert('Sent Codec command');
        },
        setTransportMode: function(event) {
            debugger;
            var command = {
                type : 'set-transportmode',
                transportModeValue: this.transportModeValue,
                transportSpeedValue: this.transportSpeedValue,
                transportFlagsValue: this.transportFlagsValue,
                slot1StorageValue: this.slot1StorageValue,                                                
                slot2StorageValue: this.slot2StorageValue,
            };

            this.sendTransportModeCommand(command);
            alert('Sent TransportMode command');
        },
        goPlaybackPrevious: function(event) {
            debugger;
            var command = {
                type : 'playback-previous',
            };

            this.sendTransportModeCommand(command);
            alert('Sent Previous command');
        },
        goPlaybackNext: function(event) {
            debugger;
            var command = {
                type : 'playback-next',
            };

            this.sendTransportModeCommand(command);
            alert('Sent Next command');
        },
    }
}
</script>
