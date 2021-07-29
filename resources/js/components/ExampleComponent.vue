<template>
    <div class="container"  v-if="this.isShow">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Example Component</div>

                <div class="card-body">

                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
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
        isShow : state => state.selectedMenuId == "Example",
    }),
}
</script>
