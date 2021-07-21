<template>
<div class="row">
    <div class="col-lg-8 m-auto">
        <card :title="Meeting">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-left">Meeting invitation link: </label>
                <label class="col-md-4 col-form-label text-md-left">{{this.meetingLink}}</label>
                <label class="btn btn-primary btn-simple active" v-on:click="onStartMeeting">Start Meeting</label>
            </div>
        </card>
    </div>
</div>
</template>
<script>
import Button from '../../components/Button.vue'
export default {

    data() {
        return {
            meetingLink : ""
        };
    },
    mounted() {
        this.meetingLink =  Math.floor(Math.random() * 1000000).toString();
    },
    methods: {
        onStartMeeting: function(event) {
            
            // HERE 

        }
    }
    
}
</script>
