<template>
  <div id="backend-view">
    <!-- <div class="logout"><a href="#" @click="logout">Log out</a></div> -->
    <h1 class="heading">Dashboard</h1>
    <p><span
      class=" bg-black text-white px-3 py-1 m-3 rounded text-xl"
      >{{AppStore.user.usertype}}</span></p>
    <span>Hi {{ name }}!</span>
    <div class="links">
      <ul>
        <li v-for="item in routearray_admin" :key="item.id"
        >
         
          <router-link
          v-if="AppStore.user.usertype=='admin'"
          :to="item.rout">{{item.title}}</router-link>
        </li>


        <li v-for="item in routearray_teacher" :key="item.id"
        >
         
          <router-link
          v-if="AppStore.user.usertype=='teacher'"
          :to="item.rout">{{item.title}}</router-link>
        </li>


      </ul>
    </div>
  </div>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router'
import {useAppStore} from '@/stores/appstore'
import { ref } from 'vue';
import { onMounted } from 'vue'
const AppStore = useAppStore();
const router = useRouter()
const name = ref('');
const routearray_admin = ref(
  [
    {title:'adminhome',rout:{name: 'adminhome'}},
    {title:'teacher_sub_class',rout:{name: 'teacher_sub_class'}},
  ]
);
const routearray_teacher = ref(
  [
    {title:'teacherhome',rout:{name: 'teacherhome'}},
  ]
);


onMounted(() => {
      console.log('mounted in the composition api!')


      axios
      .get("/api/user")
      .then((response) => (name.value = response.data.name))
      .catch((error) => {
        if (error.response.status === 401) {
          // this.$emit("updateSidebar");
          AppStore.loggedIn= false;
          localStorage.removeItem("authenticated");
          // this.$router.push({ name: "Login" });
          router.push({ name: "Login" });

        }
      });








    })





  // mounted() {
  //   axios
  //     .get("/api/user")
  //     .then((response) => (this.name = response.data.name))
  //     .catch((error) => {
  //       if (error.response.status === 401) {
  //         // this.$emit("updateSidebar");
  //         this.TaskStore.loggedIn= !this.TaskStore.loggedIn;
  //         localStorage.removeItem("authenticated");
  //         this.$router.push({ name: "Login" });
  //       }
  //     });
  // },


  function logout() {
      axios
        .post("/api/logout")
        .then((response) => {
          localStorage.removeItem("authenticated");
          // this.$emit("updateSidebar");
          AppStore.loggedIn= false;
          router.push({ name: "Login" });
        })
        .catch((error) => console.log(error));
    }




//   methods: {
//     logout() {
//       axios
//         .post("/api/logout")
//         .then((response) => {
//           this.$router.push({ name: "Login" });
//           localStorage.removeItem("authenticated");
//           // this.$emit("updateSidebar");
//           this.TaskStore.loggedIn= !this.TaskStore.loggedIn;
//         })
//         .catch((error) => console.log(error));
//     },
//   },
// };
</script>

<style scoped>
/* dashboard */
#backend-view {
  text-align: center;
  background-color: #f3f4f6;
  height: 100vh;
  padding-top: 15vh;
}

.logout {
  position: absolute;
  top: 30px;
  right: 40px;
}
.heading {
  margin-bottom: 5px;
}
.links {
  margin-top: 30px;
  margin-left: auto;
  margin-right: auto;
  background: #ffffff;
  max-width: 500px;
  padding: 15px;
  border-radius: 15px;
}
.links ul {
  list-style: none;
}
.links a {
  all: revert;
  font-size: 26px;
  display: inline-block;
  margin: 10px 0;
}
</style>
