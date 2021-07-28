<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <a data-toggle="collapse" href="#collapseOutput">Output</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <!-- <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onOverlayEnables">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Overlay enables</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label> -->
                    <label class="btn btn-sm btn-primary btn-simple active" id="2" v-on:click="onFrameGuidesStyle">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Frame guides style</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="5" v-on:click="onFrameGuidesOpacity">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Frame guides opacity</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="6" v-on:click="onOverlays">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Overlays</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseOutput" class="card-body">

            <!-- <div class="form-group" id="mic-level-body" v-if="this.showOverlayEnables">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Overlay enables</label>
                        <custom-slider raising min="0" max="1" step="0.05" v-model="micLevelValue" key="sliderMicLevel"/>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnMicLevel" v-on:click="setMicLevel">Set Mic Level</button>
            </div> -->
            <div class="form-group" id="frame-guides-style-body" v-if="this.showFrameGuidesStyle">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Frame guides style (Camera 3.x)</label>
                        <custom-slider raising min="0" max="8" step="1" v-model="frameGuidesStyle3xValue" key="sliderFrameGuideStyle3x"/>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnFrameGuideStyle3x" v-on:click="setFrameGuideStyle3x">Set Frame Guides Style</button>
            </div>
            <div class="form-group" id="frame-guides-opacity-body" v-if="this.showFrameGuidesOpacity">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Frame guides opacity (Camera 3.x)</label>
                        <custom-slider raising min="0" max="1" step="0.05" v-model="frameGuidesOpacity3xValue" key="sliderFrameOpacityStyle3x"/>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnFrameOpacityStyle3x" v-on:click="setFrameOpacityStyle3x">Set Frame Opacity Style</button>
            </div>
            <div class="form-group" id="overlays-body" v-if="this.showOverlays">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Frame guides Style</td>
                            <td width="40%">
                                <select class="form-control" id="frameGuideStyle4x" v-model="frameGuidesStyle4xValue">
                                    <option value="0">Off</option>
                                    <option value="1">2.4:1</option>
                                    <option value="2">2.39:1</option>
                                    <option value="3">2.35:1</option>
                                    <option value="4">1.85:1</option>
                                    <option value="5">16:9</option>
                                    <option value="6">14:9</option>
                                    <option value="7">4:3</option>
                                    <option value="8">2:1</option>
                                    <option value="9">4:5</option>
                                    <option value="10">1:1</option>
                                </select>
                            </td>
                            <td width="30%"></td>
                        </tr>
                        <tr>
                            <td>Frame guide opacity</td>
                            <td><custom-slider raising min="0" max="100" step="5" v-model="frameGuideOpacity4xValue" key="sliderFrameGuideOpacity4x"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Safe area percentage</td>
                            <td><custom-slider raising min="0" max="100" step="5" v-model="safeAreaPercentageValue" key="sliderSafeAreaPercentage"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Grid Style</td>
                            <td>
                                <select class="form-control" id="gridStyle" v-model="gridStyleValue">
                                    <option value="0">Off</option>
                                    <option value="1">display thirds</option>
                                    <option value="2">display cross hairs</option>
                                    <option value="3">cross hairs + thirds</option>
                                    <option value="4">center dot</option>
                                    <option value="5">center dot + thirds</option>
                                    <option value="6">center dot + cross hairs</option>
                                    <option value="7">center dot + cross hairs + thirds</option>
                                    <option value="8">display horizon</option>
                                    <option value="9">horizon + thirds</option>
                                    <option value="10">horizon + cross hairs</option>
                                    <option value="11">horizon + cross hairs + thirds</option>
                                    <option value="12">horizon + center dot</option>
                                    <option value="13">horizon + center dot + thirds</option>
                                    <option value="14">horizon + center dot + cross hairs</option>
                                    <option value="15">horizon + center dot + cross hairs + thirds</option>
                                </select>
                            </td>
                            <td><button class="btn btn-primary" id="btnInputLevel" v-on:click="setOverlays">Set</button></td>
                        </tr>
                    </tbody>
                </table>
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
            title: 'Frame guides Style',
            showOverlayEnables: false,
            showFrameGuidesStyle: true,
            showFrameGuidesOpacity: false,
            showOverlays: false,
            frameGuidesStyle3xValue: "0",
            frameGuidesOpacity3xValue: "0",
            frameGuidesStyle4xValue: "0",
            frameGuideOpacity4xValue: "0",
            safeAreaPercentageValue: "0",
            gridStyleValue: "0",
            inputLevelCh1Value: "0",
            phantomPowerValue: "true"
        }
    },
    mounted() {
        console.log('OutputParameter-Component mounted.')
    },
    methods: {
        onOverlayEnables: function(event) {
            this.title = "Overlay Enables";
            this.showOverlayEnables = true;
            this.showFrameGuidesStyle = this.showFrameGuidesOpacity = this.showOverlays = false;
        },
        onFrameGuidesStyle: function(event) {
            this.title = "Frame guides style (Camera 3.x)";
            this.showFrameGuidesStyle = true;
            this.showOverlayEnables = this.showFrameGuidesOpacity = this.showOverlays = false;
        },
        onFrameGuidesOpacity: function(event) {
            this.title = "Frame guides opacity (Camera 3.x)";
            this.showFrameGuidesOpacity = true;
            this.showOverlayEnables = this.showFrameGuidesStyle = this.showOverlays = false;
        },
        onOverlays: function(event) {
            this.title = "Overlays (replaces .1 and .2 above from Cameras 4.0)";
            this.showOverlays = true;
            this.showOverlayEnables = this.showFrameGuidesStyle = this.showFrameGuidesOpacity = false;
        },
        sendOutputCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setFrameGuideStyle3x: function(event) {
            debugger;
            var command = {
                type : 'frame-guide-style-3x',
                frameGuidesStyle3xValue : this.frameGuidesStyle3xValue,
            };
            
            this.sendOutputCommand(command);
            alert('Sent Frame Guide style (3.x) is called');
        },
        setFrameOpacityStyle3x: function(event) {
            debugger;
            var command = {
                type : 'frame-opacity-style-3x',
                frameGuidesOpacity3xValue : this.frameGuidesOpacity3xValue,
            };
            
            this.sendOutputCommand(command);
            alert('Sent Frame Guide Opacity (3.x) is called');
        },
        setOverlays: function(event) {
            debugger;
            var command = {
                type : 'frame-overlays',
                frameGuidesStyle4xValue: this.frameGuidesStyle4xValue,
                frameGuideOpacity4xValue: this.frameGuideOpacity4xValue,
                safeAreaPercentageValue: this.safeAreaPercentageValue,
                gridStyleValue: this.gridStyleValue,
            };
            
            this.sendOutputCommand(command);
            alert('Sent Overlays is called');
        },
    }
}
</script>
<style scoped>
.slider {
    margin-top: 10px !important;
    margin-bottom: 0px !important;
}
</style>