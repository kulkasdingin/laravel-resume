<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h1 class="card-title">Profile</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold">Biodata</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">First Name</span>
                            <h5>{{ profile.first_name }}</h5>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Last Name</span>
                            <h5>{{ profile.last_name }}</h5>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Birth Date</span>
                            <h5>
                                <template v-if="profile.birth_date">
                                    {{ profile.birth_date }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Gender</span>
                            <h5>
                                <template v-if="profile.gender">
                                    {{ profile.gender }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Profession</span>
                            <h5>
                                <template v-if="profile.profession">
                                    {{ profile.profession }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="font-weight-bold">Contact</span>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Email</span>
                            <h5>
                                <template v-if="profile.email">
                                    {{ profile.email }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <span class="font-weight-normal">Phone</span>
                            <h5>
                                <template v-if="profile.phone">
                                    {{ profile.phone }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                        <div class="col-md-12">
                            <span class="font-weight-normal">Address</span>
                            <h5>
                                <template v-if="profile.address">
                                    {{ profile.address }}
                                </template>
                                <template v-else>
                                    -
                                </template>
                            </h5>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h1 class="card-title">Photo</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 offset-2 text-center custom-col-image-wrapper custom-wrapper-1x1">
                            <template v-if="profile.photo">
                                <img id="profile-image" class="mx-auto img-fluid img-circle custom-image-wrapped border-secondary p-1"
                                    v-bind:src="profile.photo"
                                    alt="User profile picture"
                                    style="border: 3px solid; transition: border-radius .3s ease">
                            </template>
                            <template v-else>
                                <img id="profile-image" class="mx-auto img-fluid img-circle custom-image-wrapped border-secondary p-1"
                                    v-bind:src="'https://img.icons8.com/carbon-copy/100/000000/no-image.png'"
                                    alt="User profile picture"
                                    style="border: 3px solid; transition: border-radius .3s ease">
                            </template>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-default" v-on:click="changeImageProfileToSquare(this)">{{ profileState[1] }}</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary">Change</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h1 class="card-title">Profile Attribute Line</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="font-weight-bold">Attribute Line</span>
                        </div>
                        <div class="col-md-12">
                            <span class="font-weight-normal">Email</span>
                            <h5>fariz@fariz.fariz</h5>
                        </div>
                        <div class="col-md-12">
                            <span class="font-weight-normal">Phone</span>
                            <h5>08123217327321</h5>
                        </div>
                        <div class="col-md-12">
                            <span class="font-weight-normal">Address</span>
                            <h5>Jl. jl hayuu</h5>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control">
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
        data(){
            return{
                profile:{},
                profileState: [true, 'Square'], // isCircle, InnerHtml
                uri: '/admin/resource/profiles/1'
            }
        },
        methods: {
            loadData(){
                axios.get(this.uri)
                .then(response=>{
                    this.profile = response.data.profile
                    console.log(this.profile);
                });
            },
            changeImageProfileToSquare(event) {
                $('#profile-image').toggleClass('img-circle');
                if (this.profileState[0]){
                    this.profileState = [false, 'Circle'];
                } else {
                    this.profileState = [true, 'Square'];
                }
            }
        },
        mounted() {
            this.loadData();
            console.log('Component mounted.')
        }
    }
</script>
