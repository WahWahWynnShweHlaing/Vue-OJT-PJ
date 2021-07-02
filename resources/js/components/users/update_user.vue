<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update User</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updateUser">
                        <div class="row">
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
    name:"update-user",
    data(){
        return {
            users:{
                name:"",
                email:"",
                type:"",
                phone:"",
                DOB:"",
                address:""
            }
        }
    },
    mounted(){
        this.getUsers()
    },
    methods:{
        getUsers(){
            console.log(this.$route.params.id);
            axios.get(`/api/users/${this.$route.params.id}`).then(response => {
                console.log(response.data);
                this.users.name = response.data.name,
                this.users.email = response.data.email,
                this.users.type = response.data.type,
                this.users.phone = response.data.phone,
                this.users.DOB = response.data.DOB,
                this.users.address = response.data.address

            }).catch(error=>{
                console.log(error)
                this.users = []
            })
        },
        updateUser(){
            this.$router.push({name:"UpdateUserConfirm"})
        }
    }
}
</script>