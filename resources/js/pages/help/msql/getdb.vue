<template>
    <div>
        <h1>hi help</h1>
        <p @click="done" class=" bg-slate-700 text-white">{{art}}</p>
        <p>res:{{dbres}}</p>
        <p>res2:{{dbres2}}</p>

        <div v-if="dbres!=null">
            <div v-for="item in dbres.message2" :key="item.id">
                <button @click="showcols(item.table_name)"> {{ item.table_name }}</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const el = ref()


const art=ref('dddd')
const dbres=ref(null)
const dbres2=ref(null)
onMounted(() => {
  el.value // <div>
    // new Date().getFullYear() 
})
  const  done=()=>{
       axios
        .post("/api/help", {
        //   params: {
        //     search: this.title,
        //   },
        })
        .then((response) => {
            console.log(response.data);
            dbres.value=response.data
        //   this.posts = response.data.data;
        //   this.links = response.data.meta.links;
        })
        .catch((error) => {
          console.log(error);
        });

};
        const  showcols=(table_name)=>{
               axios
        .post("/api/help/showcols", {
        //   params: {
        //     search: this.title,
        //   },
        })
        .then((response) => {
            console.log(response.data);
            dbres.value=response.data
        //   this.posts = response.data.data;
        //   this.links = response.data.meta.links;
        })
        .catch((error) => {
          console.log(error);
        });

};

</script>

<style scoped>

</style>