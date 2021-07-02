<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Profile</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="edit">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" v-model="users.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" id="email" v-model="users.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" id="type" v-model="users.type">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="phone" v-model="users.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="text" class="form-control" id="DOB" v-model="users.DOB">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="address" v-model="users.address">
                                </div>
                            </div>
                            <router-link :to='{name:"changePassword"}'>Change Password</router-link>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Back</button>
                            </div>
                          
                        </div>  
                                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name:"user-profile",
    data(){
        return {
            users:{
                name:"",
                email:"",
                type:"",
                phone:"",
                DOB:"",
                address:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showProfile()
    },
    methods:{
        showProfile(){
            axios.get(`/api/users/${this.$route.params.id}`,this.users).then(response=>{
              
                this.users.name = response.data.name
                this.users.email = response.data.email
                this.users.type = response.data.type
                this.users.phone = response.data.phone
                this.users.DOB = response.data.DOB
                this.users.address = response.data.address
               
            }).catch(error=>{
                console.log(error)
            })
        },

        async edit(){
                this.$router.push({name:"IndexUser"})
           
        }
    }
}
</script>