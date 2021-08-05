<template>
<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <card :title="$t('My meetings > Schedule a Meeting')">
                <form>
                    <!-- Topic -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Topic</label>
                        <div class="col-md-8">
                            <input class="form-control" name="topic" v-model="form.topic">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Description (Opt)</label>
                        <div class="col-md-8">
                            <input class="form-control" name="description" placeholder="Enter your meeting description" v-model="form.description">
                        </div>
                    </div>

                    <!-- When -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">When</label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="whenDate" v-model="form.whenDate">
                        </div>
                        <div class="col-md-4">
                            <input type="time" class="form-control" name="whenTime" v-model="form.whenTime">
                        </div>
                    </div>

                    <!-- Duration -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Duration</label>
                        <div class="col-md-3">
                            <select class="form-control" name="durationHr" v-model="form.durationHr">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="col-form-label">Hr</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="durationMin" v-model="form.durationMin">
                                <option value="0">0</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label class="col-form-label">Min</label>
                        </div>
                    </div>

                    <!-- Passcode -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Passcode</label>
                        <div class="col-md-8">
                            <input class="form-control" name="passcode" v-model="form.passcode">
                        </div>
                    </div>

                    <!-- Passcode -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Meeting Link</label>
                        <div class="col-md-8">
                            <input class="form-control" name="meetingLink" v-model="form.meetingLink" readonly>
                        </div>
                    </div>

                    <!-- Video -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left">Video</label>
                        <label class="col-md-3 col-form-label text-md-left">Host</label>
                        <div class="form-check col-md-2">
                            <input class="form-check-input" type="radio" name="hostVideo" value="1" v-model="form.hostVideo">
                            <label class="form-label">
                                On
                            </label>
                        </div>
                        <div class="form-check col-md-2">
                            <input class="form-check-input" type="radio" name="hostVideo" value="0" v-model="form.hostVideo">
                            <label class="form-label">
                                Off
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-left"></label>
                        <label class="col-md-3 col-form-label text-md-left">Participant</label>
                        <div class="form-check col-md-2">
                            <input class="form-check-input" type="radio" name="participantVideo" value="1" v-model="form.participantVideo">
                            <label class="form-label">
                                On
                            </label>
                        </div>
                        <div class="form-check col-md-2">
                            <input class="form-check-input" type="radio" name="participantVideo" value="0" v-model="form.participantVideo">
                            <label class="form-label">
                                Off
                            </label>
                        </div>
                    </div>

                    <!-- Save/Cancel -->
                    <div class="form-group row">
                        <div class="col-md-7 offset-md-3 d-flex">
                            <label class="btn btn-primary btn-simple active" v-on:click="onSave">Save</label>
                            <label class="btn btn-primary btn-simple" v-on:click="onCancel">Cancel</label>
                        </div>
                    </div>

                </form>
            </card>
        </div>
    </div>
</div>
</template>
<script>
import Form from 'vform'

export default {

    components: {
        
    },

    middleware: 'auth',
    
    data: () => ({
        form: new Form({
            topic:"",
            description:"",
            when:"",
            whenDate:"",
            whenTime:"",
            duration:"",
            durationHr:"",
            durationMin:"",
            passcode: "",
            meetingLink:"",
            hostVideo: 1,
            participantVideo:1,
        }),
    }),
    mounted() {
        this.form.passcode = this.genPasscode();
        this.form.meetingLink = this.genMeetingLink();
    },
    methods: {
        onSave: async function(event) {
            this.form.when = this.form.whenDate + " " + this.form.whenTime
            this.form.duration = this.form.durationHr + ":" + this.form.durationMin + ":00" 

            try {
                const { data } = await this.form.post('/api/meeting')
                console.log(data)
                this.$router.push({ name: 'meeting', params: { } })                
            }
            catch (ex) {
                alert(ex.description)
                console.log(ex)
            }

        },
        onCancel: function(event) {
            this.$router.push({ name: 'meeting', params: { } })
        },
        genPasscode: function () {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < 6; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        },
        genMeetingLink: function () {
            var result           = '';
            var characters       = 'abcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < 8; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

    }
    
}
</script>
