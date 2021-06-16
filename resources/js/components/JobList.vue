<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 sidebar">
                <div class="card mb-4">
                    <div class="card-header">Filter</div>
                    <div class="card-body">
                        <div class="locations mb-4">
                            <h5>Locations</h5>
                            <div v-for="location in locations">
                                <input type="checkbox" :id="location" v-model="selectedLocations" :value="location"
                                       @change="Search()">
                                <label :for="location"> {{ location }}</label>
                            </div>
                        </div>
                        <div class="companies mb-4">
                            <h5>Company</h5>

                            <div v-for="company in companies">
                                <input type="checkbox" :id="company" v-model="selectedCompanies" :value="company"
                                       @change="Search()">
                                <label :for="company"> {{ company }}</label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Add new Job</div>
                    <div class="card-body">
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Commodi corporis minima molestias quasi! Ad alias dolor enim harum,
                            ipsa mollitia nihil nisi officiis pariatur quam rerum sint tempore ullam velit?</p>
                        <a class="btn btn-dark btn-block w-100" href="/job/create">Add new job ad</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Job List</div>
                    <div class="card-body jobs-list">
                        <div class="search">
                            <input type="text" class="form-control search-input" placeholder="Beruf" name=""
                                   v-model="search" @keypress.enter="Search()">
                            <a href="#" class="search-icon"> <i class="fa fa-search" @click="Search()"></i> </a>
                        </div>

                        <div class="jobs-wrapper">
                            <div class="job-item p-2 mt-2 mb-2" v-for="job in allJobs">
                                <a :href="'/jobs/' + job.id">{{ job.title }}</a>
                                <h4>{{ job.company }}</h4>
                                <span>{{ job.location }}</span>
                                <p>{{ job.description }}</p>
                                <span>{{ job.datetime }}</span>
                                <span v-if="job.active"> Active </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            search: '',
            allJobs: [],
            companies: [],
            selectedCompanies: [],
            locations: [],
            selectedLocations: [],
        };
    },
    props: {
        jobs: {
            type: Array,
            required: true
        }
    },
    methods: {
        Search: function () {

            // Selected Companies & Locations from Filter
            var selectedCompanies = JSON.parse(JSON.stringify(this.selectedCompanies)),
                selectedLocations = JSON.parse(JSON.stringify(this.selectedLocations));

            // select paramether from input
            let param = (this.search) ? (this.search) : '-'

            // Send Data to API
            axios.post('/api/v1/jobsearch/' + param)
                .then(response => {

                    // All the fetched Data
                    var JobsAfterSearch = response.data.data;

                    // Company Filter
                    if ( selectedCompanies.length ) {
                        JobsAfterSearch = JobsAfterSearch.filter(function (job) {
                            if ( selectedCompanies.includes(job.company) ) {
                                return job
                            }
                        });
                    }


                    // Location Filter
                    if ( selectedLocations.length ) {
                        JobsAfterSearch = JobsAfterSearch.filter(function (job) {
                            if ( selectedLocations.includes(job.location) ) {
                                return job
                            }
                        });
                    }

                    // Rendering the fetched Data
                    this.allJobs = JobsAfterSearch

                }).catch(error => console.log(error));
        }
    },
    created () {
        // Get all the jobs
        this.allJobs = this.jobs

        // Get all Company names
        this.companies = [...new Set(this.allJobs.map(function (value) {
            return value['company'];
        }))];

        // Get all the locations
        this.locations = [...new Set(this.allJobs.map(function (value) {
            return value['location'];
        }))];
    },
    mounted () {

    },
    watch: {
        search: function () {

        }
    }

}
</script>
