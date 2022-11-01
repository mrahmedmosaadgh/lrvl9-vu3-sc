<template>
    <div>
      <p>mysubjects</p>

        <p><button @click="editmood=!editmood">editmood</button></p>
         <!-- t_head=[], -->
                <!-- t_body=[], -->
                <!-- <p>sub_class_todb:{{sub_class_todb}}</p> -->
                <div class="tg-wrap" v-if="t_head != null">
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

                                {{ item[itemtd].toString()}}

                                <Multiselect v-if="editmood & itemtd=='subjects'"
    v-model="myteachers[index].subjects"  
   mode="tags"
  :close-on-select="false"
  :searchable="true"
  :create-option="false"

  :options="mysubjects"
  :classes="{
  container: 'relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-base leading-snug outline-none',
 tag: 'bg-blue-500 text-white text-sm font-semibold py-0.5 pl-1 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-1 rtl:mr-0 rtl:ml-1',
 search: '   border-0 hvr-box-shadow-none focus-box-shadow-none   ',
}"
/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    =======================
        <p><button @click="savedata()">saveclasses</button></p>
        <br>
<br>
<br>
                  </div>


</div>
</template>

<script setup>
import Multiselect from '@vueform/multiselect'


import { ref, onMounted } from 'vue';
const mydatadb            =ref('')
const myteachers            =ref(null)
const t_body            =ref(null)

const editmood            =ref(false)
const mysubjects           =ref([])

const myclasses           =ref([])
const class_sub_all_datadb=ref([])
const sub_class_todb      =ref([])
const t_head      =ref([
  // 'id',
  'nameen',
  'subjects',
  // 'classname',
])

  onMounted(() => {
  classesformdb()
  subformdb()
  allteachersformdb()
});

async function  savedata(){
try{
//  await axios.post('/api/forqan/admin/update_class_sub_all',this.sub_class_todb)
 await axios.post('/api/forqan/admin/update_class_sub_all',{data:myteachers.value})
.then((res) => {
    class_sub_all_datadb.value =res.data.data;

console.log('savedata success');
console.log(res.data);
});
} catch (e) {
console.log('savedata error');

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
        element.name,
        // {
        //   id:element.id,
        //   name:element.name,
        //   sub :element.sub,
        // }
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
            // 'classname':element.classname,
            // 'subjects' :element.subjects,
            // 'classname':element.classname,
            // 'subjects' :element.subjects,
            'classname':JSON.parse(element.classname ),
// 'classname':element.classname.split(','),
            
            'subjects' :JSON.parse(element.subjects ),

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
