<template>
    <div>
      <!-- {path: '/forqan/admin/teacher_sub_class'      ,component: teacher_sub_class        ,name: 'teacher_sub_class'          ,meta: { auth: true, title: 'teacher_sub_class' }}, -->
       
      <button @click="showme=1">classes</button>
      <button @click="showme=2">subjects</button>
      <button @click="showme=3">preview</button>
      
      
      
      
      <!-- <p class="bg-red-200"><button @click="classesformdb()">classesformdb</button></p>
        <p>myclasses:{{myclasses}}</p>
        <p class="bg-red-200"><button @click="subformdb()">subformdb</button></p>
        <p>mysubjects:{{mysubjects}}</p>
        <p class="bg-red-200"><button @click="allteachersformdb()">allteachersformdb</button></p>
        <p>myteachers:{{myteachers}}</p> -->

         <!-- t_head=[], -->
                <!-- t_body=[], -->
                <div class="tg-wrap" v-if="t_head != null      " v-show="showme==3">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="th-tg1">#</th>
                                <th
                                    v-for="(item, index) in t_head"
                                    :key="index"
                                    class="th-tg1"
                                >
                                    {{ item }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in t_body" :key="index">
                                <td :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'">
                                  {{ index + 1 }}
                                </td>

                                <td 
                                v-for="(itemtd,indextd) in t_head" :key="indextd"
                                :class="index % 2 == 0 ? 'td-tg1' : 'td-tg2'">

                                {{ item[itemtd]}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                    <component :is="editClasses" v-show="showme==1" />
                    <component :is="editsub"  v-show="showme==2" />
                    
                    <br>
<br>
<br>
</div>
</template>

<script setup>

import  editClasses from './teacher_sub_class_editClasses.vue'
import  editsub from './teacher_sub_class_editsubjects.vue'

import { ref,onMounted } from 'vue';
const mydatadb            =ref('')
const myteachers            =ref(null)
const t_body            =ref(null)

const editmood            =ref(false)
const mysubjects           =ref([])
const showme           =ref([3])
// showme=3
const myclasses           =ref([])
const class_sub_all_datadb=ref([])
const sub_class_todb      =ref([])
const t_head      =ref([
  // 'id',
  'nameen',
  'subjects',
  'classname',
])


onMounted(() => {
  classesformdb()
  subformdb()
 allteachersformdb()
});


    function  addclassfun(index,val){
        myteachers.value[index].classname
      }
async function  update_class_sub_all(){

try{
//  await axios.post('/api/forqan/admin/update_class_sub_all',this.sub_class_todb)
 await axios.post('/api/forqan/admin/update_class_sub_all',{data:sub_class_todb.value})
.then((res) => {
    class_sub_all_datadb.value =res.data.data;

console.log(res.data.data);
});
} catch (e) {
  console.log(e);

}
//setTimeout(() => this.datamsg = '', 5000);
}

 async function  classesformdb(){
// alert(1)
try{
  // this.$store.state.loading=true
 await axios.post('/api/forqan/admin/allclasses')
.then((res) => {
// alert(2)

    myclasses.value =[];
    res.data.data.forEach(element => {
     myclasses.value.push( element.name)

    });
console.log(res.data.data);
});
} catch (e) {
  console.log(e);
  console.log('e.message');
  console.log(e.message);
  // console.log('e.status');
  // console.log(e.response.status);
  // console.log(typeof(e.response.status));
   
  
  // if (e.response.status==401) {
  //   this.$store.state.loading=false
  //   // this.$store.state.loading=false
  //   this.$router.push({name: 'login'})
  //   // this.$router.push({name: 'products.index', params: { id: 1 }})
  // }
  
  // error.response.status
}
//setTimeout(() => this.datamsg = '', 5000);
}
async function    subformdb(){

try{
  await axios.post('/api/forqan/admin/allsub')
.then((res) => {
    mysubjects.value =[];

    res.data.data.forEach(element => {
      mysubjects.value.push( 
        {
          id:element.id,
          name:element.name,
          sub :element.sub,
        }
      )

         });
console.log(res.data.data);
});
} catch (e) {
  console.log(e);

}
//setTimeout(() => this.datamsg = '', 5000);
}
async function     allteachersformdb(){

        try{

          await axios.post('/api/forqan/admin/teacher_sub_class')
        .then((res) => {
            mydatadb.value =res.data.data;


            myteachers.value=[]
        mydatadb.value.forEach(element => {
    myteachers.value.push(
        {
            'id'       :element.id,
            'nameen'       :element.nameen,
            'classname':element.classname,
            'subjects' :element.subjects,
        }
    )
    t_body.value=myteachers.value
    sub_class_todb.value.push({
      'id'       :element.id,
      'classname':element.classname.split(','),
      'subjects' :element.subjects.split(','),
    } )
      
});

console.log('myteachers');
console.log(myteachers.value);
// $store.state.loading=false







            // datadb =res.data.message;
        console.log(res.data.data);
        });
        } catch (e) {
            mydatadb.value =null
            console.log('error--');
            console.log(e);
            
        // datamsg = 'data error';
        }
        }



        //setTimeout(() => datamsg = '', 5000);

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
