<template>
    <div>
        <div class="div1">{{AppStore.user.nameen}}
        <span class="badg1">{{AppStore.user.classname}}</span>
        </div>
        <p><button @click="getmarks()">getmarks</button></p>
        <!-- <p>Marks:{{marks}}</p> -->
           <div class="tg-wrap" ><table class="tbl-blue" v-if="marks!=''">
        <thead>
          <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Teacher</th>

            <th>{{marks_head[0].long}}</th>
            <th>{{marks_head[1].long}}</th>
            <th>{{marks_head[2].long}}</th>
            <th>{{marks_head[3].long}}</th>
            <th>{{marks_head[4].long}}</th>
            <th>{{marks_head[5].long}}</th>
            <th>{{marks_head[6].long}}</th>
            <th>{{marks_head[7].long}}</th>
           <!--  <th>{{marks_head[8].long}}</th> -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item,index) in marks.marks" :key="index">
            <td>{{index+1}}</td>
            <!-- <td>{{item.classname}}</td> -->
            <td>{{item.subject}}</td>
            <td v-if="item.myteacher">{{item.myteacher.nameen}}</td>
            <!-- <td>{{item.myteacher.id}}</td> -->
            <!-- <td>{{item.myteacher}}</td> -->
            <!-- <td>{{item.myteacher['name']}}</td> -->
            <td>{{item.sub1}}</td>
            <td>{{item.sub2}}</td>
            <td>{{item.sub3}}</td>
            <td>{{item.sub4}}</td>
            <td>{{item.sub5}}</td>
            <td>{{item.sub6}}</td>
            <td>{{item.sub7}}</td>
            <td>{{item.sub8}}</td>
          </tr>
        </tbody>
        </table></div>
<!-- 

:{ "id": 153, "name": "Ahmed1A545", "email": "Ahmed1A545@forqan",
 "email_verified_at": null, "project_name": "forqan", "usertype": "student",
  "schoolgroup_id": null, "school_id": 1, "class_id": null,
   "nid": null, "nameen": "Ahmed Alban", "namear": null, 
   "classname": "1A", "parent_id": null, "subjects": null,
    "lang": "en", "active": 1, "lastlogin": null, "lastonline": null, 
    "createdby": null, "notes": null, "created_at": "2022-10-06T01:20:07.000000Z",
 "updated_at": "2022-10-06T01:46:33.000000Z", "grade_id": null }

 -->


    </div>
</template>

<script setup>
import {useAppStore} from '@/stores/appstore'
import { ref, reactive } from 'vue';
// import Marks_import from '../admin/marks/marks_import.vue';

const AppStore = useAppStore();
const marks_head = ref(
[
{sub:"sub1",max:15  ,cute:"P"       ,long:'Participation         -المشاركة'},
{sub:"sub2",max:15  ,cute:"HW"      ,long:'Homework              -الواجبات'},
{sub:"sub3",max:15  ,cute:"Quiz"    ,long:'Quiz total           -الاختبارات الفترية'},
{sub:"sub4",max:20  ,cute:"Projects",long:'Projects - activities -المشاريع -الانشطة'},
{sub:"sub5",max:35  ,cute:"Exam"    ,long:'Trimester Test        -الاختبار الفصلي'},
{sub:"sub6",max:100 ,cute:"Total"   ,long:'Total                 -المجموع'},
{sub:"sub7",max:'A+',cute:"Grade"   ,long:'Grade                 -التقدير'},
{sub:"sub8",max:''  ,cute:"Notes"   ,long:'notes                 -ملاحظات'},
])
            const marks = ref('');
            // const featureState = reactive({ property: 'value' });
async function getmarks(){


                 // this.loading = true;  
                 try{
                 await axios.post("/api/forqan/student/marks/getmarks" )
                 .then((res) => {
                    marks.value = res.data;
 console.log(res.data);
                 // this.loading = false;
                 });
                 } catch (e) {
                 console.log(e);

                 // alert(e.response.status);
                 }
               }
</script>

<style lang="scss" scoped>

</style>