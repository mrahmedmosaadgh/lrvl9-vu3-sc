<template>
    <div>
        resources\js\pages\forqan\admin\grading\insertone.vue
                <p><button @click="insertone()">insertone</button></p>
                <div v-for="(i,index) in colsdb" :key="index">
                  {{ i }}: <input v-model="todb[i]" type="text" />
                </div>
                <p>todb:{{todb}}</p>
                <p>fromdb:{{fromdb}}</p>
    </div>
</template>

<script setup>
    import { ref, reactive } from 'vue';
    import {useAppStore} from '@/stores/appstore'
    const AppStore = useAppStore();
            const fromdb = ref('');
            const colsdb = ref(
                // ['name','letter']
                ['name','letter','from','to']
            );
            const todb = ref(
{
    'name'  :'',
    'letter':'',
    'from'  :'',
    'to'    :''
}
            );
            
            // const featureState = reactive({ property: 'value' });

    async  function insertone(){
                AppStore.loading = true;

                try{
                        await axios.post("/api/grading/insertone",
                        {
                            'todb':todb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        this.fromdb = res.data;
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        // alert(e.response.status);
                }
              }//insertone end
</script>

<style scoped>

</style>