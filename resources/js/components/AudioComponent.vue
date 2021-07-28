<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                    <a data-toggle="collapse" href="#collapseAudio">Audio</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onMicLevel">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Mic</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="2" v-on:click="onHeadphoneSpeaker">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Headphone / Speaker</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="5" v-on:click="onInput">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Input</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="6" v-on:click="onPhantomPower">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Phantom Power</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseAudio" class="card-body">

            <div class="form-group" id="mic-level-body" v-if="this.showMicLevel">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Mic Level</label>
                        <custom-slider raising min="0" max="1" step="0.05" v-model="micLevelValue" key="sliderMicLevel"/>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnMicLevel" v-on:click="setMicLevel">Set Mic Level</button>
            </div>
            <div class="form-group" id="headphone-body" v-if="this.showHeadphoneSpeaker">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Headphone Level</td>
                            <td width="40%"><custom-slider raising min="0" max="1" step="0.05" v-model="headphoneLevelValue" key="sliderHeadphoneLevel"/></td>
                            <td width="30%"><button class="btn btn-primary" id="btnHeadphoneLevel" v-on:click="setHeadphoneLevel">Set</button></td>
                        </tr>
                        <tr>
                            <td>Headphone program mix</td>
                            <td><custom-slider raising min="0" max="1" step="0.05" v-model="headphoneMixValue" key="sliderHeadphoneMix"/></td>
                            <td><button class="btn btn-primary" id="btnHeadphoneMix" v-on:click="setHeadphoneMix">Set</button></td>
                        </tr>
                        <tr>
                            <td>Speaker Level</td>
                            <td><custom-slider raising min="0" max="1" step="0.05" v-model="speakerLevelValue" key="sliderSpeakerLevel"/></td>
                            <td><button class="btn btn-primary" id="btnSpeakerLevel" v-on:click="setSpeakerLevel">Set</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="input-body" v-if="this.showInput">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Input Type</td>
                            <td width="40%"><custom-slider raising min="0" max="3" step="1" v-model="inputTypeValue" key="sliderInputType"/></td>
                            <td width="30%"><button class="btn btn-primary" id="btnInputType" v-on:click="setInputType">Set</button></td>
                        </tr>
                        <tr>
                            <td>Input Levels : (ch0)</td>
                            <td><custom-slider raising min="0" max="1" step="0.05" v-model="inputLevelCh0Value" key="sliderLevelCh0"/></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Input Levels : (ch1)</td>
                            <td><custom-slider raising min="0" max="1" step="0.05" v-model="inputLevelCh1Value" key="sliderLevelCh1"/></td>
                            <td><button class="btn btn-primary" id="btnInputLevel" v-on:click="setInputLevel">Set</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group" id="phantom-power-body" v-if="this.showPhantomPower">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Phantom Power</label>
                        <select class="form-control" id="phantomPower" v-model="phantomPowerValue">
                            <option value="1">True</option>
                            <option value="0">False</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnPhantomPower" v-on:click="setPhantomPower">Set</button>
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
            title: 'Set Mic Level',
            showMicLevel: true,
            showHeadphoneSpeaker: false,
            showInput: false,
            showPhantomPower: false,
            micLevelValue: "0",
            headphoneLevelValue: "0",
            headphoneMixValue: "0",
            speakerLevelValue: "0",
            inputTypeValue: "0",
            inputLevelCh0Value: "0",
            inputLevelCh1Value: "0",
            phantomPowerValue: "1"
        }
    },
    mounted() {
        console.log('RecordDisplay-Component mounted.')
    },
    methods: {
        onMicLevel: function(event) {
            this.title = "Set Mic Level";
            this.showMicLevel = true;
            this.showHeadphoneSpeaker = this.showInput = this.showPhantomPower = false;
        },
        onHeadphoneSpeaker: function(event) {
            this.title = "Set Levels";
            this.showHeadphoneSpeaker = true;
            this.showMicLevel = this.showInput = this.showPhantomPower = false;
        },
        onInput: function(event) {
            this.title = "Set Focus Assist";
            this.showInput = true;
            this.showHeadphoneSpeaker = this.showMicLevel = this.showPhantomPower = false;
        },
        onPhantomPower: function(event) {
            this.title = "Set Program return feed enable";
            this.showPhantomPower = true;
            this.showHeadphoneSpeaker = this.showInput = this.showMicLevel = false;
        },
        sendAudioCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setMicLevel: function(event) {
            debugger;
            var command = {
                type : 'mic-level',
                micLevelValue : this.micLevelValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Mic Level is called');
        },
        setHeadphoneLevel: function(event) {
            debugger;
            var command = {
                type : 'headphone-level',
                headphoneLevelValue : this.headphoneLevelValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Headphone Level is called');
        },
        setHeadphoneMix: function(event) {
            debugger;
            var command = {
                type : 'headphone-mix',
                headphoneMixValue: this.headphoneMixValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Headphone Program Mix is called');
        },
        setSpeakerLevel: function(event) {
            debugger;
            var command = {
                type : 'speaking-level',
                speakerLevelValue : this.speakerLevelValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Speaker Level is called');
        },
        setInputType: function(event) {
            debugger;
            var command = {
                type : 'input-type',
                inputTypeValue : this.inputTypeValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Input Type is called');
        },
        setInputLevel: function(event) {
            debugger;
            var command = {
                type : 'input-level',
                inputLevelCh0Value: this.inputLevelCh0Value,
                inputLevelCh1Value: this.inputLevelCh1Value,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Input Level is called');
        },
        setPhantomPower: function(event) {
            debugger;
            var command = {
                type : 'phantom-power',
                phantomPowerValue: this.phantomPowerValue,
            };
            
            this.sendAudioCommand(command);
            alert('Sent Phantom Power is called');
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