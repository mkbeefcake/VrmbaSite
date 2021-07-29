<template>
    <div class="container" v-if="this.isShow">
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">Meeting</div>

                    <div class="card-body">
                    </div>

                </div>
            </div>

            <div class="col-xl-5">
                <div class="card">
                    <div class="card-header">Calendar</div>

                    <div class="card-body">
                    </div>

                </div>
            </div>
        </div>


    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    mounted() {
        console.log('Component mounted: Selected MenuID = ' + this.selectedMenuId);
    },
    computed: mapState({
        selectedMenuId: state => state.selectedMenuId,
        isShow : state => state.selectedMenuId == "Schedule",
    }),
}
</script>
