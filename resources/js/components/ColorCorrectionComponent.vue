<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4 text-left">
                    <a data-toggle="collapse" href="#collapseColorCorrection">Color correction</a>
                    <h3 class="card-title">{{this.title}}</h3>
                </div>
                <div class="col-sm-8">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                    <label class="btn btn-sm btn-primary btn-simple active" id="0" v-on:click="onLiftAdjust">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Lift Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple active" id="1" v-on:click="onGammaAdjust">
                        <input type="radio" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Gamma Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-single-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="2" v-on:click="onGainAdjust">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Gain Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-gift-2"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="3" v-on:click="onOffsetAdjust">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Offset Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="4" v-on:click="onContrastAdjust">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Contrast Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="5" v-on:click="onLumaMix">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Luma mix</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="6" v-on:click="onColorAdjust">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Color Adjust</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    <label class="btn btn-sm btn-primary btn-simple" id="7" v-on:click="onCorrectionResetDefault">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Correction Reset Default</span>
                        <span class="d-block d-sm-none">
                            <i class="tim-icons icon-tap-02"></i>
                        </span>
                    </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseColorCorrection" class="card-body">
            <div class="form-group" id="lift-adjust-body" v-if="this.showLiftAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Red</td>
                                <td width="60%"><custom-slider raising min="-2.0" max="2.0" step="0.1" v-model="liftAdjustRedValue" key="sliderLiftAdjustRed" /></td>
                            </tr>
                            <tr>
                                <td>Green</td>
                                <td><custom-slider raising min="-2.0" max="2.0" step="0.1" v-model="liftAdjustGreenValue" key="sliderLiftAdjustGreen" /></td>
                            </tr>
                            <tr>
                                <td>Blue</td>
                                <td><custom-slider raising min="-2.0" max="2.0" step="0.1" v-model="liftAdjustBlueValue" key="sliderLiftAdjustBlue" /></td>
                            </tr>
                            <tr>
                                <td>Luma</td>
                                <td><custom-slider raising min="-2.0" max="2.0" step="0.1" v-model="liftAdjustLumaValue" key="sliderLiftAdjustLuma" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnLiftAdjust" v-on:click="setLiftAdjust">Set</button>
            </div>
            <div class="form-group" id="gamma-adjust-body" v-if="this.showGammaAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Red</td>
                                <td width="60%"><custom-slider raising min="-4.0" max="4.0" step="0.1" v-model="gammaAdjustRedValue" key="sliderGammaAdjustRed" /></td>
                            </tr>
                            <tr>
                                <td>Green</td>
                                <td><custom-slider raising min="-4.0" max="4.0" step="0.1" v-model="gammaAdjustGreenValue" key="sliderGammaAdjustGreen" /></td>
                            </tr>
                            <tr>
                                <td>Blue</td>
                                <td><custom-slider raising min="-4.0" max="4.0" step="0.1" v-model="gammaAdjustBlueValue" key="sliderGammaAdjustBlue" /></td>
                            </tr>
                            <tr>
                                <td>Luma</td>
                                <td><custom-slider raising min="-4.0" max="4.0" step="0.1" v-model="gammaAdjustLumaValue" key="sliderGammaAdjustLuma" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnGammaAdjust" v-on:click="setGammaAdjust">Set</button>
            </div>
            <div class="form-group" id="gain-adjust-body" v-if="this.showGainAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Red</td>
                                <td width="60%"><custom-slider raising min="0.0" max="16.0" step="0.1" v-model="gainAdjustRedValue" key="sliderGainAdjustRed" /></td>
                            </tr>
                            <tr>
                                <td>Green</td>
                                <td><custom-slider raising min="0.0" max="16.0" step="0.1" v-model="gainAdjustGreenValue" key="sliderGainAdjustGreen" /></td>
                            </tr>
                            <tr>
                                <td>Blue</td>
                                <td><custom-slider raising min="0.0" max="16.0" step="0.1" v-model="gainAdjustBlueValue" key="sliderGainAdjustBlue" /></td>
                            </tr>
                            <tr>
                                <td>Luma</td>
                                <td><custom-slider raising min="0.0" max="16.0" step="0.1" v-model="gainAdjustLumaValue" key="sliderGainAdjustLuma" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnGainAdjust" v-on:click="setGainAdjust">Set</button>
            </div>
            <div class="form-group" id="offset-adjust-body" v-if="this.showOffsetAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Red</td>
                                <td width="60%"><custom-slider raising min="-8.0" max="8.0" step="0.1" v-model="offsetAdjustRedValue" key="sliderOffsetAdjustRed" /></td>
                            </tr>
                            <tr>
                                <td>Green</td>
                                <td><custom-slider raising min="-8.0" max="8.0" step="0.1" v-model="offsetAdjustGreenValue" key="sliderOffsetAdjustGreen" /></td>
                            </tr>
                            <tr>
                                <td>Blue</td>
                                <td><custom-slider raising min="-8.0" max="8.0" step="0.1" v-model="offsetAdjustBlueValue" key="sliderOffsetAdjustBlue" /></td>
                            </tr>
                            <tr>
                                <td>Luma</td>
                                <td><custom-slider raising min="-8.0" max="8.0" step="0.1" v-model="offsetAdjustLumaValue" key="sliderOffsetAdjustLuma" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnOffsetAdjust" v-on:click="setOffsetAdjust">Set</button>
            </div>
            <div class="form-group" id="contrast-adjust-body" v-if="this.showContrastAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Pivot</td>
                                <td width="60%"><custom-slider raising min="0.0" max="1.0" step="0.1" v-model="contrastAdjustPivotValue" key="sliderContrastAdjustPivot" /></td>
                            </tr>
                            <tr>
                                <td>Adj</td>
                                <td><custom-slider raising min="0.0" max="2.0" step="0.1" v-model="contrastAdjustValue" key="sliderContrastAdjust" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnContrastAdjust" v-on:click="setContrastAdjust">Set</button>
            </div>
            <div class="form-group" id="luma-mix-body" v-if="this.showLumaMix">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Luma Mix</label>
                        <custom-slider raising min="0.0" max="1.0" step="0.05" v-model="lumaMixValue"/>
                    </div>
                </div>
                <button class="btn btn-primary" id="btnLumaMix" v-on:click="setLumaMix">Set</button>
            </div>
            <div class="form-group" id="color-adjust-body" v-if="this.showColorAdjust">
                <div class="col-sm-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%">Hue</td>
                                <td width="60%"><custom-slider raising min="-1.0" max="1.0" step="0.1" v-model="hueColorAdjustValue" key="sliderHueColorAdjustRed" /></td>
                            </tr>
                            <tr>
                                <td>Sat</td>
                                <td><custom-slider raising min="0.0" max="2.0" step="0.1" v-model="satColorAdjustValue" key="sliderSatColorAdjustGreen" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" id="btnColorAdjust" v-on:click="setColorAdjust">Set</button>
            </div>
            <div class="form-group" id="correction-reset-body" v-if="this.showCorrectionResetDefault">
                <button class="btn btn-primary" id="btnCorrectionReset" v-on:click="setCorrectionResetDefault">Set</button>
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
            title: 'Lift Adjust',
            showLiftAdjust: true,
            showGammaAdjust: false,
            showGainAdjust: false,
            showOffsetAdjust: false,
            showContrastAdjust: false,
            showLumaMix: false,
            showColorAdjust: false,
            showCorrectionResetDefault: false,
            liftAdjustRedValue: "0",
            liftAdjustGreenValue: "0",
            liftAdjustBlueValue: "0",
            liftAdjustLumaValue: "0",
            gammaAdjustRedValue: "0",
            gammaAdjustGreenValue: "0",
            gammaAdjustBlueValue: "0",
            gammaAdjustLumaValue: "0",
            gainAdjustRedValue: "0",
            gainAdjustGreenValue: "0",
            gainAdjustBlueValue: "0",
            gainAdjustLumaValue: "0",
            offsetAdjustRedValue: "0",
            offsetAdjustGreenValue: "0",
            offsetAdjustBlueValue: "0",
            offsetAdjustLumaValue: "0",
            contrastAdjustPivotValue: "0",
            contrastAdjustValue: "0",
            lumaMixValue: "0",
            hueColorAdjustValue: "0",
            satColorAdjustValue: "0",
        }
    },
    mounted() {
        console.log('OutputParameter-Component mounted.')
    },
    methods: {
        onLiftAdjust: function(event) {
            this.title = "Lift Adjust";
            this.showLiftAdjust = true;
            this.showGammaAdjust = this.showGainAdjust = this.showOffsetAdjust = 
            this.showOffsetAdjust = this.showLumaMix = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onGammaAdjust: function(event) {
            this.title = "Gamma Adjust";
            this.showGammaAdjust = true;
            this.showLiftAdjust = this.showGainAdjust = this.showOffsetAdjust =
            this.showContrastAdjust = this.showLumaMix = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onGainAdjust: function(event) {
            this.title = "Gain Adjust";
            this.showGainAdjust = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showOffsetAdjust = 
            this.showContrastAdjust = this.showLumaMix = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onOffsetAdjust: function(event) {
            this.title = "Offset Adjust";
            this.showOffsetAdjust = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showGainAdjust =
            this.showContrastAdjust = this.showLumaMix = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onContrastAdjust: function(event) {
            this.title = "Contrast Adjust";
            this.showContrastAdjust = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showGainAdjust = 
            this.showOffsetAdjust = this.showLumaMix = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onLumaMix: function(event) {
            this.title = "Luma Mix";
            this.showLumaMix = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showGainAdjust =
            this.showOffsetAdjust = this.showContrastAdjust = this.showColorAdjust = this.showCorrectionResetDefault = false;
        },
        onColorAdjust: function(event) {
            this.title = "Color Adjust";
            this.showColorAdjust = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showGainAdjust =
            this.showOffsetAdjust = this.showContrastAdjust = this.showLumaMix = this.showCorrectionResetDefault = false;
        },
        onCorrectionResetDefault: function(event) {
            this.title = "Correction Reset Default";
            this.showCorrectionResetDefault = true;
            this.showLiftAdjust = this.showGammaAdjust = this.showGainAdjust =
            this.showOffsetAdjust = this.showContrastAdjust = this.showLumaMix = this.showColorAdjust = false;
        },
        sendColorCorrectionCommand: function(command) {
            if (selectedCameraId == "")
                socket.emit('admin', null, JSON.stringify(command));
            else
                socket.emit('admin', selectedCameraId, JSON.stringify(command));
        },
        setLiftAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-lift-adjust',
                liftAdjustRedValue: this.liftAdjustRedValue,
                liftAdjustGreenValue: this.liftAdjustGreenValue,
                liftAdjustBlueValue: this.liftAdjustBlueValue,
                liftAdjustLumaValue: this.liftAdjustLumaValue
            };
            
            this.sendColorCorrectionCommand(command);
            alert('Sent Lift Adjust is called');
        },
        setGammaAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-gamma-adjust',
                gammaAdjustRedValue: this.gammaAdjustRedValue,
                gammaAdjustGreenValue: this.gammaAdjustGreenValue,
                gammaAdjustBlueValue: this.gammaAdjustBlueValue,
                gammaAdjustLumaValue: this.gammaAdjustLumaValue
            };
            
            this.sendColorCorrectionCommand(command);
            alert('Sent Gamma Adjust is called');
        },
        setGainAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-gain-adjust',
                gainAdjustRedValue: this.gainAdjustRedValue,
                gainAdjustGreenValue: this.gainAdjustGreenValue,
                gainAdjustBlueValue: this.gainAdjustBlueValue,
                gainAdjustLumaValue: this.gainAdjustLumaValue
            };
            
            this.sendColorCorrectionCommand(command);
            alert('Sent Gain Adjust is called');
        },
        setOffsetAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-offset-adjust',
                offsetAdjustRedValue: this.offsetAdjustRedValue,
                offsetAdjustGreenValue: this.offsetAdjustGreenValue,
                offsetAdjustBlueValue: this.offsetAdjustBlueValue,
                offsetAdjustLumaValue: this.offsetAdjustLumaValue
            };
            
            this.sendColorCorrectionCommand(command);
            alert('Sent Offset Adjust is called');
        },
        setContrastAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-contrast-adjust',
                contrastAdjustPivotValue: this.contrastAdjustPivotValue,
                contrastAdjustValue: this.contrastAdjustValue,
            };

            this.sendColorCorrectionCommand(command);
            alert('Sent Contract Adjust is called');
        },
        setLumaMix: function(event) {
            debugger;
            var command = {
                type : 'set-luma-mix',
                lumaMixValue: this.lumaMixValue,
            };

            this.sendColorCorrectionCommand(command);
            alert('Sent Luma Mix is called');
        },
        setColorAdjust: function(event) {
            debugger;
            var command = {
                type : 'set-color-adjust',
                hueColorAdjustValue: this.hueColorAdjustValue,
                satColorAdjustValue: this.satColorAdjustValue,
            };

            this.sendColorCorrectionCommand(command);
            alert('Sent Color Adjust is called');
        },
        setCorrectionResetDefault: function(event) {
            debugger;
            var command = {
                type: 'set-correction-reset',
            };

            this.sendColorCorrectionCommand(command);
            alert('Sent Correct')
        },
        getToday: function() {
            debugger;
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            var dateString = "" + dd + '/' + mm + '/' + yyyy + "";
            return dateString;
        },
        getTime: function() {
            debugger;
            var today = new Date();
            var timeString = "" + today.getHours() + ":"  + today.getMinutes() + ":" + today.getSeconds() + "";
            return timeString;
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