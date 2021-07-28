<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                    <a data-toggle="collapse" href="#collapseVideo">Video</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onVideoMode">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Video Mode</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="4" v-on:click="onRecordFormat">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Record Format</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="1" v-on:click="onWhiteBalance">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">White Balance</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="2" v-on:click="onRangeShapenISO">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Range / Sharpen / ISO</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="8" v-on:click="onShutter">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Shutter</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="3" v-on:click="onExposureForVideo">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Exposure</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="4" v-on:click="onDisplayLut">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Display LUT</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseVideo" class="card-body">
            <div class="form-group" id="video-mode-body" v-if="this.showVideoMode">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Frame rate</label>
                        <select class="form-control" id="frameRate" v-model="frameRate">
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>M rate</label>
                        <select class="form-control" id="mRate" v-model="mRate">
                            <option value="0">Regular</option>
                            <option value="1">M-rate</option>
                        </select>
                    </div>
                    <div class="col-sm-3">                    
                        <label>Dimensions</label>
                        <select class="form-control" id="dimensions" v-model="dimensions">
                            <option value="0">NTSC</option>
                            <option value="1">PAL</option>
                            <option value="2">720</option>
                            <option value="3">1080</option>
                            <option value="4">2k DCI</option>
                            <option value="5">2k16:9</option>
                            <option value="6">UHD</option>
                            <option value="7">3k Anamorphic</option>
                            <option value="8">4k DCI</option>
                            <option value="9">4k 16:9</option>
                            <option value="10">4.6k 2.4:1</option>
                            <option value="11">4.6k</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Interlaced</label>
                        <select class="form-control" id="interlaced" v-model="interlaced">
                            <option value="0">Progressive</option>
                            <option value="1">Interlaced</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnManualFocus" v-on:click="setVideoMode">Video Mode</button>
            </div>
            <div class="form-group" id="white-balance-body" v-if="this.showWhiteBalance">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Color Temperature</td>
                                <td width="60%"><custom-slider raising min="2500" max="10000" step="100" v-model="colorTemperature" key="sliderColorTemperature" /></td>
                            </tr>
                            <tr>
                                <td>Tint</td>
                                <td><custom-slider raising min="-50" max="50" step="1" v-model="tint" key="sliderTint"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnWhiteBalance" v-on:click="setWhiteBalance">White Balance</button>
                <button class="btn btn-primary" id="btnSetAutoWB" v-on:click="setAutoWB">Set Auto WB</button>
                <button class="btn btn-primary" id="btnRestoreAutoWB" v-on:click="restoreAutoWB">Restore Auto WB</button>
            </div>
            <div class="form-group" id="range-mode-body" v-if="this.showRangeShapenISO">                
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Range Mode</td>
                            <td width="40%">
                                <select class="form-control" id="rangeMode" v-model="rangeMode">
                                    <option value="0">Film</option>
                                    <option value="1">Video</option>
                                    <option value="2">Extended Video</option>
                                </select>
                            </td>
                            <td width="30%"><button class="btn btn-primary" id="btnRangeMode" v-on:click="setRangeMode">Set</button></td>
                        </tr>
                        <tr>
                            <td>Sharpen Level</td>
                            <td>
                                <select class="form-control" id="sharpenLevel" v-model="sharpenLevel">
                                    <option value="0">Off</option>
                                    <option value="1">Low</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                </select>
                            </td>
                            <td><button class="btn btn-primary" id="btnSharpenLevel" v-on:click="setSharpenLevel">Set</button></td>
                        </tr>
                        <tr>
                            <td>ISO value</td>
                            <td><custom-slider raising :values="isoSliderValues" v-model="isoValue" key="sliderISO"/></td>
                            <td><button class="btn btn-primary" id="btnISO" v-on:click="setISOValue">Set</button></td>
                        </tr>
                    </tbody>
                </table>                
            </div>
            <div class="form-group" id="record-format-body" v-if="this.showRecordFormat">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Frame rate</label>
                        <select class="form-control" id="recordFrameRate" v-model="recordFrameRate">
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Sensor Frame rate</label>
                        <select class="form-control" id="recordSensorFrameRate" v-model="recordSensorFrameRate">
                            <option value="0">0</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Frame Width</label>
                        <select class="form-control" id="flags" v-model="recordFrameWidth">
                            <option value=6144>6144</option>
                            <option value=5744>5744</option>
                            <option value=4096>4096</option>
                            <option value=3840>3840</option>
                            <option value=3728>3728</option>
                            <option value=2868>2868</option>
                            <option value=1920>1920</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Frame Height</label>
                        <select class="form-control" id="flags" v-model="recordFrameHeight">
                            <option value=3456>3456</option>
                            <option value=2560>2560</option>
                            <option value=3024>3024</option>
                            <option value=2106>2160</option>
                            <option value=3104>3104</option>
                            <option value=1512>1512</option>
                            <option value=1080>1080</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Flags</label>
                        <select class="form-control" id="flags" v-model="recordFlags">
                            <option value="0">file-M-rate</option>
                            <option value="1">sensor-M-rate</option>
                            <option value="2">sensor-off-speed</option>
                            <option value="3">interlaced</option>
                            <option value="4">windowed mode</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnRecordFormat" v-on:click="setRecordFormat">Record Format</button>
            </div>
            <div class="form-group" id="shutter-angle-body" v-if="this.showShutter">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Shutter Angle</td>
                            <td width="40%"><custom-slider raising min="100" max="36000" step="100" v-model="shutterAngleValue" key="sliderShutterAngle"/></td>
                            <td width="30%"><button class="btn btn-primary" id="btnShutterAngle" v-on:click="setShutterAngle">Set</button></td>
                        </tr>
                        <tr>
                            <td>Shutter Speed</td>
                            <td><custom-slider raising :values="shutterSpeedSliderValues" v-model="shutterSpeedValue" key="sliderShutterSpeed"/></td>
                            <td><button class="btn btn-primary" id="btnShutterSpeed" v-on:click="setShutterSpeed">Set</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="exposure-us-body" v-if="this.showExposureForVideo">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Exposure (us)</td>
                            <td width="40%"><custom-slider raising min="0" max="42000" step="1000" v-model="exposureUSValue" key="sliderExposureUS"/></td>
                            <td width="30%"><button class="btn btn-primary" id="btnExposureUS" v-on:click="setExposureUS">Set</button></td>
                        </tr>
                        <tr>
                            <td>Exposure (ordinal)</td>
                            <td><custom-slider raising min="0" max="20" step="1" v-model="exposureOrdinalValue" key="sliderExposureOrdinal"/></td>
                            <td><button class="btn btn-primary" id="btnExposureOrdinal" v-on:click="setExposureOrdinal">Set</button></td>
                        </tr>
                        <tr>
                            <td>Auto Exposure Mode</td>
                            <td><custom-slider raising :values="autoExposureSliderValues" v-model="autoExposureValue" key="sliderAutoExposure"/></td>
                            <td><button class="btn btn-primary" id="btnAutoExposure" v-on:click="setAutoExposure">Set</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="display-lut-body" v-if="this.showDisplayLUT">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Selected LUT</label>
                        <select class="form-control" id="selectedLUT" v-model="selectedLUT">
                            <option value="0">None</option>
                            <option value="1">Custom</option>
                            <option value="2">Film to video</option>
                            <option value="3">Film to Extended Video</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Status</label>
                        <select class="form-control" id="mRate" v-model="lutStatus">
                            <option value="0">Disabled</option>
                            <option value="1">Enabled</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnManualFocus" v-on:click="setDisplayLUT">Set Display LUT</button>
            </div>
        </div>
    </div>
</template>

<script>
import CustomSlider from "vue-custom-range-slider";
import "vue-custom-range-slider/dist/vue-custom-range-slider.css";

export default {
    components: {
        CustomSlider
    },
    data() {
        return {
            title: 'Set White Balance',
            showVideoMode: false,
            showRecordFormat: false,
            showWhiteBalance: true,
            showRangeShapenISO: false,
            showShapenLevel: false,
            showISO : false,
            showShutter: false,
            showExposureForVideo: false,
            showDisplayLUT: false,
            // colorTemperature: "2500",
            // tint: "0",
            // dimensions: 0,
            // frameRate:24, 
            // mRate:0,
            // interlaced:0,
            // sharpenLevel: 0,
            // recordFrameRate: 24,
            // recordSensorFrameRate: 0,
            // recordFrameWidth: 1920,
            // recordFrameHeight: 1080,
            // recordFlags: 0,
            // isoValue: "0",
            // rangeMode:0,
            // shutterSpeedValue : "24",
            // shutterAngleValue : "18000",
            exposureUSValue: "1000",
            exposureOrdinalValue: "1",
            // autoExposureValue: "0",
            // selectedLUT: "0",
            // lutStatus: "0",
            autoExposureSliderValues: [
                {
                    label: "Manual Trigger",
                    value: "0",
                },
                {
                    label: "Iris",
                    value: "1",                    
                },
                {
                    label: "Shutter",
                    value: "2",
                },
                {
                    label: "Iris + Shutter",
                    value: "3",
                },
                {
                    label: "Shutter + Iris",
                    value: "4",
                },
            ],
            isoSliderValues: [
                {
                    label: "1",
                    value: "0"
                },
                {
                    label: "2",
                    value: "1"
                },
                {
                    label: "4",
                    value: "2"
                },
                {
                    label: "8",
                    value: "3"
                },
                {
                    label: "16",
                    value: "4"
                },
                {
                    label: "32",
                    value: "5"
                },
                {
                    label: "64",
                    value: "6"
                },
                {
                    label: "128",
                    value: "7"
                },
            ],
            shutterSpeedSliderValues: [
                {
                    label: "24",
                    value: "24"
                },
                {
                    label: "25",
                    value: "25"
                },
                {
                    label: "30",
                    value: "30"
                },
                {
                    label: "50",
                    value: "50"
                },
                {
                    label: "60",
                    value: "60"
                },
                {
                    label: "100",
                    value: "100"
                },
                {
                    label: "125",
                    value: "125"
                },
                {
                    label: "200",
                    value: "200"
                },
                {
                    label: "250",
                    value: "250"
                },
                {
                    label: "500",
                    value: "500"
                },
                {
                    label: "1000",
                    value: "1000"
                },
                {
                    label: "2000",
                    value: "2000"
                },
            ]
        }
    },
    mounted() {
        console.log('RecordVideo-Component mounted.')
    },
    computed: {
        colorTemperature: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.colorTemperature == undefined)
                    return "2500";

                return selectedCamera.colorTemperature.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.colorTemperature = parseInt(newValue);
            }
        },
        tint: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.tint == undefined)
                    return "0";

                return selectedCamera.tint.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.tint = parseInt(newValue);
            }
        },
        dimensions: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.dimensions == undefined)
                    return 0;
                
                return selectedCamera.dimensions;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.dimensions = newValue;
            }
        },
        frameRate: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.frameRate == undefined)
                    return 24;

                return selectedCamera.frameRate;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.frameRate = newValue;
            }
        },
        mRate: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.mRate == undefined)
                    return 0;
                    
                return selectedCamera.mRate;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                    
                selectedCamera.mRate = newValue;
            }
        },
        interlaced: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.interlaced == undefined)
                    return 0;
                
                return selectedCamera.interlaced;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.interlaced = interlaced;
            }
        },
        shutterAngleValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.shutterAngleValue == undefined)
                    return "18000";                

                return selectedCamera.shutterAngleValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.shutterAngleValue = parseInt(newValue);
            }
        },
        shutterSpeedValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.shutterSpeedValue == undefined)
                    return "24";
                
                return selectedCamera.shutterSpeedValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.shutterSpeedValue = parseInt(newValue);
            }
        },
        selectedLUT: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.selectedLUT == undefined)
                    return "0";
                
                return selectedCamera.selectedLUT.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.selectedLUT = parseInt(newValue);
            }
        },
        lutStatus: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.lutStatus == undefined)
                    return "0";
                
                return selectedCamera.lutStatus.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.lutStatus = parseInt(newValue);
            }
        },
        sharpenLevel: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.sharpenLevel == undefined)
                    return 0;

                return selectedCamera.sharpenLevel;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.sharpenLevel = newValue;
            }
        },
        isoValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.isoValue == undefined)
                    return "0";

                return selectedCamera.isoValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.isoValue = parseInt(newValue);
            }
        },
        rangeMode: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.rangeMode == undefined)
                    return 0;

                return selectedCamera.rangeMode;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.rangeMode = newValue;
            }
        },
        recordFrameRate: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.recordFrameRate == undefined)
                    return 24;

                return selectedCamera.recordFrameRate;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.recordFrameRate = newValue;
            }
        },
        recordSensorFrameRate: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.recordSensorFrameRate == undefined)
                    return 0;

                return selectedCamera.recordSensorFrameRate;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.recordSensorFrameRate = newValue;
            }
        },
        recordFrameWidth: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.recordFrameWidth == undefined)
                    return 1920;

                return selectedCamera.recordFrameWidth;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.recordFrameWidth = newValue;
            }
        },
        recordFrameHeight: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.recordFrameHeight == undefined)
                    return 1080;

                return selectedCamera.recordFrameHeight;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.recordFrameHeight = newValue;
            }
        },
        recordFlags: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.recordFlags == undefined)
                    return 0;

                return selectedCamera.recordFlags;
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.recordFlags = newValue;
            }
        },
        autoExposureValue: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.autoExposureValue == undefined)
                    return "0";
                
                return selectedCamera.autoExposureValue.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.autoExposureValue = parseInt(newValue);
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
        onVideoMode: function(event) {
            this.title = "Set Video Mode";
            this.showVideoMode = true;
            this.showDisplayLUT = this.showRecordFormat = this.showWhiteBalance = this.showRangeShapenISO = this.showShutter = this.showExposureForVideo = false;
        },
        onWhiteBalance: function(event) {
            this.title = "Set White Balance";
            this.showWhiteBalance = true;
            this.showDisplayLUT = this.showVideoMode = this.showRecordFormat = this.showRangeShapenISO = this.showShutter = this.showExposureForVideo = false;
        },
        onRangeShapenISO: function(event) {
            this.title = "Set Range Mode / Sharpen Level / ISO";
            this.showRangeShapenISO = true;
            this.showDisplayLUT = this.showRecordFormat = this.showWhiteBalance = this.showVideoMode = this.showShutter = this.showExposureForVideo = false;
        },
        onRecordFormat: function(event) {
            this.title = "Set Record Format";
            this.showRecordFormat = true;
            this.showDisplayLUT = this.showVideoMode = this.showWhiteBalance = this.showRangeShapenISO = this.showShutter = this.showExposureForVideo = false;
        },
        onExposureForVideo: function(event) {
            this.title = "Set Exposure";
            this.showExposureForVideo = true;
            this.showDisplayLUT = this.showRecordFormat = this.showWhiteBalance = this.showRangeShapenISO = this.showShutter = this.showVideoMode = false;
        },
        onShutter: function(event) {
            this.title = "Set Shutter Angle & Speed";
            this.showShutter = true;
            this.showDisplayLUT = this.showRecordFormat = this.showWhiteBalance = this.showRangeShapenISO = this.showVideoMode = this.showExposureForVideo = false;
        },
        onDisplayLut: function(event) {
            this.title = "Display LUT";
            this.showDisplayLUT = true;
            this.showShutter = this.showRecordFormat = this.showWhiteBalance = this.showRangeShapenISO = this.showVideoMode = this.showExposureForVideo = false;
        },
        sendVideoCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setVideoMode: function(event) {
            debugger;
            var command = {
                type : 'video-mode',
                frameRate : this.frameRate,
                mRate : this.mRate,
                dimensions : this.dimensions,
                interlaced : this.interlaced
            };
            
            this.sendVideoCommand(command);
            alert('Sent Video Mode is called');
        },
        setWhiteBalance: function(event) {
            debugger;
            var command = {
                type : 'white-balance',
                colorTemperature : this.colorTemperature,
                tint : this.tint
            };
            
            this.sendVideoCommand(command);
            alert('Sent White Balance is called');
        },
        setRangeMode: function(event) {
            debugger;
            var command = {
                type : 'range-mode',
                rangeMode: this.rangeMode
            };
            
            this.sendVideoCommand(command);
            alert('Sent Range Mode is called');
        },
        setSharpenLevel: function(event) {
            debugger;
            var command = {
                type : 'sharpen-level',
                sharpenLevel: this.sharpenLevel
            };
            
            this.sendVideoCommand(command);
            alert('Sent Sharpen Level is called');
        },
        setRecordFormat: function(event) {
            debugger;
            var command = {
                type : 'record-format',
                recordFrameRate: this.recordFrameRate,
                recordSensorFrameRate: this.recordSensorFrameRate,
                recordFrameWidth: this.recordFrameWidth,
                recordFrameHeight: this.recordFrameHeight,
                recordFlags: this.recordFlags
            };
            
            this.sendVideoCommand(command);
            alert('Sent Record Format is called');
        },
        setISOValue: function(event) {
            debugger;
            var command = {
                type : 'set-iso',
                isoValue: parseInt(this.isoValue),
            };

            this.sendVideoCommand(command);
            alert('Sent ISO is called');
        },
        setShutterSpeed: function(event) {
            debugger;
            var command = {
                type : 'shutter-speed',
                shutterSpeedValue: parseInt(this.shutterSpeedValue),
            };

            this.sendVideoCommand(command);
            alert('Sent Shutter Speed is called');
        },
        setAutoWB: function(event) {
            debugger;
            var command = {
                type : 'set-auto-wb',
            };

            this.sendVideoCommand(command);
            alert('Sent Set Auto WB is called');
        },
        restoreAutoWB: function(event) {
            debugger;
            var command = {
                type : 'restore-auto-wb',
            };

            this.sendVideoCommand(command);
            alert('Sent Restore Auto WB is called');
        },
        setShutterAngle: function(event) {
            debugger;
            var command = {
                type : 'shutter-angle',
                shutterAngleValue: parseInt(this.shutterAngleValue),
            };

            this.sendVideoCommand(command);
            alert('Sent Shutter Angle is called');
        },
        setExposureUS: function(event) {
            debugger;
            var command = {
                type : 'exposure-us',
                exposureUSValue: parseInt(this.exposureUSValue),
            };

            this.sendVideoCommand(command);
            alert('Sent Exposure (us) is called');
        },
        setExposureOrdinal: function(event) {
            debugger;
            var command = {
                type : 'exposure-ordinal',
                exposureOrdinalValue: parseInt(this.exposureOrdinalValue),
            };

            this.sendVideoCommand(command);
            alert('Sent Exposure (ordinal) is called');
        },
        setAutoExposure: function(event) {
            debugger;
            var command = {
                type : 'auto-exposure',
                autoExposureValue: parseInt(this.autoExposureValue),
            };

            this.sendVideoCommand(command);
            alert('Sent Auto Exposure Mode is called');
        },
        setDisplayLUT: function(event) {
            debugger;
            var command = {
                type : 'display-lut',
                selectedLUT : this.selectedLUT,
                lutStatus: this.lutStatus,
            };

            this.sendVideoCommand(command);
            alert('Sent Display LUT mode is called');
        }
    }
}
</script>
<style scoped>
.slider {
    margin-top: 10px !important;
    margin-bottom: 0px !important;
}
</style>