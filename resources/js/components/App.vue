<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
						
                <router-link to="/" class="navbar-brand" href="#">SCM Bulletine Board</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link exact-active-class="active" to="/users/index_user" class="nav-item nav-link">Users</router-link>
                        <router-link exact-active-class="active" to="/users/:id/user_profile" class="nav-item nav-link">User Profile</router-link>
                        <router-link exact-active-class="active" to="/posts/index_post" class="nav-item nav-link">Posts</router-link>
                        <router-link exact-active-class="active" to="/category" class="nav-item nav-link">Category</router-link>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
    export default {}
</script>