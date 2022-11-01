<template>
    <div  class="backm ">

        <!-- <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor> -->


<!-- 
        <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div> -->


<div class="dropdown select-none">
  <a href="#" @click="show1=!show1" class="dropbtn m-2 p-2">Dropdown

    <font-awesome-icon icon="fa-solid fa-play" v-show="!show1" />
    <font-awesome-icon icon="fa-solid fa-caret-down" v-show="show1"/>
<!-- <P>show1:{{show1}}</P> -->
</a>
<!-- <details>
  <summary  @click="show1=!show1" >
    menu111111
  </summary>

</details> -->
  <div id="myDropdown" class="dropdown-content " :class="(show1)?' show ':''">

    <div  v-for="(item,index) in comp" :key="index" class="w-full  bg-blue-800 text-blue-200">
                    <p class=" cursor-pointer hover:bg-blue-400 w-full"  
                    @click="compindex=index;show1=false"
                    :class="(compindex==index)?'  text-white bg-blue-600 border-red-600 ':''"
                    >{{comptitle[index]}}</p>
                </div>
  </div>
</div>










        <!-- resources\js\pages\forqan\admin\grading\gradinghome.vue -->
        <!-- <div class="flex      h-20  m-3 p-3 ">
            <details :open="isopen" @click="isopen=false" class=" z-40     select-none">
              <summary class="   m-2 p-3 overflow-visible  hover:bg-blue-400    cursor-pointer">
                pages
              </summary>
                <div  v-for="(item,index) in comp" :key="index" class="w-full  bg-blue-800 text-gblue-200">
                    <p class=" cursor-pointer hover:bg-blue-400 w-full"  
                    @click="compindex=index;isopen=true"
                    :class="(compindex==index)?'  text-white bg-blue-600 border-red-600 ':''"
                    >{{comptitle[index]}}</p>
                </div>

            </details>

            </div> -->

<!-- 
            <div>

               <p> code help------------(comptitle) to add component -----------------------------------------------</p>
                
               
               <div class="bg-green-200">

                <input v-model="comptitlenew" type="text" /><button @click="addtoarray(comptitlenew)">add</button>
               <div v-for="item in comptitle" :key="item.id">
                    
                    import {{ item }} from  './comp/{{ item }}.vue'
                </div>

               const comp = shallowRef([
                <span v-for="(item,index) in comptitle" :key="item.id">
                    {{ item }} ,
                </span> ]);
 <p>             const comptitle = ref({{comptitle}});</p>
</div>
 <p> code help-----------------------------------------------------------</p>

            </div> -->
             <component :is="comp[compindex]" />
    </div>
</template>

<script setup>
    // import { ref } from 'vue';
    import { ref, reactive, shallowRef } from 'vue';

    // import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
    // import '@ckeditor/ckeditor5-build-classic/build/translations/tr';
    // import Font from '@ckeditor/ckeditor5-font/src/font';
    
    
    // import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    // import(`../icons/icon-${props.name}.vue`).then(val => {
        //   // val is a Module has default
    //   currentIcon.value = val.default
    // })
    // import(`./insertone.vue`).then(val => {currentIcon.value = val.default})
    // import insertone from  './comp/insertone.vue'
    // import getall from  './comp/getall.vue'
    // import getallupdateone from './comp/getallupdateone.vue'
    import getallupdateall from './comp/getallupdateall.vue'
    import importxls from './comp/importxls.vue'
    import marks_Profile from './comp/marks_Profile.vue'
    import uploadimg from './comp/uploadimg.vue'
    import img2 from './comp/img2.vue'
    
    // import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
    // const editor = ref(ClassicEditor)
    // const isopen = ref(ClassicEditor)
    
    const show1 = ref(false)
    // const show1 = ref(false)
    // const show1 = ref(false)
    // const show1 = ref(false)
    // const editorData = ref('<p>Content of the editor.</p>')
    // const editorConfig = ref({
    //                 // The configuration of the editor.
    //             })


                // marks_Profile.vue
                
const comp = shallowRef([  getallupdateall , importxls , marks_Profile , uploadimg,img2  ]);
const comptitle = ref([  "getallupdateall", "importxls", "marks_Profile", "uploadimg","img2" ]);

    const compindex = shallowRef(0)
    const activecompindex = ref(0)




</script>

<style scoped>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>