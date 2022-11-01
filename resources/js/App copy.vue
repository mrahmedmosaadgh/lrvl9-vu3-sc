<template>
  <div id="wrapper">
    <!-- sidebar -->
    <div class="sidebar" :class="{ showOverlay: overlayVisibility }">
      <span class="closeButton" @click="hideOverlay">&times;</span>
      <p class="brand-title"><a href="">school every thing</a></p>

      <div class="side-links">
        <ul>
          <!-- <li>
            <router-link @click="hideOverlay" :to="{ name: 'getdb' }"
              >getdb</router-link
            >
          </li> -->

          
          <li>
            <router-link @click="hideOverlay" :to="{ name: 'Home' }"
              >Home</router-link
            >
          </li>
          <li>
            <router-link @click="hideOverlay" :to="{ name: 'Blog' }"
              >Blog</router-link
            >
          </li>
          <li>
            <router-link @click="hideOverlay" :to="{ name: 'About' }"
              >About</router-link
            >
          </li>
          <li>
            <router-link @click="hideOverlay" :to="{ name: 'Contact' }"
              >Contact</router-link
            >
          </li>
          <li v-if="!loggedIn">
            <router-link @click="hideOverlay" :to="{ name: 'Register' }"
              >Register</router-link
            >
          </li>
          <li v-if="!loggedIn">
            <router-link @click="hideOverlay" :to="{ name: 'Login' }"
              >Login</router-link
            >
          </li>
          <li v-if="loggedIn">
            <router-link @click="hideOverlay" :to="{ name: 'Dashboard' }"
              >Dashboard</router-link
            >
          </li>
          <li v-if="loggedIn">
            <router-link @click="hideOverlay" :to="{ name: 'test' }"
              >test</router-link
            >
          </li>
        </ul>
      </div>

      <!-- sidebar footer -->
      <footer class="sidebar-footer">
        <div>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
        </div>

        <small>&copy; 2021 Alphayo Blog</small>
      </footer>
    </div>
    <!-- Menu Button -->
    <div class="menuButton" @click="ShowOverlay">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <!-- main -->
    <main class="container">
      <!-- render components depending on the page visited -->

      <router-view
        @update-sidebar="updateSidebar"
        @show-edit-success="showEditSuccess"
        :editSuccess="editSuccess"
        :key="$route.path"
      ></router-view>
    </main>

    <!-- Main footer -->
    <footer class="main-footer">
      <div>
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
      </div>
      <small>&copy; {{thisyear}} school every thing</small>
    </footer>
  </div>
</template>
<script setup>
  import { useAuth0 } from "@auth0/auth0-vue";
import { ref } from "vue";
  
  const { isAuthenticated } = useAuth0();
  const overlayVisibility = ref(false);
  const loggedIn = ref(false);
  const editSuccess = ref(false);
  const thisyear = new Date().getFullYear();


export default {
  data() {
    return {
      overlayVisibility: false,
      loggedIn: false,
      editSuccess: false,
      thisyear:new Date().getFullYear(),
    };
  },

  methods: {
    ShowOverlay() {
      this.overlayVisibility = true;
    },

    hideOverlay() {
      this.overlayVisibility = false;
    },

    updateSidebar() {
      this.loggedIn = !this.loggedIn;
    },

    showEditSuccess() {
      this.editSuccess = true;
    },
  },

  mounted() {
    if (localStorage.getItem("authenticated")) {
      this.loggedIn = true;
    } else {
      this.loggedIn = false;
    }
  },
};
</script> 

<style scoped>
.showOverlay {
  width: 100%;
  z-index: 5;
}
</style>