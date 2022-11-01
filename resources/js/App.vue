<template>
  <div id="wrapper" class="backm">
    <svg class="popup z-50 " v-show="AppStore.loading"     xmlns="http://www.w3.org/2000/svg" style="margin: auto; display: block; shape-rendering: auto; background: none;" width="280" height="84" preserveAspectRatio="xMidYMid"><g style="transform-origin:140px 42px;transform:scale(1)"><g transform="translate(140,42)">  <g transform="translate(0,0)"><g class="path" style="opacity: 1; transform-origin: -91.415px -2.66115px; animation: 1s linear -0.5775s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M4.73 0.42L0.52-1.30L14.77-36.40L20.18-36.40L34.22-1.30L29.69 0.52L25.64-9.88L8.79-9.88L4.73 0.42zM17.21-31.51L10.35-14.04L24.02-14.04L17.21-31.51" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(33, 228, 153);"></path></g><g class="path" style="opacity: 1; transform-origin: -63.23px -3.65115px; animation: 1s linear -0.495s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M43.32-38.48L43.32-8.94L43.32-8.94Q43.32-6.14 44.49-4.78L44.49-4.78L44.49-4.78Q45.66-3.43 47.74-3.43L47.74-3.43L47.74-3.43Q48.72-3.43 49.66-3.67L49.66-3.67L49.66-3.67Q50.60-3.90 51.32-4.21L51.32-4.21L52.47-0.42L52.47-0.42Q51.53 0 50.15 0.31L50.15 0.31L50.15 0.31Q48.78 0.62 47.11 0.62L47.11 0.62L47.11 0.62Q45.29 0.62 43.76 0.10L43.76 0.10L43.76 0.10Q42.22-0.42 41.08-1.51L41.08-1.51L41.08-1.51Q39.94-2.60 39.29-4.32L39.29-4.32L39.29-4.32Q38.64-6.03 38.64-8.48L38.64-8.48L38.64-38.48L43.32-38.48" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(127, 246, 88);"></path></g><g class="path" style="opacity: 1; transform-origin: -40.585px -2.92115px; animation: 1s linear -0.4125s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M57.41 0L57.41-36.40L78.99-36.40L78.99-32.14L62.35-32.14L62.35-21.01L76.23-21.01L76.23-16.95L62.35-16.95L62.35 0L57.41 0" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(33, 228, 153);"></path></g><g class="path" style="opacity: 1; transform-origin: -15.29px 1.75885px; animation: 1s linear -0.33s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M102.18-13.52L102.18-13.52L102.18-13.52Q102.18-15.55 101.53-17.37L101.53-17.37L101.53-17.37Q100.88-19.19 99.71-20.54L99.71-20.54L99.71-20.54Q98.54-21.89 96.95-22.70L96.95-22.70L96.95-22.70Q95.37-23.50 93.50-23.50L93.50-23.50L93.50-23.50Q89.39-23.50 87.10-20.80L87.10-20.80L87.10-20.80Q84.81-18.10 84.81-13.62L84.81-13.62L84.81-13.62Q84.81-11.60 85.46-9.75L85.46-9.75L85.46-9.75Q86.11-7.90 87.28-6.53L87.28-6.53L87.28-6.53Q88.45-5.15 90.04-4.34L90.04-4.34L90.04-4.34Q91.62-3.54 93.50-3.54L93.50-3.54L93.50-3.54Q95.52-3.54 97.14-4.26L97.14-4.26L97.14-4.26Q98.75-4.99 99.87-6.32L99.87-6.32L99.87-6.32Q100.98-7.64 101.58-9.46L101.58-9.46L101.58-9.46Q102.18-11.28 102.18-13.52zM80.03-13.52L80.03-13.52L80.03-13.52Q80.03-16.80 81.07-19.42L81.07-19.42L81.07-19.42Q82.11-22.05 83.90-23.87L83.90-23.87L83.90-23.87Q85.70-25.69 88.17-26.68L88.17-26.68L88.17-26.68Q90.64-27.66 93.50-27.66L93.50-27.66L93.50-27.66Q96.30-27.66 98.77-26.68L98.77-26.68L98.77-26.68Q101.24-25.69 103.06-23.87L103.06-23.87L103.06-23.87Q104.88-22.05 105.92-19.45L105.92-19.45L105.92-19.45Q106.96-16.85 106.96-13.62L106.96-13.62L106.96-13.62Q106.96-10.40 105.95-7.77L105.95-7.77L105.95-7.77Q104.94-5.15 103.12-3.28L103.12-3.28L103.12-3.28Q101.30-1.40 98.83-0.39L98.83-0.39L98.83-0.39Q96.36 0.62 93.50 0.62L93.50 0.62L93.50 0.62Q90.58 0.62 88.11-0.42L88.11-0.42L88.11-0.42Q85.64-1.46 83.85-3.33L83.85-3.33L83.85-3.33Q82.06-5.20 81.04-7.80L81.04-7.80L81.04-7.80Q80.03-10.40 80.03-13.52" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(127, 246, 88);"></path></g><g class="path" style="opacity: 1; transform-origin: 12.45px 1.44885px; animation: 1s linear -0.2475s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M129.27-27.35L127.87-22.52L127.87-22.52Q126.88-22.93 125.53-22.93L125.53-22.93L125.53-22.93Q124.07-22.93 122.69-22.31L122.69-22.31L122.69-22.31Q121.32-21.68 120.25-20.44L120.25-20.44L120.25-20.44Q119.18-19.19 118.53-17.24L118.53-17.24L118.53-17.24Q117.88-15.29 117.88-12.64L117.88-12.64L117.88 0L113.20 0L113.20-27.04L117.73-27.04L117.73-21.16L117.73-21.16Q118.20-22.41 118.98-23.61L118.98-23.61L118.98-23.61Q119.76-24.80 120.82-25.69L120.82-25.69L120.82-25.69Q121.89-26.57 123.29-27.12L123.29-27.12L123.29-27.12Q124.70-27.66 126.41-27.66L126.41-27.66L126.41-27.66Q127.19-27.66 127.95-27.59L127.95-27.59L127.95-27.59Q128.70-27.51 129.27-27.35L129.27-27.35" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(33, 228, 153);"></path></g><g class="path" style="opacity: 1; transform-origin: 33.98px 7.16885px; animation: 1s linear -0.165s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M150.70-27.04L154.96-27.04L154.96 11.44L150.28 11.44L150.28-2.76L150.28-2.76Q149.71-2.18 148.95-1.59L148.95-1.59L148.95-1.59Q148.20-0.99 147.24-0.49L147.24-0.49L147.24-0.49Q146.28 0 145.13 0.31L145.13 0.31L145.13 0.31Q143.99 0.62 142.69 0.62L142.69 0.62L142.69 0.62Q140.35 0.62 138.14-0.29L138.14-0.29L138.14-0.29Q135.93-1.20 134.26-2.99L134.26-2.99L134.26-2.99Q132.60-4.78 131.59-7.38L131.59-7.38L131.59-7.38Q130.57-9.98 130.57-13.42L130.57-13.42L130.57-13.42Q130.57-16.59 131.56-19.21L131.56-19.21L131.56-19.21Q132.55-21.84 134.26-23.71L134.26-23.71L134.26-23.71Q135.98-25.58 138.27-26.62L138.27-26.62L138.27-26.62Q140.56-27.66 143.16-27.66L143.16-27.66L143.16-27.66Q145.50-27.66 147.39-26.86L147.39-26.86L147.39-26.86Q149.29-26.05 150.70-24.86L150.70-24.86L150.70-27.04zM143.62-23.61L143.62-23.61L143.62-23.61Q141.96-23.61 140.45-22.93L140.45-22.93L140.45-22.93Q138.94-22.26 137.80-20.96L137.80-20.96L137.80-20.96Q136.66-19.66 136.01-17.81L136.01-17.81L136.01-17.81Q135.36-15.96 135.36-13.57L135.36-13.57L135.36-13.57Q135.36-11.23 136.03-9.36L136.03-9.36L136.03-9.36Q136.71-7.49 137.88-6.19L137.88-6.19L137.88-6.19Q139.05-4.89 140.56-4.21L140.56-4.21L140.56-4.21Q142.06-3.54 143.73-3.54L143.73-3.54L143.73-3.54Q145.81-3.54 147.52-4.52L147.52-4.52L147.52-4.52Q149.24-5.51 150.28-6.81L150.28-6.81L150.28-21.42L150.28-21.42Q148.88-22.41 147.19-23.01L147.19-23.01L147.19-23.01Q145.50-23.61 143.62-23.61" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(127, 246, 88);"></path></g><g class="path" style="opacity: 1; transform-origin: 66.505px 1.75885px; animation: 1s linear -0.0825s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M161.46-13.36L161.46-13.36L161.46-13.36Q161.46-16.38 162.40-19.01L162.40-19.01L162.40-19.01Q163.33-21.63 165.02-23.56L165.02-23.56L165.02-23.56Q166.71-25.48 169.08-26.57L169.08-26.57L169.08-26.57Q171.44-27.66 174.25-27.66L174.25-27.66L174.25-27.66Q176.59-27.66 178.49-26.86L178.49-26.86L178.49-26.86Q180.39-26.05 181.79-24.86L181.79-24.86L181.79-27.04L186.06-27.04L186.06-6.55L186.06-6.55Q186.06-4.58 187.02-3.98L187.02-3.98L187.02-3.98Q187.98-3.38 189.12-3.38L189.12-3.38L188.14 0.26L188.14 0.26Q183.14 0.26 182.10-3.80L182.10-3.80L182.10-3.80Q181.48-2.96 180.67-2.16L180.67-2.16L180.67-2.16Q179.87-1.35 178.83-0.73L178.83-0.73L178.83-0.73Q177.79-0.10 176.49 0.26L176.49 0.26L176.49 0.26Q175.19 0.62 173.63 0.62L173.63 0.62L173.63 0.62Q171.08 0.62 168.87-0.36L168.87-0.36L168.87-0.36Q166.66-1.35 165.02-3.17L165.02-3.17L165.02-3.17Q163.38-4.99 162.42-7.57L162.42-7.57L162.42-7.57Q161.46-10.14 161.46-13.36zM174.67-3.54L174.67-3.54L174.67-3.54Q176.64-3.54 178.41-4.47L178.41-4.47L178.41-4.47Q180.18-5.41 181.38-6.92L181.38-6.92L181.38-21.42L181.38-21.42Q179.97-22.41 178.28-23.01L178.28-23.01L178.28-23.01Q176.59-23.61 174.72-23.61L174.72-23.61L174.72-23.61Q172.85-23.61 171.29-22.88L171.29-22.88L171.29-22.88Q169.73-22.15 168.61-20.83L168.61-20.83L168.61-20.83Q167.49-19.50 166.87-17.63L166.87-17.63L166.87-17.63Q166.24-15.76 166.24-13.52L166.24-13.52L166.24-13.52Q166.24-11.34 166.87-9.49L166.87-9.49L166.87-9.49Q167.49-7.64 168.64-6.32L168.64-6.32L168.64-6.32Q169.78-4.99 171.31-4.26L171.31-4.26L171.31-4.26Q172.85-3.54 174.67-3.54" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(33, 228, 153);"></path></g><g class="path" style="opacity: 1; transform-origin: 97.94px 1.44885px; animation: 1s linear 0s infinite normal forwards running fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8;"><path d="M199.89-27.04L199.89-22.52L199.89-22.52Q201.34-24.70 203.61-26.18L203.61-26.18L203.61-26.18Q205.87-27.66 208.99-27.66L208.99-27.66L208.99-27.66Q213.56-27.66 215.83-24.91L215.83-24.91L215.83-24.91Q218.09-22.15 218.09-17.63L218.09-17.63L218.09 0L213.41 0L213.41-17.11L213.41-17.11Q213.41-20.07 212.06-21.81L212.06-21.81L212.06-21.81Q210.70-23.56 208.21-23.56L208.21-23.56L208.21-23.56Q207.01-23.56 205.87-23.11L205.87-23.11L205.87-23.11Q204.72-22.67 203.66-21.89L203.66-21.89L203.66-21.89Q202.59-21.11 201.68-20.07L201.68-20.07L201.68-20.07Q200.77-19.03 200.04-17.89L200.04-17.89L200.04 0L195.36 0L195.36-27.04L199.89-27.04" fill="#21e499" stroke="none" stroke-width="none" transform="translate(-108.78497314453125,15.278853073120118)" style="fill: rgb(127, 246, 88);"></path></g></g></g></g></svg>

    <!-- routearray_admin -->

<!-- <p>AppStore.user:{{typeof AppStore.user}}</p>
<p>AppStore.user:{{AppStore.user.usertype}}</p> -->
<!-- <p>AppStore.user:{{AppStore.user}}</p> -->

 








































<!-- 
        <p><button @click="toastme()">toastme</button></p>
        <p><button @click="setcook()">setcook</button></p>
        <p>setcook:{{cook1}}</p> -->
<!-- <font-awesome-icon icon="fa-solid fa-right-to-bracket" 
class="svred  absolute right-2 overflow-visible select-none" 
:class="(AppStore.user.usertype !='')?'bg-green-500':'bg-red-500 opacity-40'"
@click="AppStore.login()"
v-if="!AppStore.loggedIn || AppStore.user.usertype ==''"
/> -->
    <!-- -------------------------logout--------------------------------- -->













<!-- <p>qqqqqqqq:{{document.querySelector("meta[name='user-id']").getAttribute('content')}}</p> -->








<!-- <p>AppStore.loggedIn:{{AppStore.loggedIn }} </p>
 <p>   AppStore.usertype:{{AppStore.usertype}}</p>
 <p>   AppStore.user.usertype:{{AppStore.user.usertype}}</p> -->




    <!-- -------------------------sidebar--------------------------------- -->

    <div v-if="AppStore.loggedIn" class="sidebar" :class="{ showOverlay: overlayVisibility }">
      <span class="closeButton" @click="hideOverlay()">&times;</span>

      <!-- bg-black -->
    <!-- ----------absolute right-2---------------logout--------------------------------- -->
   
   <div v-if="AppStore.user">
     
   
   
    <font-awesome-icon icon="fa-solid fa-power-off" 
class="svred   overflow-visible select-none" 
:class="(AppStore.user.usertype !='')?'bg-green-500':'bg-red-500 opacity-40'"
@click="logout()"
v-if="AppStore.loggedIn && AppStore.user.usertype !=''"
/>

<!-- <p class="brand-title">
{{AppStore.nameen}}
      </p> -->





<!-- ------------------------------------------------------------- -->


      <div  v-for="(item,index) in routearray_admin" :key="index" v-show="AppStore.user.usertype=='admin'">
 <p @click="compindex=index;router.push(item.rout)"
 
 class=" bg-green-100 p-2 m-2 cursor-pointer hover:bg-green-900 hover:text-white"
 
                    :class="(compindex==index)?' text-white bg-green-600 border-red-600  ':''"
 
 >{{item.title}}</p>
</div>

<div v-for="item in routearray_teacher " v-show="AppStore.user.usertype=='teacher'">
  <p @click="router.push(item.rout)" class=" bg-green-100 p-2 m-2 cursor-pointer hover:bg-green-900 hover:text-white">{{item.title}}</p>
</div>


<div v-for="item in routearray_student " v-show="AppStore.user.usertype=='student'">
  <p @click="router.push(item.rout)" class=" bg-green-100 p-2 m-2 cursor-pointer hover:bg-green-900 hover:text-white">{{item.title}}</p>

</div>

<div v-for="item in routearray " v-show="AppStore.user.usertype==''">
  <p @click="router.push(item.rout)" class=" bg-green-100 p-2 m-2 cursor-pointer hover:bg-green-900 hover:text-white">{{item.title}}</p>
</div>

<!-- ------------------------------------------------------------- -->


<!-- <div v-for="item in routearray ">
  {{item.title}}
</div> -->

<!-- v-if="AppStore.user" -->
      <div class="text-center" >

<p>{{AppStore.user.nameen}}</p>
<p class="text-sm text-green-200">[{{AppStore.user.usertype}}]</p>
<!-- <p>{{AppStore.user}}</p> -->
</div>




</div>






      <!-- <div v-if="AppStore.usertype =='teacher'">
                  <li v-for="item in AppStore.myroutes.teacher" :key="item.id" >
                    <router-link  :to="item.rout">{{item.title}}</router-link>
                  </li>
                </div>
                <div v-if="AppStore.usertype =='admin'">
                  <li v-for="item in AppStore.myroutes.admin" :key="item.id" >
                    <router-link  :to="item.rout">{{item.title}}</router-link>
                  </li>
                </div> -->
                <ul v-if="AppStore.user" class=" w-full m-1 p-2">
        <!-- <li v-for="item in routearray" :key="item.id" class="cursor-pointer hover:text-black hover:bg-green-400 w-full"
        @click="router.push(item.rout)"
        >
         {{item.title}}
          <router-link class=" cursor-pointer hover:text-white  w-full"
          v-if="AppStore.user.usertype=='admin'"
          :to="item.rout"></router-link>
        </li> -->


        <!-- <li v-for="item in routearray_teacher" :key="item.id" class="cursor-pointer hover:text-black hover:bg-green-400 w-full"
        >
 
          <router-link 
          v-if="AppStore.user.usertype=='teacher'"
          :to="item.rout">{{item.title}}</router-link>
        </li> -->


      </ul>

      <!-- sidebar footer ------------------------------------------------- -->
      <footer class="sidebar-footer">
        <!-- <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div> -->
        <!-- <small>&copy; 2021 Alphayo Blog</small> -->
      </footer>
      <!-- sidebar footer ------------------------------------------------- -->



    </div>
    <!-- -------------------------sidebar end--------------------------------- -->








    <!-- Menu Button -->
    <div class="menuButton" @click="ShowOverlayfun()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>










    <!-- main ----------------------------------------------------------- -->
    <main class="container">
      <router-view ></router-view>
    </main>
    <!-- main ----------------------------------------------------------- -->


    <!-- Main footer -----------------------------------------------------  -->
    <footer class="main-footer">
      <small class="fixed  bottom-0  z-50 ">&copy; {{thisyear}} school every thing  : loggedIn {{AppStore.loggedIn}}</small>
    </footer>
    <!-- Main footer -----------------------------------------------------  -->

  </div>
</template>
<script setup>

import {ref ,onMounted } from "vue";
// import { watchEffect,watch,computed,ref ,onMounted } from "vue";
import { useRouter } from 'vue-router'
import {useAppStore} from '@/stores/appstore'
// import { useCookies } from "vue3-cookies";
// import Swal from 'sweetalert2'


// const { cookies } = useCookies();
const AppStore = useAppStore();
const router = useRouter()

const compindex = ref(0)
const routearray = ref(
  [
    {title:'no user',rout:{name: 'none'}},

  ]//
)

// titlef
const routearray_admin = ref(
  [
    {title:'adminhome',rout:{name: 'adminhome'}},
    {title:'add student',rout:{name: 'addstudenthome'}},
    {title:'teacher_sub_class',rout:{name: 'teacher_sub_class'}},
    {title:'controlmarkssetups',rout:{name: 'controlmarkssetups'}},
    {title:'viewmarks',rout:{name: 'viewmarks'}},
    {title:'grading',rout:{name: 'grading'}},
   
  ]//
);
const routearray_teacher = ref(
  [
    {title:'teacherhome',rout:{name: 'teacherhome'}},
  ]
);//
const routearray_student = ref(
  [
    {title:'studenthome',rout:{name: 'studenthome'}},
  ]
);//student
  const overlayVisibility   = ref(false);
  const editSuccess         = ref(false);
  const thisyear            = new Date().getFullYear();
  const cook1            = ref('');


    // ShowOverlayfun=()=> {
    //   overlayVisibility.value = true;
    // }


    // watchEffect(() => save(notes.value));

    // return {
    //   notes,
    // };
    // watchEffect(() => AppStore.user.usertype);
//     computed(() => {
//     if (AppStore.user.usertype=='admin') {routearray.value=routearray_admin.value } 
//           if (AppStore.user.usertype=='teacher') {routearray.value=routearray_teacher.value } 
//           if (AppStore.user.usertype=='student') {routearray.value=routearray_student.value } 
 

//     }

//  );
    //       watch(AppStore.loggedIn, () => {
    //         // console.log('usertype watch App.vue =============================>');
    //         // console.log(usertype);
    //         // console.log('AppStore.user.usertype  watch App.vue');
    //         // console.log(AppStore.user.usertype);
    //       if (AppStore.user.usertype=='admin') {routearray.value=routearray_admin.value } 
    //       if (AppStore.user.usertype=='teacher') {routearray.value=routearray_teacher.value } 
    //       if (AppStore.user.usertype=='student') {routearray.value=routearray_student.value } 
    // })
    // computed 
    //       watch(showNotesSavedNotification, (value) => {
    //   if (value) {
    //     setTimeout(() => {
    //       showNotesSavedNotification.value = false;
    //     }, 5000);
    //   }
    // })

    // function  setcook() {
    //   cookies.set("cook1", "abcdefg");

    // }

//     function  toastme() {
//     //  cookies.set("myCoookie", "abcdefg");
//       // cookies.set(keyName, value[, expireTimes[, path[, domain[, secure[, sameSite]]]]])   //return this
//       cook1.value=cookies.get('cook1')  // return value 
//       // cook1.value=cookies.get(keyName)  // return value 
//       Swal.fire({
//   title: 'Submit your Github username',
//   input: 'password',
//   inputAttributes: {
//     autocapitalize: 'off'
//   },
//   showCancelButton: true,
//   confirmButtonText: 'Look up',
//   showLoaderOnConfirm: true,
//   preConfirm: (login) => {
//     return axios
//       .post("/api/userdata")
//       .then(response => {
//         if (!response.ok) {
//           throw new Error(response.data.Auth)
//         }
//         return response.json()
//       })
//       .catch(error => {
//         Swal.showValidationMessage(
//           `Request failed: ${error}`
//         )
//       })
//   },
//   allowOutsideClick: () => !Swal.isLoading()
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire({
//       title: `${result.value.login}'s avatar`,
//       imageUrl: result.value.avatar_url
//     })
//   }
// })
//     }

    
    function  ShowOverlayfun() {
      overlayVisibility.value = !overlayVisibility.value;
    }
    function hideOverlay() {
      overlayVisibility.value = false;
    }

    // function updateSidebar() {
    //   AppStore.loggedIn= !AppStore.loggedIn;
    // }

    // function  showEditSuccess() {
    //   editSuccess.value = true;
    // }

    async function  logout() {
      if (!confirm('you will logout !   sure?')) { return }
      AppStore.loading=true
     await axios
        .post("/api/logout")
        .then((response) => {
          console.log('response logout() App.vue');
          console.log(response);
          
          AppStore.loading=false
          AppStore.user=''
        // this.user     =''
        // this.usertype =''
        // this.nameen   =''
        // this.subjects ='[]'
        // this.classname='[]'
        AppStore.loggedIn= false;
        localStorage.removeItem("authenticated");
        router.push({ name: "Login" });
          // $emit("updateSidebar");
          // AppStore.loggedIn= !AppStore.loggedIn;
        })
        .catch((error) => {
          AppStore.loading=false
              console.log('App.vue logout() error ----------');
              console.log(error);


              AppStore.loggedIn= false;
          localStorage.removeItem("authenticated");
          router.push({ name: "Login" });


          return
        if (error.response.status === 401) {
          // this.$emit("updateSidebar");
          // AppStore.loggedIn= !AppStore.loggedIn;
          AppStore.loggedIn= false;
          localStorage.removeItem("authenticated");
          router.push({ name: "Login" });
        }    
        });

        
    }

    onMounted(() => {
      console.log('AppStore.user.usertype onMounted App.vue ============>');
      console.log('is:'+AppStore.user.usertype);
      // AppStore.loading=true
             console.log('app mounted started')
      userdata()
    console.log('is:'+AppStore.user.usertype);

       console.log('app mounted end')
//   console.log('onMounted called! from app.vue')
//   if (localStorage.getItem("authenticated")) {
//      console.log('localStorage')
//     AppStore.loggedIn = true;
//      console.log('AppStore.loggedIn = true')

//   console.log('loggedIn = true')
// if (route.name=='Login') {
//    console.log('login')
  
// }


// // -------------userdata-------------------------
//     userdata()
//     //  console.log(2)
//     } else {
//       AppStore.loggedIn = false;
//       router.push({ name: "Login" });
//        console.log('AppStore.loggedIn = false')
//       if (route.name=='Login') {
//    console.log('login')
  
// }
//     }
//     AppStore.loading=false
})

async function userdata() {

  // -------------axios------------------------
  AppStore.loading=true
     console.log('userdata from App.vue start ------------------ ')
   await axios
      .post("/api/userdata")
      .then((res) => {

        AppStore.loading=false
          AppStore.loggedIn = true;
                    AppStore.user =res.data.data;
        console.log('App.vue userdata() ok  --------------');


      // router.push({ name: "Login" });

          // AppStore.usertype =res.data.data.usertype;
          // alert('App.vue userdata res.data.data.usertype')
          // alert(res.data.data.usertype)
          // console.log('isssss:'+res.data.data.usertype);
          // console.log('isssss:'+AppStore.user.usertype);
          if (res.data.data.usertype=='admin') {routearray.value=routearray_admin.value } 
          if (res.data.data.usertype=='teacher') {routearray.value=routearray_teacher.value } 
          if (res.data.data.usertype=='student') {routearray.value=routearray_student.value } 
        // AppStore.usertype =res.data.data.usertype 
        // AppStore.nameen   =res.data.data.nameen   
        // AppStore.subjects =res.data.data.subjects 
        // AppStore.classname=res.data.data.classname



        
        console.log('userdata from appstore userdata()');

      })
      .catch((error) => {
     console.log('userdata from App.vue error ------------------ ')

        AppStore.loading=false
        console.log(error)
        logout()


      });
  }
</script> 

<style scoped>

.showOverlay {
  width: 100%;
  z-index: 5;
}
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
</style >
<style id="fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8" data-anikit="">@keyframes fade-6bbfb6cf-6c65-4a41-874a-1088aeb911f8
{
  0% {
    animation-timing-function: cubic-bezier(0.2057,0.573,0.3723,0.9184);
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}</style>


<style   scoped>
/* .backm{
  background:#101f61;background:linear-gradient(45deg,#101f61,#2b4cb6 40%,#4171fc 59%,#7fd8ff 85%,#a6e4ff);
} */
</style>