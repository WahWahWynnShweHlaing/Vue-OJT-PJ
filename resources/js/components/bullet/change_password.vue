<template>
   <div class="row">
      <div class="form-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Password Change</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="Changepassword">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" id="current" name="current_password">
                                    
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="newpass" name="new_password">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm" name="new_confirm_password">
                                    
                                </div>
                                 <div class="col-12">
                                   <button type="submit" class="btn btn-primary">Confirm</button>
                                 </div>
                                 <div class="col-12">
                                   <button type="reset" class="btn btn-primary">Clear</button>
                                 </div>
                            </div>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
      </div>
   </div>
</template>
<script>
  export default {
    name:"change_password",
    data(){
        return {
            users:{
                current_password:"",
                new_password:"",
                new_confirm_password:""
                
            }
        }
    },
  
        methods:{
        Changepassword() {
             var current = document.getElementById('current').value;
             var newpass = document.getElementById('newpass').value;
             var confirm = document.getElementById('confirm').value;
          
             axios.post('/api/passstore',{current : current,newpass : newpass,confirm : confirm}).then(response => {
               alert(current);
               this.$router.push({name:"User_Profile"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
  }

</script>