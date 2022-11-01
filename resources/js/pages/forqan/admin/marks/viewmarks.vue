<template>
    <div>
      
                <p><button @click="getmarksfun()">get Marks</button></p>
                <p>canadminedite{{}}

                    <font-awesome-icon icon="fa-solid fa-pen" @click="canadminedite=!canadminedite" class="   cursor-pointer overflow-visible select-none" />

                </p>
                   <div class="tg-wrap">
        <p><button @click="deepFilter1">deepFilter1</button></p>
        <p><button @click="ufun">ufun</button></p>
        <p>unique:{{unique}}</p> 
        
        
        <!-- <p>deepFilter1:{{deepFilter1}}</p> -->
                    <table class="customTable">
                <thead class="">
                  <tr>
                    <th>#</th>
                    <th>classname</th>
                    <th>subject</th>
                    <th>Name</th>
                    <th>teacher_id nameen</th>
                    
<th>sub1</th>
<th>sub2</th>
<th>sub3</th>
<th>sub4</th>
<th>sub5</th>
<th>sub6</th>
<th>sub7</th>
                    <th>notes</th>
                  </tr>
                </thead>
                <tbody >
                  <tr v-for="(item,index) in marks" :key="index" >
                    <td>{{index+1}}</td>
                    <td>{{item['classname']}}</td>
                    <td>{{item['subject']}}</td>
                    <td><span v-if="item['mystudent']">  {{item['mystudent']['nameen']}}   </span></td>
                    <!-- <td>{{item['mystudent'].nameen}}</td> teacher_id -->
                    <td>
                        <span v-if="item['myteacher']">  {{item['myteacher']['nameen']}}   </span>
                        <!-- teacher_id({{item['teacher_id']}}) -->
                        
                        </td>
                    <td>
                        <!-- <font-awesome-icon :icon="(editmood)?'fa-solid fa-eye':'fa-solid fa-pen'"
            class="svgreen   overflow-visible select-none"
            :class="(myusertype !='')?'bg-green-500':'bg-red-500 opacity-40'" @click="editmood=!editmood"
            v-if="AppStore.loggedIn" /> -->

            {{item['sub1']}}
<div v-if="canadminedite">
  

                        <font-awesome-icon v-if="!editsub[index][1]"
                        @click="editsub[index][1]=!editsub[index][1]"
                        icon="fa-solid fa-pen"
            class=" svgr1  cursor-pointer  overflow-visible select-none"/>

                           <font-awesome-icon v-if="editsub[index][1]"
                        @click="savemarkone(index,1)"
                        icon="fa-solid fa-floppy-disk"
            class=" svgr1  cursor-pointer  overflow-visible select-none"/>
         
</div>
            
<!-- 
                        <span v-if="canedit[index][1]">
                          
                        </span> -->
                        
                       
                    
                    </td>
                    <td>{{item['sub2']}}</td>
                    <td>{{item['sub3']}}</td>
                    <td>{{item['sub4']}}</td>
                    <td>{{item['sub5']}}</td>
                    <td>{{item['sub6']}}</td>
                    <td>{{item['sub7']}}</td>
                  </tr>
                </tbody>
                </table></div>
                <!-- <p>marks:{{marks}}</p> -->
                <!-- <p><button @click="getmarksfun()">get Marks</button></p> -->
                <!-- <p>marks:{{marks}}</p> -->

                <!-- { "id": 1, "controlmarkssetup_id": 1, "school_id": 1,
                     "teacher_id": null,
                     "class_id": null, "subject_id": null,
                      "student_id": 207, "grade": null,
                       "classname": "2A", "stage": null,
                        "subject": "English",
                         "sub1": null, "sub2": null, "sub3": null, "sub4": null, "sub5": null, "sub6": null, "sub7": null, "sub8": null, "sub9": null,
                          "sub10": null, "sub11": null, "sub12": null, "sub13": null, "sub14": null, "sub15": null, "sub16": null,
                           "sub_count": null, "notes": null, 
                           "created_at": "2022-10-22T10:02:20.000000Z", "updated_at": "2022-10-22T10:02:20.000000Z", "mystudent": { "id": 207, "name": "Zed2A41", "email": "Zed2A41@forqan", "email_verified_at": null, "project_name": "forqan", "usertype": "student", "schoolgroup_id": null, "school_id": 1, "class_id": null, "nid": null, "nameen": "Zed Rabie", "namear": null, "classname": "2A", "parent_id": null, "subjects": null, "lang": "en", "active": 1, "lastlogin": null, "lastonline": null, "createdby": null, "notes": null, "created_at": "2022-10-06T01:46:34.000000Z", "updated_at": "2022-10-06T01:46:34.000000Z", "grade_id": null } }, "Forqan_controlmarks_setup_id": 1 } -->
















<!-- CSS Code: Place this code in the document's head (between the <head> -- </head> tags) -->


<!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
<!-- <table class="customTable">
  <thead>
    <tr>
      <th>Header 1</th>
      <th>Header 2</th>
      <th>Header 3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Row 1, Cell 1</td>
      <td>Row 1, Cell 2</td>
      <td>Row 1, Cell 3</td>
    </tr>
    <tr>
      <td>Row 2, Cell 1</td>
      <td>Row 2, Cell 2</td>
      <td>Row 2, Cell 3</td>
    </tr>
    <tr>
      <td>Row 3, Cell 1</td>
      <td>Row 3, Cell 2</td>
      <td>Row 3, Cell 3</td>
    </tr>
    <tr>
      <td>Row 4, Cell 1</td>
      <td>Row 4, Cell 2</td>
      <td>Row 4, Cell 3</td>
    </tr>
  </tbody>
</table> -->
<!-- Generated at CSSPortal.com -->











    </div>
</template>

<script setup>
    import { ref, reactive } from 'vue';
    import {useAppStore} from '@/stores/appstore'
import { includeBooleanAttr } from '@vue/shared';
    const AppStore = useAppStore();
            const marks = ref('');
            const namefilter = ref('muaz');
            const editsub = ref([]);
            const canadminedite = ref(false);
            const mymarkfiltered = ref('');
            const unique = ref('');
            // const mymarkfiltered = ref('');
            // const mymarkfiltered = ref('');
            // const mymarkfiltered = ref('');
            
    async function  savemarkone(index,subnum){
alert(index+' '+subnum)
editsub.value[index][subnum]=false
alert(editsub.value[index][subnum])
// alert(editsub[index][subnum])
    }
    async function  getmarksfun(){
                // this.loading = true;  
                try{
                await axios.post("/api/forqan/admin/marks/getmarks" )
                .then((res) => {
                // this.marks = res.data;
                marks.value = res.data.marks;
console.log(res.data);
 marks.value.forEach(element => {
    editsub.value.push(
        [false,false,false,false,false,false,false,false]
    )
});
                // this.loading = false;
                });
                } catch (error) {
                console.log(error);
                AppStore.check_auth(error.response.status)






                // alert(e.response.status);
                }
              }//fromdbfun


             function ufun (){
              unique.value = [...new Set(marks.value.map(item => item.subject))];

             }
              
             function deepFilter1 (){
//               Students.filter(function (el)
// {
//   return el.Age >=15 &&
//          el.RollNumber <= 200 &&
//          el.Marks >= 80 ;
// }
// );
marks.value=marks.value.filter(function (el)
{
  var item='subject'
  // return el['classname']=="2A"
  //  return el['mystudent']['nameen']=="Shaheer Saad"
  //  return el[item] == "Scie"

  //  return el[item].includes("Science")
  // if (el[item].includes("Science")) {
    
  // }
return el[item] == "Science"
   
}
);


            // marks.value.filter(
            // // mymarkfiltered.value=  marks.value.filter(
            //   mark =>  mark['classname']=="2A"

            //   );


             }   

              const deepFilter = (obj, filter) => {
  //iterate the object
  for (let key in obj) {
    const val = obj[key];

    //if val is also object (nested)
    if (typeof val === "object") {
      //recur
      deepFilter(val, filter);
    } 
    // normal value
    else {
      //current val fails filter condition
      //delete it
      if (filter(val) === false) {
        delete obj[key];
      }
    }

    //if value is empty obj
    //delete it
    if (JSON.stringify(val) === "{}") {
      delete obj[key];
    }
  }
};








</script>

<style scoped>

</style>