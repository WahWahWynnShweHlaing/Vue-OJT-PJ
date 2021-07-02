<template>
    <div class="container mt-5">
      <h1 class="mb-5">Login Form</h1>
      <form>
        <div class="row">
          <div class="col-12 mb-2">
              <div class="form-group">
                  <label>email</label>
                  <input type="email" class="form-control" name="email" id="email" v-model="users.email">
              </div>
          </div>
          <div class="col-12 mb-2">
              <div class="form-group">
                  <label>password</label>
                  <input type="password" class="form-control" name="password" id="pass" v-model="users.password">
              </div>
          </div>
         
        </div>
         <b-button  @click="login" name="login" variant="primary">Login</b-button>
      </form>
    </div>
</template>

<script>
  export default {
    data() {
      return {
         users:{
         email: '',
         password: '',
         }
      }
    },
     methods:{
        login() {
            var loginemail = document.getElementById('email').value;
            var loginpass = document.getElementById('pass').value;
             axios.post('/api/logintest',{email : loginemail,password : loginpass} ).then(response => {
               this.$router.push({name:"IndexPost"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
  }
</script>