<template>
    <div class="card">
        <div class="card-header">
            <h5 class="card-category">Information</h5>
            <h3 class="card-title">System and Log Messages</h3>
        </div>
        <div class="card-body">
            <label id="ipAddress">IP Address : </label><br/>
            <label id="osType" >Operating System: </label><br/>
            <label id="cameraStatus" style="max-height:400px; overflow:auto !important; width:-webkit-fill-available;"></label>
        </div>
    </div>
</template>

<script>

export default {
    mounted() {
        console.log('SystemInfo-Component mounted.')
    }
}
</script>
