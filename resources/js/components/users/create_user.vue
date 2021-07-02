<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="usercreate">
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
                                    <input type="email" class="form-control" v-model="users.email">
                                </div>
                            </div>
                             <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="users.password">
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" v-model="users.confirmPasssword">
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
                                    <input type="number" class="form-control" v-model="users.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" class="form-control" v-model="users.DOB">
                                   
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" v-model="users.address">
                                </div>
                            </div>
                             <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Profile</label>
                                   <input type="file" name="profile" class="custom-file-input" id="inputFileUpload"
                                    @change="onFileChange">
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
    name:"CreateUser",
    data(){
        return {
            users:{
                name:"",
                email:"",
                password:"",
                confirmPasssword:"",
                type:"",
                phone:"",
                DOB:"",
                address:"",
                profile:""
            }
        }
    },
    methods:{
        onFileChange(e) {
            this.users.profile = e.target.files[0].name;
        },
        selectImage () {
            this.$refs.fileInput.click()
        },
        pickFile () {
            let input = this.$refs.fileInput
            let file = input.files
            if (file && file[0]) {
                let reader = new FileReader
                reader.onload = e => {
                this.previewImage = e.target.result
                }
                reader.readAsDataURL(file[0])
                this.$emit('input', file[0])
            }
        },
        usercreate(){
            axios.post('/api/users',this.users).then(response=>{
                this.$router.push({name:"IndexUser"})
            }).catch(error=>{
                console.log(error)
            })
        }
    },
}
</script>

<style scoped lang="scss">
.imagePreviewWrapper {
    width: 250px;
    height: 250px;
    display: block;
    cursor: pointer;
    margin: 0 auto 30px;
    background-size: cover;
    background-position: center center;
}
</style>