<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 sidebar">
                <div class="card">
                    <div class="card-header">Categories</div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        <div class="search">
                            <input type="text" class="form-control search-input" placeholder="Search" name="">
                            <a href="#" class="search-icon"> <i class="fa fa-search"></i> </a>
                        </div>

                        <div class="jobs-wrapper">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        jobs: {
            type: Array,
            required: true
        }
    },
    created () {

    },
    mounted () {
        console.log(this.jobs)
    }
}
</script>
