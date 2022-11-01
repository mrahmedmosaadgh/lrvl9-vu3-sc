<template>
    <div>

        <p class="p-2 m-2">Mr:
            <span  class=" bg-black text-white px-3 py-1 m-2 rounded text-xl">{{mynameen}}</span>
            </p>
        <!-- teacherhome-------------AppStore.user:{{AppStore.user}} {{editmood}}-->
        <!-- <p class="m-5 p3"><button @click="editmood=!editmood">Edit Mood</button> </p> -->
<div class="  w-full m-auto bg-blue-400 text-center">
<div class="card    m-2 p-2 flex">
    <!-- list of classname---------------------------------------------------- -->
                    <select v-model="myclass" >
                                <option  v-for="(item,index) in myclasses" :key="index"
                                :value="item">{{item}}
                                </option>
                    </select>

                    <!-- --------------------------mysubject--------------------- -->
                    <select v-model="mysubject">
                        <option v-for="(item,index) in mysubjects" :key="index" :value="item">{{item}}</option>
                    </select>

                    <!-- --------------------------editmood--------------------- -->

        <!-- --------------------------get_students--------------------- -->

    <font-awesome-icon  icon="fa-solid fa-arrow-right"
    class="svgray1   overflow-visible select-none"
    :class="(myusertype !='')?'bg-green-500':'bg-red-500 opacity-40'"
    @click="class_get_confirm(myclass)"
    v-if="AppStore.loggedIn" 
    />
<!--     
    <div class="flex">
    <font-awesome-icon icon="fa-solid fa-arrow-right" />
    <button @click="class_get_students_fun(myclass)">get Marks
    </button> -->

    <font-awesome-icon :icon="(editmood)?'fa-solid fa-eye':'fa-solid fa-pen'"
            class="svgray1   overflow-visible select-none"
            :class="(myusertype !='')?'bg-green-500':'bg-red-500 opacity-40'" @click="editmood=!editmood"
            v-if="AppStore.loggedIn" />

</div>

        <!--mysubject                     ============= -->
        <!-- <div class="   text-center"> -->


        <!-- --------------------------select div mark--------------------- -->


<!-- {{editchooseindex}} -->
<!-- <font-awesome-icon icon="fa-solid fa-arrow-left" @click="(editchooseindex>3)?'':editchooseindex=editchooseindex+1" class="svgreen   overflow-visible select-none"  /> -->
<!-- <font-awesome-icon icon="fa-solid fa-arrow-right"  @click="(editchooseindex<1)?  '' :editchooseindex=editchooseindex-1" class="svgreen   overflow-visible select-none"  /> -->
<!-- <font-awesome-icon icon="fa-solid fa-forward" /> -->


</div>












        <!-- list of subjects---------------------------------------------------- -->
<div class="text-center   w-full " >
    <div class="flex">
      <span class=" bg-black text-white px-3 py-1 m-2 rounded">{{myclass}}</span>
      <span class=" bg-black text-white px-3 py-1 m-2 rounded ">{{mysubject}}</span>
      <!-- <span class=" bg-black text-white px-3 py-1  m-2  rounded">{{marks_head[editchooseindex].long}}</span> -->
      <!-- <span class=" bg-black text-white px-3 py-1  m-2  rounded">Max:{{marks_head[editchooseindex].max}}</span> -->

    </div>

</div>
<!-- <p class=" text-xl"><span class=" bg-black text-white px-3 py-1 rounded">{{myclass}}</span></p>
<p class=" text-xl"> <span class=" bg-black text-white px-3 py-1 rounded">{{mysubject}}</span></p>

 -->









  <div >
<div  class="bg-red-200  " v-show="editmood">


</div>
 <!-- t_head=[], -->
        <!-- t_body=[], -->
               

        <div class="tg-wrap p-4 containerscrolly" v-if="t_head != null" >

            <table class=" tg "   >
                <thead>
                    <tr v-if="editmood">
                        <th colspan="11"> <p>Choose:</p>  
                                <select v-model="editchooseindex" @change="colchoosetoedit2()" class=" text-black text-xl hover:bg-green-400">
        <option v-for="(item,index) in 5" :key="index" :value="index">
            {{marks_head[index].long}}</option>
    </select>
                        </th>
                    </tr>
                    <tr>
                        <th class="th-tg1">#</th>
                        <th class="th-tg1 td">Name</th>
                     
                       <th
                            v-for="(item, index) in marks_head" 
                            :key="index"
                            v-show="showedit[index] || editmood==false"
                            class="th-tg1" :class="(item.cute=='notes')?'th':''"
                        >

                        
                        {{ item.cute }}({{item.max}})
                        </th>
                        <th>
                            <p v-if="editnote"><button @click="saveallmarksfunconfirm()" class="w-full bg-red-500 text-black border-2 border-gray-800 border-solid button">save all marks</button></p>
                            <span 
                            class="  cursor-pointer   overflow-visible select-none"
                            
                            @click="editnote=!editnote">notes
                                <font-awesome-icon  icon="fa-solid fa-pen"
             
            />
                            </span>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in mymarks" :key="index">
                        <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'" class="  ">
                            {{ index + 1 }}
                        </td>










                        <td :class="index % 2 == 0 ? 'td-tg1 td' : 'td-tg2 td' " 
                        
                        
                        >{{ item.mystudent.nameen}}


                            <!-- {{ item.mystudents}} -->
                            <!-- {{ item['mystudents']}} -->
                            <!-- {{ item['mystudents']['nameen']}} -->
                        </td>

                        <!-- repeated 11 -->
                        <td  v-for="(itemsub,indexsub) in marks_head" :key="indexsub"
                                           :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2' " class="relative"
                                        v-show="showedit[indexsub] || editmood==false">

                                        <font-awesome-icon v-if="marks_head[indexsub]['max']< mymarks[index]['sub'+(indexsub+1)]" icon="fa-solid fa-xmark" class="   absolute  right-4  top-4    text-xs  text-red-500  " />

                        <div v-show="editmood"> 

                          <input class="fillIn  " @focus="$event.target.select()"
                          @change="calc_total(index)"
                            v-model.number="mymarks[index]['sub'+(indexsub+1)]" type="number" step="1"
                            v-show="showedit[indexsub] && editmood"
                            :class="(
                                maxmark['sub'+(indexsub+1)]
                                <
                                mymarks[index]['sub'+(indexsub+1)]
                                ||
                                mymarks[index]['sub'+(indexsub+1)]
                                <
                                maxmark['sub'+(indexsub+1)]/2

                                )?' bg-red-200':'bg-green-200'"

                            />


                            <!-- <font-awesome-icon icon="fa-solid fa-xmark" class="text-red-600  " /> -->
                            <!-- <p>maxmark[indexsub]{{maxmark['sub'+(indexsub+1)]}}</p> <br>
                            <p>mymarks[index]['sub'+(indexsub+1)]:{{mymarks[index]['sub'+(indexsub+1)]}}</p> -->
                        </div>
                        <span v-if="indexsub==7 && !editmood">
                            <!-- {{mymarks[index]['sub8']}} -->
                            <font-awesome-icon icon="fa-solid fa-pen" @click="editmood=!editmood"  />
                        </span>



                        <input v-if="indexsub==7 && editmood" @dblclick="editmood=!editmood"
                        v-model="mymarks[index]['sub8']"
                        type="text" class="fillIn" spellcheck="false" style="width: 54px;" >

                        <div v-show="editmood==false"
                        class=" rounded px-1   text-center"
                        :class="(
                                maxmark['sub'+(indexsub+1)]
                                <
                                mymarks[index]['sub'+(indexsub+1)]
                                ||
                                mymarks[index]['sub'+(indexsub+1)]
                                <
                                maxmark['sub'+(indexsub+1)]/2
                                )?' bg-red-200':'bg-green-200'"
                        >
                            {{ item['sub'+(indexsub+1)]}}
                            </div>




                        </td>

<!-- --------------------------------NOTES--------------------------- -->
                        <td :class="index % 2 == 0 ? 'td-tg1 td' : 'td-tg2 td' " >
<!-- v-if="indexsub==7 && cannotes"  -->
<span v-if="!editnote" >
    {{ mymarks[index]['sub8']}}
</span>

<input 
v-if="editnote"
                        v-model="mymarks[index]['sub8']"
                        type="text" class="fillIn" spellcheck="false" style="width: 154px;" >
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
                    <tr v-show="editmood">
                        <td colspan="5">
                            <p><button @click="saveallmarksfunconfirm()" class="w-full bg-red-500 text-black border-2 border-gray-800 border-solid button">save all marks</button></p>
                        </td>
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
<!-- , watch -->
<script setup>
   import {ref,onMounted} from 'vue'
   import {useAppStore} from '@/stores/appstore'
   import axios from 'axios';
// import {useTeacherStore} from '@/stores/Teacherstore'
import Swal from 'sweetalert2'
// const { axios } = axios
// CommonJS
// const Swal = require('sweetalert2')
// const Swal = Swal
// import marks_all from './marks_all.vue'
            const AppStore = useAppStore();
                const myusertype = ref('user')
                const mynameen = ref('')
                const mysubjects = ref([])
                const cannotes = ref(false)

            
            // const myusertype = ref(AppStore.user['usertype'])
            
            // const mysubjects = ref('')
            // const TeacherStore = useTeacherStore();
            const mysubject = ref('');
            const datadb = ref('');
            const myclass = ref('');
            const myclasses = ref([]);
            const editchooseindex = ref(0);
            const mymarks = ref('');

            
            const marks_head = ref(
[
{sub:"sub1",max:15  ,cute:"P"       ,long:'Participation         -المشاركة'},
{sub:"sub2",max:15  ,cute:"HW"      ,long:'Homework              -الواجبات'},
{sub:"sub3",max:15  ,cute:"Quiz"    ,long:'Quiz total           -الاختبارات الفترية'},
{sub:"sub4",max:20  ,cute:"Projects",long:'Projects - activities -المشاريع -الانشطة'},
{sub:"sub5",max:35  ,cute:"Exam"    ,long:'Trimester Test        -الاختبار الفصلي'},
{sub:"sub6",max:100 ,cute:"Total"   ,long:'Total                 -المجموع'},
{sub:"sub7",max:'A+',cute:"Grade"   ,long:'Grade                 -التقدير'},
// {sub:"sub8",max:''  ,cute:"Notes"   ,long:'notes                 -ملاحظات'},
]
            )
           const marktitlearray = ref(
                [
"P"       ,
"HW"      ,
"Quiz"  ,
"Projects",
"Exam"    ,
"Total"   ,
"Grade"   ,
"Notes"   ,
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

                ]
            );
            const showedit = ref([true,false,false,false,false,false])
//                 showedit.value= 
//             {
// "sub1":false,
// "sub2":false,
// "sub3":false,
// "sub4":false,
// "sub5":false,
// "sub6":false,
// "sub7":false,
// "sub8":false,

//             }
//             )

            const maxmark = ref(
                
            {
"sub1":15  ,
"sub2":15  ,
"sub3":15  ,
"sub4":20  ,
"sub5":35  ,
"sub6":100 ,
"sub7":20  ,
"sub8":'A+',
"sub9":''  ,

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
            const activesubtitle = ref(0);
            const editmood = ref(false);
            const editnote = ref(false);
            
            const editchoose = ref(0);
            const t_head = ref([1,2,3,4,5,6,7,8]);
            const t_body = ref([1,2,3,4,5,6,7,8]);

onMounted(() => {

try {
AppStore.loading=true

if ( AppStore.user){
                myusertype.value = AppStore.user.usertype
                mynameen.value =AppStore.user.nameen
                mysubjects.value = AppStore.user.subjects

            } else {
                myusertype.value = ''
                mynameen.value = ''
                mysubjects.value = []
            }

console.log('onMounted from teacher home to  AppStore.userdata() after');



    mysubject.value= JSON.parse(AppStore.user.subjects)[0]
    mysubjects.value= JSON.parse(AppStore.user.subjects)
    myclass.value=JSON.parse(AppStore.user.classname)[0]
    myclasses.value=JSON.parse(AppStore.user.classname)
console.log('mysubject.value');
console.log(mysubject.value);

console.log('myclass.value');
console.log(myclass.value);
console.log('mysubject.value');
console.log(myclasses.value);
console.log('mynameen.value');
console.log(mynameen.value);

console.log('class_get_students_fun(myclass.value) start onmount');

    class_get_students_fun(myclass.value)
console.log('class_get_students_fun(myclass.value) after onmount');

AppStore.loading=false

} catch (error) {
AppStore.loading=false

    console.log('AppStore.userdata() error');
    console.log(error);
}
})//end onmount

function calc_total(index){
    mymarks.value[index]['sub6']=
    parseInt(mymarks.value[index]['sub1'])+
    parseInt(mymarks.value[index]['sub2'])+
    parseInt(mymarks.value[index]['sub3'])+
    parseInt(mymarks.value[index]['sub4'])+
    parseInt(mymarks.value[index]['sub5'])
}
function subchoosefun(index){
    mysubject.value= JSON.parse(AppStore.user.subjects)[index]
    // mysubject.value=AppStore.user.subjects
    // mysubject.value=JSON.parse(AppStore.user.subjects)[index]
console.log('mysubject.value');
console.log(mysubject.value);

console.log('mysubjects.value');
console.log(mysubjects.value);
}
function classchoosefun(index){
    myclass.value=JSON.parse(AppStore.user.classname)[index]

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
          

                 function  class_get_confirm(classname) {
if (!confirm('you will change the class !   sure?')) { return }
                    class_get_students_fun(classname)

              }
// ------------------------class_get_students_fun---------------------------------

              async  function  class_get_students_fun(class_name) {
                // if (!confirm('you will change the class !   sure?')) { return }
                // mymarks.value=''
                // editmood=true
                // alert(class_name)
                // alert(mysubject.value)
                  AppStore.loading=true

                            try{
                            await axios.post("/api/forqan/teacher/class/getstudents",
                            {
                                'classname':class_name,
                                'subject':mysubject.value,
                            } ).then((res) => {
                                mymarks.value=res.data.marks;
                                                    AppStore.Toast.fire({
                                                    icon : 'success',
                                                    title: 'data loading Done'
                                                    });

                                                    AppStore.loading=false;
                                                    editmood.value=true
                                                    cannotes.value=true

                            });
                            } catch (e) {
                            console.log('class_get_students_fun error');
                            console.log(e);
                            AppStore.loading=false;
                            }
                            myclass.value=class_name
                            console.log('class_get_students_fun end');
                             }//class_get_students_fun end
// ------------------------class_get_students_fun---------------------------------
    
        function colchoosetoedit2(){
try {
    

showedit.value= [false,false,false,false,false,false]

// {
// "sub1":false,
// "sub2":false,
// "sub3":false,
// "sub4":false,
// "sub5":false,


//             }
            showedit.value[editchooseindex.value]=true
// console.log('sub'+index+1);
console.log(showedit[editchooseindex.value]);
console.log('marks_head.value');
console.log(marks_head.value);
console.log('colchoosetoedit2 marks_head.value[editchooseindex.value]');
console.log(marks_head.value[editchooseindex.value]);
console.log('marks_head.value[editchooseindex.value].long');
console.log(marks_head.value[editchooseindex.value].long);

activesubtitle.value=marks_head.value[editchooseindex.value].long
activesubtitle.value=marks_head.value[editchooseindex.value].long
console.log(activesubtitle.value);

} catch (error) {
    console.log('colchoosetoedit2 error');
    console.log(error);
    
}

}

//         function colchoosetoedit(index){

// showedit.value= [true,false,false,false,false]

// // {
// // "sub1":false,
// // "sub2":false,
// // "sub3":false,
// // "sub4":false,
// // "sub5":false,


// //             }
//             showedit.value[index]=true
// // console.log('sub'+index+1);
// console.log(showedit.value[index]);

// activesubtitle.value=marks_head.long.value[index]
// console.log(activesubtitle.value);



// }

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
editmood.value=false
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

.card{
    width:520px;
    padding: 12px;
    margin: 4px;
    border-radius: 8px;
}
/* table:hover tr:hover td {
    background-color: rgba(99, 167, 255, 0.921)!important;
    color: white;
    z-index: 999999;
} */

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
select {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: rgb(213, 255, 233);
  border: none;
  padding: 12px 12px;
  /* padding: 4px 1em 0 0; */
  margin: 8px;
  width: 100%;
  border-radius: 8px;
  font-family: inherit;
  font-size: inherit;
  cursor: pointer;
  line-height: inherit;
  z-index: 1;
  outline: none;
}

</style>