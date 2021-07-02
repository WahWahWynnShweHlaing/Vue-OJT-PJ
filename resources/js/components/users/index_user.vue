<template>
    <div class="row">

         <form @submit.prevent="userSearch" class="d-flex mb-5 mt-3">
              <input type="text" name="search" id="search_keyword" required />
              <button class="btn search-btn ml-5" type="submit">Search</button>
            </form>
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"CreateUser"}' class="btn btn-primary">Add</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created User</th>
                                    <th>Phone</th>
                                    <th>Birth Date</th>
                                    <th>Address</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.length > 0">
                                <tr v-for="(user,key) in users" :key="key">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.create_user_id }}</td>
                                    <td>{{ user.phone }}</td>
                                    <td>{{ user.DOB }}</td>
                                    <td>{{ user.address }}</td>
                                    <td>{{ user.created_at }}</td>
                                    <td>{{ user.updated_at }}</td>
                                    <td>
                                        <router-link :to='{name:"UpdateUser",params:{id:user.id}}' class="btn btn-success mb-3"> Edit </router-link>
                                        <button type="button" @click="deleteuser(user.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="8" align="center">No Categories Found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    name:"users",
    data(){
        return {
            users:[]
        }
    },
    mounted(){
        this.getUsers()
    },
    methods:{
        async getUsers(){
            await axios.get('/api/users').then(response=>{
                this.users = response.data
            }).catch(error=>{
                console.log(error)
                this.users = []
            })
        },
        deleteuser(id){
            if(confirm("Are you sure to delete this user ?")){
                axios.delete(`/api/users/${id}`).then(response=>{
                    this.getUsers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        userSearch(){
            var search = document.getElementById('search_keyword').value;
            axios.post('/api/usersearch', {keyword : search}).then(response => {
                this.users = response.data
            }).catch(error=>{
                console.log(error)
            })
        }
        
    }
}
</script>