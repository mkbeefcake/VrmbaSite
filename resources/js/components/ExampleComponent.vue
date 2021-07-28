<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Example Component</div>

                <div class="card-body">

<!-- <nav class="navbar navbar-expand-lg navbar-absolute">
    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navigation"> -->

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

                <!-- </div>
    </div>
</nav> -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
