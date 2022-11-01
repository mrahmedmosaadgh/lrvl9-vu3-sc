<template>
    <div>
        getallupdateone
        <p><button @click="getall()">getall</button></p>
        <button @click="canedit=!canedit">edit</button>
        <p>msgdb:{{msgdb}}</p>
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
                            <tr>
                                <td colspan="10">
<button   :disabled="!canedit" :class="(!canedit)?' text-gray-600 m-0 p-0':''" @click="updateall()">update all</button>


                                </td>
                            </tr>
                            <tr v-for="(item, index) in fromdb" :key="index">
                                <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'">
                                    {{ index + 1 }}
                                </td>
                                <td v-for="(i, inx) in colsdb" :key="inx" >
                                  <span v-if="!canedit">
                                    {{ item[i]  }}
                                  </span>
                                  <span v-else>
                                      <input v-model="fromdb[index][i]" type="text" class="fillIn" @focus="$event.target.select()" />
                                    </span>

                                    <!-- <input v-model="todb[index][item[i]]" type="text" /> -->
                                </td>
                                <td><button @click="deleteone(fromdb[index]['id'])">deleteone</button></td>
                                <!-- updateone------------------------------------ -->

                                <!-- ------------------------------------ -->
                            </tr>










<!-- new------------------------------------------------------------------- -->
<tr class=" bg-green-200">
<td></td>
        <td v-for="(i, inx) in colsdb" :key="inx" >
                                  <span v-if="!canedit">
                                    {{ i  }}
                                  </span>
                                  <span v-else>
                                      <input v-model="todb[i]" type="text" class="fillIn" @focus="$event.target.select()" />
                                    </span>

                                    <!-- <input v-model="todb[index][item[i]]" type="text" /> -->
                                </td>
                                <td>
                                    <button @click="insertone()">save</button>
                                </td>

<!-- new------------------------------------------------------------------- -->
</tr>




                        </tbody>
                    </table>
                    <p>todb[0]:{{todb }}</p>
                </div>
<br>
<br>
<br>
<br>
<br>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
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
            //canedit
            const canedit = ref(false);
            const msgdb = ref('');
            
    async  function getall(){//  getall  ---------------------------------------
                AppStore.loading = true;
                try{
                        await axios.post("/api/grading/getall",
                        {
                            'todb':fromdb.value,
                            'colsdb':colsdb.value,
                        }
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        fromdb.value = res.data.db;
                        msgdb.value = res.data.msg;
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        fromdb.value = e;
                        msgdb.value = e;
                }
              }//getall end

              async  function updateall(){
                if(!confirm('Are you sure?')){ return}
                AppStore.loading = true;

                try{
                        await axios.post("/api/grading/updateall",
                        {
                            'todb':fromdb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;

                        // fromdb.value = res.data.db;
                        msgdb.value = res.data.msg;
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        msgdb.value = e;

                }
              }//updateone end


              async  function insertone(){
                if(!confirm('Are you sure?')){ return}
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
                        getall()
                        console.log(res.data);
                        });
                } catch (e) {
                        AppStore.loading = false;
                        console.log(e);
                        // alert(e.response.status);
                }
              }//insertone end

              async  function deleteone(id){
                if(!confirm('Are you sure?')){ return}
                AppStore.loading = true;

                try{
                        await axios.post("/api/grading/deleteone",
                        {
                            'id':id,
                            'todb':todb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        msgdb.value = res.data.msg;
                        getall()
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