<template>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-4 text-left">
                <a data-toggle="collapse" href="#collapseLens">Lens</a>
                <h2 class="card-title">{{this.title}}</h2>
            </div>
            <div class="col-sm-8">
                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="auto">
                    <input type="radio" name="options" checked>
                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Auto</span>
                    <span class="d-block d-sm-none">
                        <i class="tim-icons icon-single-02"></i>
                    </span>
                </label>
                <label class="btn btn-sm btn-primary btn-simple active" id="1" v-on:click="focus">
                    <input type="radio" name="options">
                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Focus</span>
                    <span class="d-block d-sm-none">
                        <i class="tim-icons icon-single-02"></i>
                    </span>
                </label>
                <label class="btn btn-sm btn-primary btn-simple" id="2" v-on:click="aperture">
                    <input type="radio" class="d-none d-sm-none" name="options">
                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Aperture</span>
                    <span class="d-block d-sm-none">
                        <i class="tim-icons icon-gift-2"></i>
                    </span>
                </label>
                <label class="btn btn-sm btn-primary btn-simple" id="3" v-on:click="zoom">
                    <input type="radio" class="d-none" name="options">
                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Zoom</span>
                    <span class="d-block d-sm-none">
                        <i class="tim-icons icon-tap-02"></i>
                    </span>
                </label>
                <label class="btn btn-sm btn-primary btn-simple" id="4" v-on:click="stabilisation">
                    <input type="radio" class="d-none" name="options">
                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Stabilisation</span>
                    <span class="d-block d-sm-none">
                        <i class="tim-icons icon-tap-02"></i>
                    </span>
                </label>
                </div>
            </div>
        </div>
    </div>
    <div id="collapseLens" class="card-body">
        <div class="form-group" id="auto-focus-body" v-if="this.showAuto">
            <button class="btn btn-primary" id="btnAutoFocus" v-on:click="setAutoFocus">Auto Focus</button>
        </div>
        <div class="form-group" id="manual-focus-body" v-if="this.showManual">
            <div class="row">
                <div class="col-sm-6">
                    <label>Manual Focus</label>
                    <select class="form-control" id="relativeFocusType" v-on:change="onChangedLensType($event)">
                        <option value="MFT" checked>MFT Lens</option>
                        <option value="EF">EF Lens</option>
                    </select>
                    <custom-slider raising min="-1.0" max="1.0" step="0.05" v-if="this.isRelativeFocus" v-model="manualRelativeFocusValue" key="sliderRelativeFocus"/>
                    <custom-slider raising min="0.0" max="1.0" step="0.05" v-if="!this.isRelativeFocus" v-model="manualAbsoluteFocusValue" key="sliderAbsoluteFocus"/>
                </div>
            </div>
            <button class="btn btn-primary" id="btnManualFocus" v-on:click="setManualFocus">Manual Focus</button>
        </div>
        <div class="table-responsive ps" id="aperture-body" v-if="this.showAperture">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="30%">Aperture (f-stop) / IRIS </td>
                        <td width="40%"><custom-slider raising :values="fstopSliderValues" v-model="apertureFStop" key="sliderApertureFStop"/></td>
                        <td width="30%"><button class="btn btn-primary" id="btnSetFStop" v-on:click="setApertureFStop">Set</button></td>
                    </tr>
                    <tr>
                        <td>Aperture (normalised)</td>
                        <td><custom-slider raising min="0.0" max="1.0" step="0.01" v-model="apertureNormalised" key="sliderApertureNormalised"/></td>
                        <td><button class="btn btn-primary" id="btnSetNormalised" v-on:click="setApertureNormalised">Set</button></td>
                    </tr>
                    <tr>
                        <td>Aperture (ordinal)</td>
                        <td><custom-slider raising min="0.0" max="100" step="1" v-model="apertureOrdinal" key="sliderApertureOrdinal"/></td>
                        <td><button class="btn btn-primary" id="btnSetOrdinal" v-on:click="setApertureOrdinal">Set</button></td>
                    </tr>
                    <tr>
                        <td>Instantaneous auto Aperture</td>
                        <td>-</td>
                        <td><button class="btn btn-primary" id="btnAutoAperture" v-on:click="setAutoAperture">Set</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group" id="zoom-body" v-if="this.showZoom">
            <div class="row">
                <div class="col-sm-6">            
                    <label>Lens Type</label>
                    <select class="form-control" id="relativeFocusType" v-on:change="onChangedLensType($event)">
                        <option value="MFT" checked>MFT Lens</option>
                        <option value="EF">EF Lens</option>
                    </select>
                </div>
            </div>

            <table class="table mt-3">
                <tbody>
                    <tr>
                        <td width="30%">Set absolute zoom (mm)</td>
                        <td width="40%">
                            <custom-slider raising min="0" max="100" step="10" v-if="!this.isRelativeFocus" v-model="absoluteZoomMM" key="sliderAbsoluteZoom"/>
                            <custom-slider raising min="-20" max="20" step="5" v-if="this.isRelativeFocus" v-model="absoluteZoomMMForOffset" key="sliderRelativeZoom"/>
                        </td>
                        <td width="30%"><button class="btn btn-primary" id="btnSetZoomMM" v-on:click="setAbsoluteZoomMM" >Set</button></td>
                    </tr>
                    <tr>
                        <td>Set absolute zoom (normalised)</td>
                        <td>
                            <custom-slider raising min="0.0" max="1.0" step="0.01" v-if="!this.isRelativeFocus" v-model="absoluteZoomNormalised" key="sliderAbsoluteZoomNormalised"/>
                            <custom-slider raising min="-1.0" max="1.0" step="0.01" v-if="this.isRelativeFocus" v-model="absoluteZoomNormalisedForOffset" key="sliderAbsoluteZoomNormalisedForOffset"/>
                        </td>
                        <td><button class="btn btn-primary" id="btnZoomNormalised" v-on:click="setAbsoluteZoomNormalised">Set</button></td>
                    </tr>
                    <tr>
                        <td>Set continuous zoom (speed)</td>
                        <td>
                            <custom-slider raising min="0.0" max="1.0" step="0.01" v-if="!this.isRelativeFocus" v-model="continuousZoomSpeed" key="sliderContinuousZoomSpeed"/>
                            <custom-slider raising min="-1.0" max="1.0" step="0.01" v-if="this.isRelativeFocus" v-model="continuousZoomSpeedForOffset" key="sliderContinuousZoomSpeedForOffset"/>
                        </td>
                        <td><button class="btn btn-primary" id="btnZoomSpeed" v-on:click="setContinuousZoomSpeed">Set</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group" id="stabilisation-body" v-if="this.showStabilisation">
            <button class="btn btn-primary" id="btnEnableStabilisation" v-on:click="enableStabilisation">Enable</button>
            <button class="btn btn-primary" id="btnDisableStabilisation" v-on:click="disableStabilisation">Disable</button>
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
            title: 'Set Auto Focus',
            showAuto: true,
            showManual: false,
            showAperture: false,
            showZoom: false,
            showStabilisation: false,
            isRelativeFocus: false,
            manualRelativeFocusValue: "0",
            manualAbsoluteFocusValue: "0",
            // apertureFStop: "0",
            // apertureNormalised: "0",
            apertureOrdinal: "0",
            // absoluteZoomMM: "0",
            absoluteZoomMMForOffset: "0",
            absoluteZoomNormalised: "0",
            absoluteZoomNormalisedForOffset: "0",
            continuousZoomSpeed: "0",
            continuousZoomSpeedForOffset: "0",
            fstopSliderValues: [
                {
                    label: "1.2",
                    value: "1077"
                },
                {
                    label: "1.4",
                    value: "1988"
                },
                {
                    label: "1.8",
                    value: "3473"
                },
                {
                    label: "2.0",
                    value: "4096"
                },
                {
                    label: "2.2",
                    value: "4659"
                },
                {
                    label: "2.4",
                    value: "5173"
                },
                {
                    label: "2.6",
                    value: "5646"
                },
                {
                    label: "2.8",
                    value: "6084"
                },
                {
                    label: "3.2",
                    value: "6873"
                },
                {
                    label: "3.5",
                    value: "7402"
                },
                {
                    label: "3.7",
                    value: "7731"
                },
                {
                    label: "4.0",
                    value: "8192"
                },
                {
                    label: "4.5",
                    value: "8888"
                },
                {
                    label: "4.8",
                    value: "9269"
                },
                {
                    label: "5.2",
                    value: "9742"
                },
                {
                    label: "5.6",
                    value: "10180"
                },
                {
                    label: "6.2",
                    value: "10781"
                },
                {
                    label: "6.7",
                    value: "11240"
                },
                {
                    label: "7.3",
                    value: "11746"
                },
                {
                    label: "8.0",
                    value: "12288"
                },
                {
                    label: "8.7",
                    value: "12783"
                },
                {
                    label: "9.5",
                    value: "13303"
                },
                {
                    label: "10.0",
                    value: "13606"
                },
                {
                    label: "11.0",
                    value: "14169"
                },
                {
                    label: "12.0",
                    value: "14684"
                },
                {
                    label: "14.0",
                    value: "15594"
                },
                {
                    label: "15.0",
                    value: "16002"
                },
                {
                    label: "16.0",
                    value: "16384"
                },
                {
                    label: "17.0",
                    value: "16742"
                },
                {
                    label: "19.0",
                    value: "17399"
                },
                {
                    label: "21.0",
                    value: "17990"
                },
                {
                    label: "22.0",
                    value: "18265"
                },
            ]
        }
    },
    mounted() {
        console.log('Lens-Component mounted.')
    },
    computed: {
        apertureFStop: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.apertureFStop == undefined)
                    return "0";

                return selectedCamera.apertureFStop.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;

                selectedCamera.apertureFStop = parseInt(newValue);
            }
        },
        apertureNormalised: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.apertureNormalised == undefined)
                    return "0";
                
                return selectedCamera.apertureNormalised.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.apertureNormalised = parseInt(newValue);
            }
        },
        absoluteZoomMM: {
            get: function() {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined || selectedCamera.absoluteZoomMM == undefined)
                    return "0";

                return selectedCamera.absoluteZoomMM.toString();
            },
            set: function(newValue) {
                var selectedCamera = this.getSelectedCamera();
                if (selectedCamera == undefined)
                    return;
                
                selectedCamera.absoluteZoomMM = parseInt(newValue);
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
        auto: function(event) {
            this.title = "Set Auto Focus";
            this.showAuto = true;
            this.showManual = this.showAperture = this.showZoom = this.showStabilisation = false;
        },
        focus: function(event) {
            this.title = "Manual Focus";
            this.showManual = true;
            this.showAuto = this.showAperture = this.showZoom = this.showStabilisation = false;
        },
        aperture: function(event) {
            this.title = "Aperture";
            this.showAperture = true;
            this.showAuto = this.showManual = this.showZoom = this.showStabilisation = false;
        },
        zoom: function(event) {
            this.title = "Zoom";
            this.showZoom = true;
            this.showAuto = this.showManual = this.showAperture = this.showStabilisation = false;
        },
        stabilisation: function(event) {
            this.title = "Stabilisation";
            this.showStabilisation = true;
            this.showAuto = this.showManual = this.showAperture = this.showZoom = false;
        },
        onChangedLensType: function(event) {
            if (event.target.value == "MFT") {
                this.isRelativeFocus = false;
            }
            else if (event.target.value == "EF") {
                this.isRelativeFocus = true;
            }
        },
        sendLensCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setAutoFocus: function(event) {
            debugger;
            var command = {
                type : 'auto-focus'
            };
            
            this.sendLensCommand(command);
            alert('Sent Auto-Focus command');
        },
        setManualFocus: function(event) {
            debugger;
            var command = {
                type : 'manual-focus',
                manualFocus: this.isRelativeFocus == true ? this.manualRelativeFocusValue : this.manualAbsoluteFocusValue,
                isRelativeFocus: this.isRelativeFocus,
            };

            this.sendLensCommand(command);
            alert('Sent Manual-Focus command');
        },
        setApertureFStop: function(event) {
            debugger;
            var command = {
                type : 'aperture-fstop',
                apertureFStop: this.apertureFStop
            };

            this.sendLensCommand(command);
            alert('Sent Aperture (f-Stop) command');
        },
        setApertureNormalised: function(event) {
            debugger;
            var command = {
                type : 'aperture-normalised',
                apertureNormalised: this.apertureNormalised
            };

            this.sendLensCommand(command);
            alert('Sent Aperture (Normalised) command');
        },
        setApertureOrdinal: function(event) {
            debugger;
            var command = {
                type : 'aperture-ordinal',
                apertureOrdinal: this.apertureOrdinal
            };

            this.sendLensCommand(command);
            alert('Sent Aperture (Ordinal) command');
        },
        setAutoAperture: function(event) {
            debugger;
            var command = {
                type : 'auto-aperture',
            };

            this.sendLensCommand(command);
            alert('Sent Auto aperture command');
        },
        setAbsoluteZoomMM: function(event) {
            debugger;
            var command = {
                type : 'absolute-zoom-mm',
                absoluteZoomMM: this.isRelativeFocus == true ? this.absoluteZoomMMForOffset : this.absoluteZoomMM,
                isRelativeFocus: this.isRelativeFocus,
            };

            this.sendLensCommand(command);
            alert('Sent Absolute Zoom (mm) command');
        },
        setAbsoluteZoomNormalised: function(event) {
            debugger;
            var command = {
                type : 'absolute-zoom-normalised',
                absoluteZoomNormalised: this.isRelativeFocus == true? this.absoluteZoomNormalisedForOffset : this.absoluteZoomNormalised,
                isRelativeFocus: this.isRelativeFocus,
            };

            this.sendLensCommand(command);
            alert('Sent Absolute Zoom (Normalised) command');
        },
        setContinuousZoomSpeed: function(event) {
            debugger;
            var command = {
                type : 'continuous-zoom-speed',
                continuousZoomSpeed: this.isRelativeFocus == true ? this.continuousZoomSpeedForOffset : this.continuousZoomSpeed,
                isRelativeFocus: this.isRelativeFocus,
            };

            this.sendLensCommand(command);
            alert('Sent Continuous Zoom (Speed) command');
        },
        enableStabilisation: function(event) {
            debugger;
            var command = {
                type : 'enable-stabilisation',
            };

            this.sendLensCommand(command);
            alert('Sent Enable Stabilisation command');
        },
        disableStabilisation: function(event) {
            debugger;
            var command = {
                type : 'disable-stabilisation',
            };

            this.sendLensCommand(command);
            alert('Sent Disable Stabilisation command');
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