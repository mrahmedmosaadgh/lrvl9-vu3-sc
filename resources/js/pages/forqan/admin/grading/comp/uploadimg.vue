<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Laravel Vue JS File Upload Demo</div>
                  <div class="card-body">
                      <div v-if="success != ''" class="alert alert-success">
                          {{success}}
                      </div>
                      <form @submit="formSubmit" enctype="multipart/form-data">
                        <label for="file-upload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Custom Upload
</label>
<input id="file-upload" type="file" v-on:change="onChange" />




                          <input type="file" class="form-control h-24" v-on:change="onChange">
                          <button class="btn btn-primary btn-block">Upload</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>




      <!-- <upload-media 
    server="/api/upload"
    error="@error('media'){{$message}}@enderror">
  </upload-media> -->




  <update-media 
    server="/api/upload"
    media_file_path="/post_images"
    media_server="/api/media/1" 
    error="@error('media'){{$message}}@enderror">
  </update-media>
  -------------------------------------------------
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<img src="/postsImages/1.png" alt="">
<br>
<br>
<br>
<br>
<br>
<br>
  <br>
  <br>
  

<!-- <update-media 
    server="/api/upload"
    media_file_path="/post_images"
    media_server="/api/media/{{$post->id}}" 
    error="@error('media'){{$message}}@enderror">
  </update-media> -->







  </div>
</template>
<script>
  export default {
      data() {
          return {
              name: '',
              file: '',
              success: ''
          };
      },
      methods: {
          onChange(e) {
              this.file = e.target.files[0];
          },
          formSubmit(e) {
              e.preventDefault();
              let existingObj = this;
              const config = {
                  headers: {
                      'content-type': 'multipart/form-data'
                  }
              }
              let data = new FormData();
              data.append('file', this.file);
              axios.post('/api/uploadimg', data, config)
                  .then(function (res) {
                      existingObj.success = res.data.success;
                  })
                  .catch(function (err) {
                      existingObj.output = err;
                  });
          }
      }
  }
</script>
<style  scoped>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>