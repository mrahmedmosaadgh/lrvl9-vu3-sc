<template>
  <div id="backend-view" >


<h3 class=" text-center">Login to <span class="text-2xl">AlForqan</span>   - Exams Section
</h3>
<!-- 
        <img src="/public/img/forqan/2.gif" 
        class="   fixed-top  h-22 m-12
                " alt=""> -->
<form @submit.prevent="submit" >

      <label for="email">Email</label>
      <input type="text" id="email" v-model="fields.email" />
      <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>

      <label for="password">Password</label>
      <input type="password" id="password" v-model="fields.password" />
      <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>

      <button class="button buttong2" type="submit">Log In</button>
      <!-- <span>Don't have an account? <a href="">Sign up</a></span> -->
      <p >
      <small  class=""
      :class="(errmsgclass)?'bg-grren-200 text-green-700':'bg-red-200 text-red-700'"
      >{{errmsg}}</small>
</p>
    </form>









  </div>
</template>

<script setup>
import {ref,onMounted} from 'vue'
// import {useTaskStore} from '../stores/store'
import {useAppStore} from '@/stores/appstore'
import { useRouter } from 'vue-router'
const AppStore = useAppStore();
const router = useRouter()
const errmsg  = ref('')
const errmsgclass  = ref(true)
// router.push
// import { useAuth0 } from "@auth0/auth0-vue";
// import LoginButton from "@/components/buttons/login-button.vue";
// import LogoutButton from "@/components/buttons/logout-button.vue";
// const { isAuthenticated } = useAuth0();
// const TaskStore   = useTaskStore();

const fields=ref({})
const errors=ref({})
const mydata=ref('')

// const isAuth=useAuth0()

onMounted(() => {
  AppStore.loading=true
   console.log('onMounted login.vue : usertype.value')
  //  console.log(usertype.value)
  AppStore.loading=false
  if (AppStore.loggedIn==false) {return}
  AppStore.userdata()
  if (AppStore.user.usertype=='admin') {
    //  console.log(usertype.value)
     console.log("usertype.value admin")

            router.push({ name: "adminhome" });
            return
          }
           if(AppStore.user.usertype=='teacher') {
             console.log("usertype.value teacher")
            router.push({ name: "teacherhome" });
            return
          }else{
             console.log("usertype.value student")

            router.push({ name: "Dashboard" });
          }

});
function submit() {
  AppStore.loading=true
      axios
        .post("/api/login", fields.value)
        .then(() => {
          errmsg.value='login success'
          errmsgclass.value=true
          // router.push({ name: "Dashboard" });
          localStorage.setItem("authenticated", "true");
          AppStore.loggedIn=true
          AppStore.loading=false
          console.log('userdata()');
          userdata()
  if (AppStore.user.usertype=='admin') {
    //  console.log(usertype.value)
     console.log("usertype.value admin")

            router.push({ name: "adminhome" });
            return
          }
           if(AppStore.user.usertype=='teacher') {
             console.log("usertype.value teacher")
            router.push({ name: "teacherhome" });
            return
          }else{
             console.log("usertype.value student")

            router.push({ name: "Dashboard" });
          }
          console.log('after userdata()');
          
          // console.log('AppStore.user');
          // console.log(AppStore.user);
          
          // AppStore.loggedIn=true
          // $emit("updateSidebar");













        })
        .catch((error) => {
          AppStore.loading=false
          errmsg.value=error
          errmsgclass.value=false
          // if(error.response.status!=undefined){
            
          
          // if(error.response.status==500){
          //   errmsg.value='Internal Server Error'
          // }else{
          //   errmsg.value='Error'
          // }}
          
          // errmsg.value=error.response.errors
          console.log('error');
          console.log(error);
          // errors.value = error.response.errors;
        });
    }

async function userdata() {
  AppStore.loading=true
  console.log('start userdata()');
     await axios
        .post("/api/userdata")
        .then((res) => {
          errmsg.value=''
          errmsgclass.value=true
          AppStore.loading=false
          mydata.value=res.data.data
          AppStore.user=res.data.data
          // usertype.value=res.data.data.usertype
          if (AppStore.userusertype=='admin') {
            router.push({ name: "adminhome" });
          } else if(AppStore.userusertype=='teacher') {
            router.push({ name: "teacherhome" });
          }else{
            router.push({ name: "Dashboard" });
          }
          console.log(res.data.data);

        })
        .catch((error) => {
          errmsg.value='Error loading user data'
          errmsgclass.value=true
          AppStore.loading=false
          console.log(error);
          console.log(error.response.data.errors);

          // errors.value = error.response.data.errors;
        });
    }
    

</script>

<style scoped>
#backend-view {
  height: 100vh;
  /* background-color: #f3f4f6; */
  background-color:  #A4C5E4;
 
  display: grid;
  align-items: center;
}
form {
  width: 400px;
  background-color: #ffffff;
  margin: 0 auto;
  border-radius: 10px;
  border: 2px solid rgba(255, 255, 255, 0.1);
  padding: 20px 15px;
}
form * {
  letter-spacing: 0.5px;
  outline: none;
}

label {
  display: block;
  margin-top: 20px;
  font-size: 16px;
  font-weight: 500;
}
input {
  display: block;
  height: 50px;
  width: 100%;
  border-radius: 3px;
  padding: 0 px;
  margin-top: 8px;
  font-size: 16px;
  font-weight: 300;
}

button {
  margin-top: 10px;
  width: 100%;
  background-color: rgba(0, 46, 173, 0.7);
  color: #ffffff;
  padding: 3px 0;
  font-size: 18px;
  font-weight: 600;
  border-radius: 5px;
  cursor: pointer;
  
}
form span {
  display: block;
  margin-top: 35px;
}
a {
  color: rgba(0, 46, 173, 0.8);
}
.buttong2:active {
    color: #80bed6;
    background: -webkit-gradient(linear,left top,left bottom,from(#0078a5),to(#00adee));
    background: -moz-linear-gradient(top,#0078a5,#00adee);
}
.buttong2:hover {
    background: #007ead;
    background: -webkit-gradient(linear,left top,left bottom,from(#0095cc),to(#00678e));
    background: -moz-linear-gradient(top,#0095cc,#00678e);
}
.button:active {
    position: relative;
    top: 1px;
}
.button:hover {
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
.buttong2 {
    color: #d9eef7;
    border: solid 1px #0076a3;
    background: #0095cd;
    background: -webkit-gradient(linear,left top,left bottom,from(#00adee),to(#0078a5));
    background: -moz-linear-gradient(top,#00adee,#0078a5);
    background: linear-gradient(#00adee,#0078a5);
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.button {
    display: inline-block;
    outline: 0;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    font-size: 2em;
    padding: 0.3em 1em 0.3em;
    text-shadow: 0 1px 1px rgb(0 0 0 / 30%);
    -webkit-border-radius: 0.5em;
    -moz-border-radius: .5em;
    border-radius: 0.5em;
    -webkit-box-shadow: 0 1px 2px rgb(0 0 0 / 20%);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
    box-shadow: 0 1px 2px rgb(0 0 0 / 20%);
    box-sizing: border-box;
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}
</style>
