<template>
    <div>
        <p>Name:
            <span v-if="AppStore.user!=null" class=" bg-black text-white px-3 py-1 m-3 rounded text-xl">{{AppStore.user.nameen}}</span>
            </p>
        <!-- teacherhome-------------AppStore.user:{{AppStore.user}} {{editmood}}-->
        <p class="m-3 p3"><button @click="editmood=!editmood">Edit Mood</button> </p>

<!-- <p>showedit:{{showedit}}</p> -->
        <!-- list of classname---------------------------------------------------- -->
        <div class="   text-center">
            <button v-for="(item,index ) in JSON.parse(AppStore.user.classname)" 
            :key="index" 
            @click="class_get_students_fun(item)"
            >
            {{ item }}</button>
        </div>
        <!-- list of classname---------------------------------------------------- -->
        <!-- list of subjects---------------------------------------------------- -->
        <div class="   text-center">
            <button v-for="(item,index) in JSON.parse(AppStore.user.subjects)" :key="item.id" @click="subchoosefun(index)">{{
                item }}</button>
        </div>
        <!-- list of subjects---------------------------------------------------- -->
<div class="text-center   w-full ">
           <table  >
             <thead>
               <tr>
                 <th>class</th>
                 <th>subject</th>
               </tr>
               <tr>
                 <th><span class=" bg-black text-white px-3 py-1 rounded">{{myclass}}</span></th>
                 <th><span class=" bg-black text-white px-3 py-1 rounded">{{mysubject}}</span></th>
               </tr>
             </thead>

           </table></div>
<!-- <p class=" text-xl"><span class=" bg-black text-white px-3 py-1 rounded">{{myclass}}</span></p>
<p class=" text-xl"> <span class=" bg-black text-white px-3 py-1 rounded">{{mysubject}}</span></p>

 -->









  <div class="    bg-blue-400 flex">
<div  class="   bg-red-200  " v-show="editmood">

<div v-for="(item,index) in 7" :key="index" class=" w-full">
  <label :for="'rr'+index" class=" cursor-pointer Button  w-full ">
      <input type="radio" v-model="editchoose" 
      :value="'sub'+index" 
      @change="colchoosetoedit(index)" 
      :id="'rr'+index"
      class=" hidden"
      >{{marksheadlist[index]}}<br>
    </label>

</div>
<!--  -->

 <p><button @click="saveallmarksfunconfirm()" class="w-full bg-red-500 text-black border-2 border-gray-800 border-solid button">save all</button></p>
</div>
 <!-- t_head=[], -->
        <!-- t_body=[], -->
               

        <div class="tg-wrap p-4" v-if="t_head != null" >
            <p>activesubtitle:{{activesubtitle}}</p>
            <table class="tg "   >
                <thead>
                    <tr>
                        <th class="th-tg1">#</th>
                        <th class="th-tg1 td">Name</th>
                     <!-- marktitlearray  -->
                       <th
                            v-for="(item, index) in marktitlearray" 
                            :key="index"
                            v-show="showedit['sub'+(index+1)] || editmood==false"
                            class="th-tg1" :class="(item=='notes')?'th':''"
                        >

                        
                        {{ item }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in mymarks" :key="index">
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'" class="  ">
                            {{ index + 1 }}
                        </td>










                        <td :class="index % 2 == 0 ? 'td-tg1 td' : 'td-tg2 td' " >

                            {{ item['mystudents']['nameen']}}
                        </td>
                        
                        
                        
                        <!-- repeated 11 -->
                        <td  v-for="(itemsub,indexsub) in marktitlearray2" :key="indexsub"
                                           :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' "  
                                        v-show="showedit['sub'+(indexsub+1)] || editmood==false">




                        <div v-show="editmood"
                        
                        
                        >
                          <input 
                            v-model.number="mymarks[index]['sub'+(indexsub+1)]" type="number" step="1" 
                            v-show="showedit['sub'+(indexsub+1)] && editmood" 
                            :class="(
                                maxmark['sub'+(indexsub+1)]
                                <
                                mymarks[index]['sub'+(indexsub+1)]
                                ||
                                
                                mymarks[index]['sub'+(indexsub+1)]
                                <
                                maxmark['sub'+(indexsub+1)]/2
                                
                                )?' bg-red-400':'bg-green-400'"
                            
                            />
                            <!-- <p>maxmark[indexsub]{{maxmark['sub'+(indexsub+1)]}}</p> <br>
                            <p>mymarks[index]['sub'+(indexsub+1)]:{{mymarks[index]['sub'+(indexsub+1)]}}</p> -->
                        </div>




                        <div v-show="editmood==false"> 
                            {{ item['sub'+(indexsub+1)]}}
                            </div>




                        </td>




<!-- 

                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' "  v-show="showedit['sub1'] || editmood==false">
                            {{ item['sub1']}}
                            <input v-model.number="mymarks[index]['sub1']" type="number" step="1" v-show="showedit['sub1'] && editmood" />
                        </td>

                        
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub2']}}
                            <input v-model.number="mymarks[index]['sub2']" type="number" step="1" v-show="showedit['sub2'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub3']}}
                            <input v-model.number="mymarks[index]['sub3']" type="number" step="1" v-show="showedit['sub3'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub4']}}
                            <input v-model.number="mymarks[index]['sub4']" type="number" step="1" v-show="showedit['sub4'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub5']}}
                            <input v-model.number="mymarks[index]['sub5']" type="number" step="1" v-show="showedit['sub5'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub6']}}
                            <input v-model.number="mymarks[index]['sub6']" type="number" step="1" v-show="showedit['sub6'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub7']}}
                            <input v-model.number="mymarks[index]['sub7']" type="number" step="1" v-show="showedit['sub7'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub8']}}
                            <input v-model.number="mymarks[index]['sub8']" type="number" step="1" v-show="showedit['sub8'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " >
                            {{ item['sub9']}}
                            <input v-model.number="mymarks[index]['sub9']" type="number" step="1" v-show="showedit['sub9'] && editmood" />
                        </td>
                        <td :class="index % 2 == 0 ? 'td-tg1 td' : 'td-tg2 td' " >
                            {{ item['notes']}}
                        </td>

 -->



                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </div>
    <!-- <component :is="marks_all" v-show="!editmood" /> -->

            </div>
</template>

<script setup>
   import {ref,onMounted} from 'vue'
   import {useAppStore} from '@/stores/appstore'
import {useTeacherStore} from '@/stores/Teacherstore'
import Swal from 'sweetalert2'

// CommonJS
// const Swal = require('sweetalert2')
// const Swal = Swal
// import marks_all from './marks_all.vue'
            const AppStore = useAppStore();
            const TeacherStore = useTeacherStore();
            const mysubject = ref('');
            const datadb = ref('');
            const myclass = ref('');
            const mymarks = ref('');
            const marktitlearray = ref(
                [
"P"       ,
"HW"      ,
"Q1"      ,
"Q2"      ,
"Qtotal"  ,
"Projects",
"exam"    ,
"total"   ,
"grade"   ,
"notes"   ,
                ]
            );
            const marktitlearray2 = ref(
                [
"sub1" ,
"sub2" ,
"sub3" ,
"sub4" ,
"sub5" ,
"sub6" ,
"sub7" ,
"sub8" ,
"sub9" ,
"sub10",
                ]
            );
            const showedit = ref(
                
            {
"sub1":false,
"sub2":false,
"sub3":false,
"sub4":false,
"sub5":false,
"sub6":false,
"sub7":false,
"sub8":false,
"sub9":false,
"sub10":false,
            }
            )

            const maxmark = ref(
                
            {
"sub1":15,
"sub2":15,
"sub3":15,
"sub4":15,
"sub5":15,
"sub6":20,
"sub7":35,
"sub8":100,
"sub9":20,
"sub10":'A+',
"sub11":'',
            }
            )
// "P"       =15,
// "HW"      =15,
// "Q1"      =15,
// "Q2"      =15,
// "Qtotal"  =15,=>calc
// "Projects"=20,
// "exam"    =35,
// "total"   =100,
// "grade"   =+A=>>90,
// "notes"   ='',


            // const txtw = ref(
            //     {\"P\":12,\"HW\":11,\"Q1\":null,\"Q2\":null,\"Qtotal\":null,\"Projects\":null,\"exam\":null,\"total\":55,\"grade\":null,\"notes\":null}
            // );
            const activesubtitle = ref('');
            const editmood = ref(false);
            const editchoose = ref(0);
            const t_head = ref([1,2,3,4,5,6,7,8]);
            const t_body = ref([1,2,3,4,5,6,7,8]);
            const marksheadlist=ref([
'Participation /درجات المشاركة / 15	     ',
'Homework / الواجبات / 15	                 ',
// 'Attendance/ الحضور / 10	         editmood            ',
'Quizz1 / الاختبارات الفترية / 15	         ',
'Quizz2 / الاختبارات الفترية / 15	         ',
'Quizz total / الاختبارات الفترية / 15	     ',
'Projects - activities/المشاريع -الانشطة / 20',
'Quarter Test /الاختبار الربعي / 35	         ',
'Total/ المجموع / 100	                     ',
'Grade التقدير ',
'notes   ',
            ])
//             onMounted(() => {
//     subchoosefun(0)
// })

onMounted(() => {
AppStore.loading=true
    mysubject.value=JSON.parse(AppStore.user.subjects)[0]
    myclass.value=JSON.parse(AppStore.user.classname)[0]
    class_get_students_fun(myclass.value)
AppStore.loading=false

})
function subchoosefun(index){
    mysubject.value=JSON.parse(AppStore.user.subjects)[index]

}
function classchoosefun(index){
    mysubject.value=JSON.parse(AppStore.user.classname)[index]

}
    async  function fromdbfun(){
                // this.loading = true;  
                try{
                await axios.post("/api/class/all" )
                .then((res) => {
                datadb.value = res.data;
console.log(res.data);
                // this.loading = false;
                });
                } catch (e) {
                console.log(e);
                // alert(e.response.status);
                }
              } 
          
              async  function  class_get_students_fun(classname) {
AppStore.loading=true

                console.log('class_get_students_fun(classname)  1');
                // alert(1)
            myclass.value=classname
 AppStore.myclass= classname;
            // var array={'P':12,'HW':11,'Q1':null,'Q2':null,'Qtotal':null,'Projects':null,'exam':null,'total':55,'grade':null,'notes':'ddddd'}

                            try{
                            // await axios.post("/api/forqan/teacher/class/getstudents",classname )
                            await axios.post("/api/forqan/teacher/class/getstudents",{
                                'classname':classname,
                                'subject':mysubject.value,

                            
                            } )
                            .then((res) => {
                            // mystudents.value = res.data.data;
                            Swal.fire('data loading Done !', '', 'success')
                            AppStore.mystudents= res.data.mystudents;
                            mymarks.value=res.data.marks
                            console.log('res.data.marks');
                            console.log(res.data.marks[0]['mystudents']['nameen']);
                            console.log(mymarks.value[0]['mystudents']['nameen']);
AppStore.loading=false
                           

                            // this.loading = false;
                            });
                            } catch (e) {
                            console.log(e);
AppStore.loading=false

                            // alert(e.response.status);
                            }

        }

        function colchoosetoedit(index){

showedit.value=            {
"sub1":false,
"sub2":false,
"sub3":false,
"sub4":false,
"sub5":false,
"sub6":false,
"sub7":false,
"sub8":false,
"sub9":false,
"sub10":false,
            }
            showedit.value['sub'+(index+1)]=true
console.log('sub'+index+1);
console.log(showedit.value['sub'+(index+1)]);

activesubtitle.value=marksheadlist.value[index]
console.log(activesubtitle.value);



}


function saveallmarksfunconfirm(){
    Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    
console.log('result.isConfirmed');
saveallmarksfun()
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
console.log('result.isDenied');

    return
  }
})

}


 async function saveallmarksfun(){

    AppStore.loading=true
















 try{
  await axios.post('/api/forqan/teacher/saveallmarks',{mymarks:mymarks.value})
 .then((res) => {
    //  this.datamsg =res.data.message;
AppStore.loading=false

    Swal.fire('Saved!', '', 'success')
 console.log(res.data);
 mymarks.value=res.data.marks
 });
 } catch (e) {
AppStore.loading=false

     console.log(e);
//  this.datamsg = 'data error';
 }
 //setTimeout(() => this.datamsg = '', 5000);
 }

</script>

<style scoped>
/* td{
    font-size: x-large;
} */
/* table td { */
    /* width: 70px; */
    /* margin: 5px; */
    /* padding: 5px; */
    /* overflow: hidden; */
    /* display: inline-block; */
    /* white-space: nowrap; */
/* } */
table:hover tr:hover td {
    background-color: rgba(99, 167, 255, 0.921)!important;
    /* color: white; */
    /* z-index: 999999; */
}

/* table thead tr{
    display:block;
} */

table th,table td{
    width:80px;
    padding: 12px;
    font-weight: bold;
    /* font-family: system-ui!important; */
  
}
*{
      font-family: Tahoma, sans-serif !important;
}
/* table .th,table .td{
    width:170px;
} */

/* table  tbody{
  display:block;
  height:300px;
  overflow:auto;
} */


</style>