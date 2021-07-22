<template>
<div class="row">
    <div class="col-lg-8 m-auto">
        <card>
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

import ProtocolCheck from '../../misc/protocolcheck'
export default {

    components: {

    },

    middleware: 'guest',

    data() {
        return {
            meetingLink : ""
        };
    },
    mounted() {
        this.meetingLink =  Math.floor(Math.random() * 1000000).toString();
    },
    metaInfo () {
        return { title: this.$t('meeting') }
    },
    methods: {
        onStartMeeting: function(event) {
            ProtocolCheck("vrmba://" + this.meetingLink,
                function () {
                    var retVal = confirm("You didn't install VRMBA Test App. Are you going to download and install it?");
                    if( retVal == true ) {
                        window.location.href = "/dist/UE4Setup.msi";
                    } 
                }
            );
        },
        downloadFile() {
            this.$http.get(this.appApiPath + '/testpdf', {responseType: 'arraybuffer'})
            .then(response => {
                let blob = new Blob([response.data], { type: 'application/pdf' })
                let link = document.createElement('a')
                link.href = window.URL.createObjectURL(blob)
                link.download = 'test.pdf'
                link.click()
            })
        }        
    }
    
}
</script>
