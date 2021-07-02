<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="updateUserConfirm">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                   <h4>Update User Confirm</h4>
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="users.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" v-model="users.email">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" v-model="users.type">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" v-model="users.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="text" class="form-control" v-model="users.DOB">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" v-model="users.address">
                                </div>
                            </div>
                        
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            <div class="col-12">
                                <button type="reset" class="btn btn-primary">Clear</button>
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
    name:"update-user-confirm",
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
        this.showUser()
    },
    methods:{
        async showUser(){
            await axios.get(`/api/users/${this.$route.params.id}`).then(response=>{
                const { name, email ,type,phone,DOB,address } = response.data
                this.users.name = name
                this.users.email = email
                this.users.type = type
                this.users.phone = phone
                this.users.DOB = DOB
                this.users.address = address
               
            }).catch(error=>{
                console.log(error)
            })
        },
        async updateUserConfirm(){
            await axios.post(`/api/users/${this.$route.params.id}`,this.posts).then(response=>{
                this.$router.push({name:"IndexUser"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>