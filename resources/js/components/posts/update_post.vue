<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Post Update</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="postUpdate">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" v-model="posts.title">
                                    
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" v-model="posts.description">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Clear</button>
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
    name:"post-update",
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
        getPosts(){
            console.log(this.$route.params.id);
            axios.get(`/api/posts/${this.$route.params.id}`).then(response => {
                console.log(response.data);
                this.posts.title = response.data.title,
                this.posts.description = response.data.description
            }).catch(error=>{
                console.log(error)
                this.posts = []
            })
        },
        postUpdate(){
            this.$router.push({name:"UpdatePostConfirm"})
        }
    }
}
</script>