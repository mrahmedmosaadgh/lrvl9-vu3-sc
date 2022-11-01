<template>
    <div>
        getall
        <p><button @click="getall()">getall</button></p>
        <p>todb  :{{todb}}</p>
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

    async  function getall(){
                AppStore.loading = true;

                try{
                        await axios.post("/api/grading/getall",
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
                        this.fromdb = e;

                }
              }//insertone end
</script>

<style scoped>

</style>