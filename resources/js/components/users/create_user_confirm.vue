<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                 <form @submit="userConfirm" enctype="multipart/form-data">
                    <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                   <h4>Create User Confirm</h4>
                                  
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" v-model="users.name">
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" v-model="users.email">
                                </div>
                            </div>
                             <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" v-model="users.password">
                                   
                                </div>
                            </div>
                           
                             <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" v-model="users.type">
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" name="phone" v-model="users.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" class="form-control" name="DOB" v-model="users.DOB">
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" v-model="users.address">
                                </div>
                            </div>
                          
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <input type="file" name="profile" class="custom-file-input" id="inputFileUpload"
                                   v-on:change="onFileChange">
                                </div>
                            </div>

                           
                             <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                            <div class="col-12">
                                <button type="reset" class="btn btn-primary">Cancel</button>
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
    name:"CreateUser",
    data(){
        return {
            users:{
                profile: "",
                name:"",
                email:"",
                password:"",
                type:"",
                phone:"",
                 DOB:"",
                address:""
            }
        }
    },
    methods:{
         onFileChange(e) {
                //console.log(e.target.files[0]);
                this.profile = "Selected File: " + e.target.files[0].name;
                this.file = e.target.files[0];
            },
            
        submitForm(e) {
                e.preventDefault();
                let currentObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                }

                // form data
                let formData = new FormData();
                formData.append('file', this.file);

                // send upload request
                axios.post('/api/users', formData, config)
                    .then(function (response) {
                        currentObj.success = response.data.success;
                        currentObj.filename = "";
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
                },

            async userConfirm(){


            await axios.post('/api/users',this.users).then(response=>{
                this.$router.push({name:"IndexUser"})
            }).catch(error=>{
                console.log(error)
            })
        }
        
    }
}
</script>