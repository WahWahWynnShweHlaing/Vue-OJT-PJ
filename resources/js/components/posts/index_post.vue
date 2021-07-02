<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">

            <form @submit.prevent="postSearch" class="d-flex mb-5 mt-3">
              <input type="text" name="search" id="search_keyword" required />
              <button class="btn search-btn ml-5" type="submit">Search</button>
            </form>
            <router-link :to='{name:"CreatePost"}' class="btn btn-primary">Add</router-link>
            <router-link :to='{name:"uploadCSV"}' class="btn btn-primary">Upload</router-link>
            <button type="button" @click="exportCSV" class="btn btn-primary">Download</button>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Posts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Post Description</th>
                                    <th>Posted User</th>
                                    <th>Posted Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody v-if="posts.length > 0">
                                <tr v-for="(post,key) in posts" :key="key">
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.description }}</td>
                                    <td>{{ post.create_user_id }}</td>
                                    <td>{{ post.created_at }}</td>
                                    <td>
                                        <router-link :to='{name:"UpdatePost",params:{id:post.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deletepost(post.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5" align="center">No Categories Found.</td>
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
    name:"posts",
    data(){
        return {
            posts:[]
        }
    },
    mounted(){
        this.getPosts()
    },
    methods:{
        async getPosts(){
            await axios.get('/api/posts').then(response=>{
                this.posts = response.data
            }).catch(error=>{
                console.log(error)
                this.posts = []
            })
        },
        deletepost(id){
            if(confirm("Are you sure to delete this post ?")){
                axios.delete(`/api/posts/${id}`).then(response=>{
                    this.getPosts()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        exportCSV(){
            axios.post('/api/export',this.posts).then(response=>{
                  this.getPosts()
            }).catch(error=>{
                console.log(error)
            })
        },
        postSearch(){
            var search = document.getElementById('search_keyword').value;
            axios.post('/api/postsearch', {keyword : search}).then(response => {
                this.posts = response.data
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>