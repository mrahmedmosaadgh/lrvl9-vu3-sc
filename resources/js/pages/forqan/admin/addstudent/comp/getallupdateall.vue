<template>
    <div class="backm">
        <!-- getallupdateone
        <p><button @click="getall()">getall</button></p>
        <button @click="canedit=!canedit">edit</button> -->
        <!-- <font-awesome-icon icon="fa-solid fa-pen" class=" svsave"  @click="canedit=!canedit"/>    -->
        <!-- <div class="roster-class-selector" id="yui_3_18_1_1_1667247525855_318">
            <div class="colored-dropdown-selector-area" id="yui_3_18_1_1_1667247525855_317">
                <div role="button" class="colored-dropdown-selector-wrapper"
                    style="background-color: rgb(90, 169, 230); color: rgb(255, 255, 255);">
                    <div class="selected-option">3A</div>
                    <div class="selector-dropdown-arrow selected"></div>
                </div>
                <div class="selector-dropdown-menu">
                    <div class="selector-dropdown-option-wrapper">
                        <div role="button" class="selector-dropdown-option">
                            <div class="selector-dropdown-option-text" style="color: rgb(19, 172, 230);">All students</div>
                            <div class="selector-dropdown-option-hover"></div>
                        </div>
                    </div>
                    <div class="selector-dropdown-option-wrapper">
                        <div role="button" class="selector-dropdown-option">
                            <div class="selector-dropdown-option-text" style="color: rgb(140, 199, 19);">2A</div>
                            <div class="selector-dropdown-option-hover"></div>
                        </div>
                    </div>
                    <div class="selector-dropdown-option-wrapper">
                        <div role="button" class="selector-dropdown-option">
                            <div class="selector-dropdown-option-text" style="color: rgb(90, 169, 230);">3A</div>
                            <div class="selector-dropdown-option-hover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <p>classes:{{classeslist}}</p>
       <br>
       <!-- <br> -->
        <p>{{msgdb}}</p>
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
                                <th>
                                    <font-awesome-icon icon="fa-solid fa-pen" class=" svsave"  @click="canedit=!canedit" v-show='!canedit' />   
                                    <font-awesome-icon icon="fa-solid fa-floppy-disk" class=" svsave"  @click="updateall()" v-show='canedit'/>  
                                    <!-- <font-awesome-icon icon="fa-solid fa-xmark" class=" svx" @click="canedit=!canedit" v-show='canedit'/> -->
                                    <font-awesome-icon icon="fa-solid fa-circle-xmark" class=" svx text-lg" @click="canedit=!canedit" v-show='canedit'/>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td colspan="10">
<button   :disabled="!canedit" :class="(!canedit)?' text-gray-600 m-0 p-0':''" @click="updateall()">update all</button>


                                </td>
                            </tr> -->
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
                                <td  >
                                    <font-awesome-icon icon="fa-solid fa-xmark" class=" svx" @click="deleteone(fromdb[index]['id'])" v-show='canedit'/>
                                    <!-- <button @click="deleteone(fromdb[index]['id'])">deleteone</button> -->
              
                                </td>
                                <!-- updateone------------------------------------ -->

                                <!-- ------------------------------------ -->
                            </tr>










<!-- new------------------------------------------------------------------- -->
<tr class=" bg-green-200">
<td></td>
        <td v-for="(i, inx) in colsdb" :key="inx" >
                                  <span v-if="!canadd">
                                    {{ i  }}
                                  </span>
                                  <span v-else>
                                      <input v-model="todb[i]" type="text" class="fillIn" @focus="$event.target.select()" />
                                    </span>

                                    <!-- <input v-model="todb[index][item[i]]" type="text" /> -->
                                </td>
                                <td>
                                    <font-awesome-icon icon="fa-solid fa-plus" @click="canadd=!canadd" class="svsave" v-show='!canadd'/>

                                    <font-awesome-icon icon="fa-solid fa-floppy-disk" class="svsave" @click="insertone()"  v-show='canadd'/>

                                    <font-awesome-icon icon="fa-solid fa-circle-xmark" class=" svx text-lg" @click="canadd=!canadd" v-show='canadd'/>
                                    <!-- <button @click="insertone()">save</button> -->
                                </td>

<!-- new------------------------------------------------------------------- -->
</tr>




                        </tbody>
                    </table>
                    <!-- <p>todb[0]:{{todb }}</p> -->
                </div>
<br>
<br>
<br>
<br>
<br>
    </div>
</template>

<script setup>
    import { ref ,onMounted} from 'vue';
    import {useAppStore} from '@/stores/appstore'
    const AppStore = useAppStore();
            const fromdb = ref('');
            const colsdb = ref(
                [
"id"            ,
"name"          ,
"email"         ,
"project_name"  ,
"usertype"      ,
"schoolgroup_id",
"school_id"     ,
"class_id"      ,
"nid"           ,
"nameen"        ,
"namear"        ,
"classname"     ,
"subjects"      ,
                ]
            );
            const todb = ref(
                {
    "id"            : 151,
    "name"          : "Forqan",
    "email"         : "Forqan@Forqan.com",

    "project_name"  : "forqan",
    "usertype"      : "student",
    "schoolgroup_id": "1",
    "school_id"     : 1,
    "class_id"      : null,
    "nid"           : null,
    "nameen"        : null,
    "namear"        : null,
    "classname"     : null,

    "subjects"      : null,

}
            );
            //canedit
            const canedit = ref(false);
            const canadd = ref(false);
            const msgdb = ref('');
onMounted(()=>{
    getall()
})
    //   async getall( ()=>{//  getall  ---------------------------------------
    async  function getall(){//  getall  ---------------------------------------
                AppStore.loading = true;
                try{
                        await axios.post("/api/forqan/admin/student/add/getall",
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
              }//insertone end)

              async  function updateall(){
                if(!confirm('Are you sure?')){ return}
                AppStore.loading = true;

                try{
                        await axios.post("/api/forqan/admin/student/add/updateall",
                        {
                            'todb':fromdb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        canedit=!canedit
                        // fromdb.value = res.data.db;
                        msgdb.value = res.data.msg;
                        console.log(res.data);
                        });
                } catch (e) {
                    canedit=!canedit
                        AppStore.loading = false;
                        console.log(e);
                        msgdb.value = e;

                }
              }//updateone end


              async  function insertone(){
                if (                        todb.value.name=='' ) {
           alert('fill all fields')      
           return   
                }
                if(!confirm('Are you sure?')){ return}
                AppStore.loading = true;

                try{
                        await axios.post("/api/forqan/admin/student/add/insertone",
                        {
                            'todb':todb.value,
                            'colsdb':colsdb.value,
                        }
                        
                         )
                        .then((res) => {
                        AppStore.loading = false;
                        this.fromdb = res.data;
                        canedit=!canedit
                        todb.value = 
{
    'name'  :'',
    'letter':'',
    'from'  :'',
    'to'    :''
}
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
                        await axios.post("/api/forqan/admin/student/add/deleteone",
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
.selected-option {
    display: inline-block;
    margin-left: 16px;
    max-width: 350px;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: top;
}

:focus-visible {
    outline: -webkit-focus-ring-color auto 1px;
}

div {
    display: block;
}
style attribute {
    background-color: rgb(90, 169, 230);
    color: rgb(255, 255, 255);
}
.colored-dropdown-selector-wrapper {
    border-radius: 14px;
    cursor: pointer;
    height: 28px;
}
.colored-dropdown-selector-area {
    display: inline-block;
    font-family: Roboto,sans-serif;
    font-size: 16px;
    height: 28px;
    line-height: 28px;
    max-width: 512px;
    position: relative;
    white-space: nowrap;
}
.teacher-dashboard .dashboard-header .roster-class-selector {
    display: inline-block;
    line-height: 28px;
    margin: 12px 0 0 20px;
    vertical-align: top;
}
body.ixl-skin {
    text-align: left;
}
body {
    font: 13px Verdana,arial,helvetica,clean,sans-serif;
    background: #fff;
}
button, html, input, select, textarea {
    font-family: Verdana,sans-serif;
}
html {
    font-size: 100%;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

element.style {
    color: rgb(140, 199, 19);
}
.selector-dropdown-option-wrapper .selector-dropdown-option .selector-dropdown-option-text {
    margin: 0 21px;
    overflow: hidden;
    text-overflow: ellipsis;
}


div {
    display: block;
}
.selector-dropdown-option-wrapper {
    cursor: pointer;
    max-width: 580px;
}
.selector-dropdown-menu {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 33%);
    cursor: default;
    margin-top: 9px;
    padding: 24px 0 21px 0;
    position: absolute;
    top: 28px;
    z-index: 3;
}
.selected:hover {
    background-color: rgb(139, 136, 136);
    /* border-radius: 5px;
    box-shadow: 0 2px 4px 0 rgb(0 0 0 / 33%);
    cursor: default;
    margin-top: 9px;
    padding: 24px 0 21px 0;
    position: absolute;
    top: 28px;
    z-index: 3; */
}
.colored-dropdown-selector-area {
    display: inline-block;
    font-family: Roboto,sans-serif;
    font-size: 16px;
    height: 28px;
    line-height: 28px;
    max-width: 512px;
    position: relative;
    white-space: nowrap;
}
.teacher-dashboard .dashboard-header .roster-class-selector {
    display: inline-block;
    line-height: 28px;
    margin: 12px 0 0 20px;
    vertical-align: top;
}
body.ixl-skin {
    text-align: left;
}
body {
    font: 13px Verdana,arial,helvetica,clean,sans-serif;
    background: #fff;
}
button, html, input, select, textarea {
    font-family: Verdana,sans-serif;
}
html {
    font-size: 100%;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

</style>