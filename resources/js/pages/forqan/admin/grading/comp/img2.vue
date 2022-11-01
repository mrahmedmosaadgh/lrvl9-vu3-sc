
<script setup>
import { ref } from "vue";
// import { useFileUpdate } from "./composition-api/useFileUpdate.js";
const img1 =ref(null)
const previewImage =ref(null)
const filedata =ref(null)
const fileInput =ref(null)
const imgmsg =ref(null)
    // const { setFile, previewMap } = useFileUpdate();previewImage: null,

    // input DOM
    const inputDOM = ref(null);

    const fileChange = (e) => {
      console.log(e.target.files);
      setFile(e.target.files);
      img1.value=e.target.files[0]
    };

    const uploadImages = () => {
      inputDOM.value.click();
    };
    const pickFile = () => {
console.log('pickFile');

        let input = fileInput.value
        let file = input.files
       filedata.value=file[0]
        console.log(file[0]);
        
        if (file && file[0]) {
          let reader = new FileReader
          reader.onload = e => {
            console.log('e.target.result');
            // console.log(e.target.result);
            
            previewImage.value = e.target.result
          }
          reader.readAsDataURL(file[0])
        //   this.$emit('input', file[0])
        }
      }
      const handleSubmit = () => {
    //   handleSubmit() {
      let data = new FormData();
    //   data.append("image", imageFile.value);//this.filedata
      data.append("image", filedata.value);//
      axios
        // .post("http://127.0.0.1:8000/api/upload-image", data)
        .post("/api/marks/storeImage", data, {
    onUploadProgress: progressEvent => {
        // this.progress=Math.round(progressEvent.loaded / progressEvent.total*100)
        // this.mypercent=Math.round(progressEvent.loaded / progressEvent.total*100)
        // this.imgsrc="/marks/logo/"+this.$store.getters.user.id+".jpg?"+Math.random()

      console.log(Math.round(progressEvent.loaded / progressEvent.total*100))
    }
  })
        .then((response) => {
            console.log(response);
          imgmsg.value=  response.data.message
        //   imageUrl.value = "";
        //   imageFile.value = "";
        //   message.value = response.data.message;
        //   images.value = response.data.images;
        });
    }

</script>

<template>
  <div>
    <input
      ref="inputDOM"
      type="file"
      class="upload"
      name="imgUpload"
      multiple="multiple"
      @change="fileChange"
    />
    <button @click="uploadImages">uploadImages</button>
  </div>


    <img :src="img1" alt="" />

    
  <br>
-----------------------------------------------


<img :src="previewImage" :class="(previewImage)?' visible':' hidden dr'" alt=""   >

<p>imgmsg:{{imgmsg}}</p>
    <p><button @click="handleSubmit()">handleSubmit()</button>{{imgmsg}}</p>
<input class=" h-24"
  ref="fileInput"
  type="file"
  accept="image/png, image/gif, image/jpeg" 
  @input="pickFile">

-----------------------------------------------
    
  <br>
  <!-- previewImage:{{previewImage}} -->
 <br> 
 <br> 
  
  <!-- <div
    v-show="Object.values(previewMap).length !== 0"
    class="img_box"
    v-for="item in previewMap"
    :key="item"
  >
    <img :src="item" alt="" />
  </div> -->


  
</template>

<style>
/* .upload {
  position: fixed;
  top: -500px;
  left: -500;
  z-index: -100;
  opacity: 0;
} */
button {
  width: 300px;
  height: 60px;
  font-size: 30px;
}
.img_box {
  width: 300px;
  height: 300px;
  float: left;
  background-color: #000;
  margin: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
}
img {
  display: block;
  width: 100%;
  height: auto;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>