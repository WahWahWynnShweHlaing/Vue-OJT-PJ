<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Post Confirm</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updatePostConfirm">
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
    name:"update-post-confirm",
    data(){
        return {
            posts:{
                title:"",
                description:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showPost()
    },
    methods:{
        async showPost(){
            await axios.get(`/api/posts/${this.$route.params.id}`).then(response=>{
                const { title, description } = response.data
                this.posts.title = title
                this.posts.description = description
            }).catch(error=>{
                console.log(error)
            })
        },
        async updatePostConfirm(){
            await axios.post(`/api/posts/${this.$route.params.id}`,this.posts).then(response=>{
                this.$router.push({name:"IndexPost"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>