<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Post</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="createPost">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" v-model="posts.title">
                                    
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" v-model="posts.description">
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
    name:"add-post",
    data(){
        return {
            posts:{
                title:"",
                description:""
                
            }
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

     
        async createPost(){
                this.$router.push({name:"CreatePostConfirm"})
          }
     
     }
}
</script>