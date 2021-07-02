<template>
   <div class="row">
      <div class="form-row">
        <div class="col-md-12">
          <label class="form-control-label"  for="input-file-import">Upload CSV File</label>
          <input type="file" class="form-control" :class="{ ' is-invalid' : error.message }" id="input-file-import" name="file_import" ref="import_file"  @change="onFileChange">
           <button type="submit" class="btn btn-primary">Confirm</button>
           <div v-if="error.message" class="invalid-feedback">
            
           </div>
        </div>
      </div>
   </div>
</template>
<script>
  export default {
     data() {
        return {
          error: {},
          import_file: '',
        }
      },
      methods: {
         onFileChange(e) {
        this.import_file = e.target.files[0];
    },

    proceedAction() {
        let formData = new FormData();
        formData.append('import_file', this.import_file);

          axios.post('/api/csv', formData, {
              headers: { 'content-type': 'multipart/form-data' }
            })
            .then(response => {
                if(response.status === 200) {
                 
                }
            })
            .catch(error => {
                
                this.uploading = false
                this.error = error.response.data
                console.log('check error: ', this.error)
            });
        },
      }
  }
</script>