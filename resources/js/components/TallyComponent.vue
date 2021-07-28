<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <a data-toggle="collapse" href="#collapseTally">Tally</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
            </div>
        </div>
        <div id="collapseTally" class="card-body">
            <div class="form-group" id="overlays-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Tally brightness</td>
                            <td width="40%"><custom-slider raising min="0.0" max="1.0" step="0.05" v-model="tallyBrightnessValue" key="sliderTallyBrightness"/></td>
                            <td width="30%"><button class="btn btn-primary" id="btnTallyBrightness" v-on:click="setTallyBrightness">Set</button></td>
                        </tr>
                        <tr>
                            <td>Front tally brightness</td>
                            <td><custom-slider raising min="0.0" max="1.0" step="0.05" v-model="frontTallyBrightnessValue" key="sliderFrontTallyBrightness"/></td>
                            <td><button class="btn btn-primary" id="btnFrontTallyBrightness" v-on:click="setFrontTallyBrightness">Set</button></td>
                        </tr>
                        <tr>
                            <td>Rear tally brightness</td>
                            <td><custom-slider raising min="0.0" max="1.0" step="0.05" v-model="rearTallyBrightnessValue" key="sliderRearTallyBrightness"/></td>
                            <td><button class="btn btn-primary" id="btnRearTallyBrightness" v-on:click="setRearTallyBrightness">Set</button></td>
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
            title: 'Tally Parameters',
            tallyBrightnessValue: "0",
            frontTallyBrightnessValue: "0",
            rearTallyBrightnessValue: "0",
        }
    },
    mounted() {
        console.log('TallyParameter-Component mounted.')
    },
    methods: {
        sendTallyCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setTallyBrightness: function(event) {
            debugger;
            var command = {
                type : 'tally-brightness',
                tallyBrightnessValue : this.tallyBrightnessValue,
            };
            
            this.sendTallyCommand(command);
            alert('Sent Tally brightness is called');
        },
        setFrontTallyBrightness: function(event) {
            debugger;
            var command = {
                type : 'front-tally-brightness',
                frontTallyBrightnessValue : this.frontTallyBrightnessValue,
            };
            
            this.sendTallyCommand(command);
            alert('Sent Front tally brightness is called');
        },
        setRearTallyBrightness: function(event) {
            debugger;
            var command = {
                type : 'rear-tally-brightness',
                rearTallyBrightnessValue: this.rearTallyBrightnessValue,
            };
            
            this.sendTallyCommand(command);
            alert('Sent Rear tally brightness is called');
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