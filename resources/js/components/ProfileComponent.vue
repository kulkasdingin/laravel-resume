<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row gap-y">
                    <div class="col-12" v-if="!is_hide">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Profesion</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <thead>
                                <template v-for="profile in profiles">
                                    <tr :key="profile.id">
                                        <td>{{ profile.id }}</td>
                                        <td>{{ profile.first_name}}</td>
                                        <td>{{ profile.last_name}}</td>
                                        <td>{{ profile.profesion}}</td>
                                        <td>{{ profile.email}}</td>
                                    </tr>
                                </template>
                            </thead>
                        </table>
                    </div>
                    <div class="col-12">
                        <a href="#" class="btn btn-block border-dark" @click="hidingData">hide aku mas</a>
                    </div>
                    <div class="col-12 pt-3">
                        <div class="row gap-y">
                            <div class="col-12 pb-3">
                                <input type="text" class="form-control" placeholder="First Name" @change="check()" v-model="profile.first_name">
                            </div>
                            <div class="col-12 pb-3">
                                <input type="text" class="form-control" placeholder="Last Name" @change="check()" v-model="profile.last_name">
                            </div>
                            <div class="col-12 pb-3">
                                <input type="text" class="form-control" placeholder="Profesion" @change="check()" v-model="profile.profesion">
                            </div>
                            <div class="col-12 pb-3">
                                <input type="text" class="form-control" placeholder="Email" @change="check()" v-model="profile.email">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-3">
                        <a href="#" class="btn btn-block border-dark" @click="sendData()">Send data</a>
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
                profile: {
                    first_name: '',
                    last_name: '',
                    profesion: '',
                    email: '',
                },
                is_hide: false,
                profiles: [],
                uri: '/resource/profiles',
            }
        },
        methods: {
            loadData() {
                axios.get(this.uri)
                .then(response=>{
                    this.profiles = response.data.profiles;
                    console.log(this.profiles);
                })
                .error(response=>{

                });
            },
            sendData() {
                let formData = new FormData();
                formData.append('first_name', this.profile.first_name);
                formData.append('last_name', this.profile.last_name);
                formData.append('profesion', this.profile.profesion);
                formData.append('email', this.profile.email);
                // alert(this.profile.profesion);
                formData.append('user_id', 1);

                axios.post(this.uri, formData)
                .then(response=>{
                    let profile = response.data.profile;
                    this.profiles.push(profile);
                    console.log(response.data.status);
                })
                .catch(response=>{

                });
            },
            hidingData() {
                this.is_hide = !this.is_hide;
            },
            check(){
                console.log(this.profile);
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.loadData();
        }
    }
</script>
