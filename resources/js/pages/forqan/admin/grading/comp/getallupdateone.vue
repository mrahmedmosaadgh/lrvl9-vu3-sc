<template>
    <div>
        getallupdateone
        <p><button @click="getall()">getall</button></p>
        <p>fromdb:{{fromdb}}</p>
         <!-- t_head=[], -->
                <!-- t_body=[], -->
                <div    >
                    <table class="tbl-blue">
                        <thead>
                            <tr>
                                <th class="th-tg1">#</th>
                                <th
                                    v-for="(item, index) in colsdb"
                                    :key="index"
                                    
                                >
                                    {{ item }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in fromdb" :key="index">
                                <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'">
                                    {{ index + 1 }}
                                </td>
                                <td v-for="(i, inx) in colsdb" :key="inx" >
                                    {{ item[i]  }}
                                </td>
                                <!-- updateone------------------------------------ -->
    <td>
        <button @click="updateone(item['id'])">updateone</button>
    </td>
                                <!-- ------------------------------------ -->
                            </tr>
                        </tbody>
                    </table>
                </div>

    </div>
</template>

<script setup>
    import { ref, reactive } from 'vue';
    import {useAppStore} from '@/stores/appstore'
    const AppStore = useAppStore();
            const fromdb = ref('');
            const colsdb = ref(
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
                        this.fromdb = res.data.db;
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        this.fromdb = e;

                }
              }//insertone end
              async  function updateone(id){
                AppStore.loading = true;

                try{
                        await axios.post("/api/grading/updateone",
                        {
                            'id':id,
                            'todb':todb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        fromdb.value = res.data.db;
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        this.fromdb = e;

                }
              }//updateone end
</script>

<style scoped>

</style>