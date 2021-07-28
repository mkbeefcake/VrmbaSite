<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                   <a data-toggle="collapse" href="#collapsePTZControl">PTZ control</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onPanTiltVelocity">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pan/Tilt Velocity</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="1" v-on:click="onMemoryPreset">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Memory Preset</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapsePTZControl" class="card-body">
            <div class="form-group" id="pantilt-velocity-body" v-if="this.showPanTiltVelocity">
                <table class="table col-sm-8">
                    <tbody>
                        <tr>
                            <td width="30%">Pan Velocity </td>
                            <td width="40%"><custom-slider raising min="-1.0" max="1.0" step="0.1" v-model="panVelocityValue" key="sliderPanVelocity"/></td>
                        </tr>
                        <tr>
                            <td>Tilt Velocity</td>
                            <td><custom-slider raising min="-1.0" max="1.0" step="0.1" v-model="tiltVelocityValue" key="sliderTiltVelocity"/></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary" id="btnPanTiltVelocity" v-on:click="setPanTiltVelocity">Set Pan/Tilt Velocity</button>
            </div>
            <div class="form-group" id="show-memorypreset-body" v-if="this.showMemoryPreset">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Preset command</label>
                        <select class="form-control" id="presetCommand" v-model="presetCommandValue">
                            <option value="0">Reset</option>
                            <option value="1">Store Location</option>
                            <option value="2">Recall Location</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>Preset slot</label>
                        <select class="form-control" id="presetSlot" v-model="presetSlotValue">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnMemoryPreset" v-on:click="setMemoryPreset">Set Memory Preset</button>
            </div>
        </div>
    </div>
</template>

<script>
import CustomSlider from "vue-custom-range-slider";
import "vue-custom-range-slider/dist/vue-custom-range-slider.css";

export default {
    mounted() {
        console.log('PTZControl-Component mounted.')
    },
    components: {
        CustomSlider
    },
    data() {
        return {
            title: "Pan/Tilt Velocity",
            showPanTiltVelocity: true,
            showMemoryPreset: false,
            panVelocityValue: "0",
            tiltVelocityValue: "0",
            presetCommandValue: 0,
            presetSlotValue: 0,
        }
    },
    methods: {
        onPanTiltVelocity: function(event) {
            this.title = "Pan/Tilt Velocity";
            this.showPanTiltVelocity = true;
            this.showMemoryPreset = false;
        },
        onMemoryPreset: function(event) {
            this.title = "Memory Preset";
            this.showPanTiltVelocity = false;
            this.showMemoryPreset = true;
        },
        sendPTZControlCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setPanTiltVelocity: function(event) {
            debugger;
            var command = {
                type : 'set-pantilt-velocity',
                panVelocityValue: this.panVelocityValue,
                tiltVelocityValue: this.tiltVelocityValue,
            };

            this.sendPTZControlCommand(command);
            alert('Sent Pan/Tilt Velocity command');
        },
        setMemoryPreset: function(event) {
            debugger;
            var command = {
                type : 'set-memory-preset',
                presetCommandValue: this.presetCommandValue,
                presetSlotValue: this.presetSlotValue,
            };

            this.sendPTZControlCommand(command);
            alert('Sent Memory Preset command');
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