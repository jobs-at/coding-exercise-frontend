<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
