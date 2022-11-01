<template>
  <div id="backend-view">
    <div class="logout"><a href="#" @click="logout">Log out</a></div>
    <h1 class="heading">Dashboard</h1>
    <p><span
      class=" bg-black text-white px-3 py-1 m-3 rounded text-xl"
      >{{AppStore.user.usertype}}</span></p>
    <span>Hi {{ name }}!</span>
    <!-- <span class=" bg-black text-white px-3 py-1 m-3 rounded text-xl">{{AppStore.user.nameen}}</span> -->
    <div class="links">
      <ul>
        <li>
          <router-link :to="{ name: 'CreatePosts' }">Create Posts</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'DashboardPostsList' }"
            >Posts List</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'CreateCategories' }"
            >Create Categories</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'CategoriesList' }"
            >Categories List</router-link
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
export default {
  data() {
    return {
      name: "",
    };
  },
  mounted() {
    axios
      .get("/api/user")
      .then((response) => (this.name = response.data.name))
      .catch((error) => {
        if (error.response.status === 401) {
          // this.$emit("updateSidebar");
          this.TaskStore.loggedIn= !this.TaskStore.loggedIn;
          localStorage.removeItem("authenticated");
          this.$router.push({ name: "Login" });
        }
      });
  },

  methods: {
    logout() {
      axios
        .post("/api/logout")
        .then((response) => {
          this.$router.push({ name: "Login" });
          localStorage.removeItem("authenticated");
          // this.$emit("updateSidebar");
          this.TaskStore.loggedIn= !this.TaskStore.loggedIn;
        })
        .catch((error) => console.log(error));
    },
  },
};
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
