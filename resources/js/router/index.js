import { createRouter, createWebHistory } from "vue-router";

import About from '../pages/About.vue'
import Home from "../pages/Home.vue";
import Blog from "../pages/Blog.vue";
import Contact from "../pages/Contact.vue";
import SingleBlog from "../pages/SingleBlog.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";
import Dashboard from "../pages/Dashboard.vue";
import CreateCategories from "../pages/categories/CreateCategories.vue";
import CategoriesList from "../pages/categories/CategoriesList.vue";
import EditCategories from "../pages/categories/EditCategories.vue";
import CreatePosts from "../pages/posts/CreatePosts.vue";
import DashboardPostsList from "../pages/posts/DashboardPostsList.vue";
import EditPosts from "../pages/posts/EditPosts.vue";
// import test from "../pages/test.vue";
// import adminmain from "../pages/forqan/admin/main.vue";
// import savecode from "../pages/savecode/savecode.vue";

// -------------------------------------------------------------resources\js\pages\help\msql\getdb.vue
// import test2 from "../pages/test2.vue";
// import getdb from "../pages/help/msql/getdb.vue";
import PathNotFound from "../pages/PathNotFound.vue";

// -------------------------------------------------------------resources\js\pages\help\msql\getdb.vue
// ========forqan=======================================================================
// resources\js\Views\forqan\teacher\teacherhome.vue


// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
// ========forqan=======================================================================

// forqan--teacherhome-----------------------------------------------------------------------
// admin------------------------------------------------
const adminhome          = () => import('../pages/forqan/admin/adminhome.vue')
const teacher_sub_class  = () => import('../pages/forqan/admin/teacher_sub_class.vue')
const controlmarkssetups = () => import('../pages/forqan/admin/marks/controlmarkssetups.vue')
const viewmarks          = () => import('../pages/forqan/admin/marks/viewmarks.vue')
// admin------------------------------------------------







// teacher------------------------------------------------
const teacherhome       = () => import('../pages/forqan/teacher/teacherhome.vue')
// teacher------------------------------------------------







// student------------------------------------------------
const studenthome       = () => import('../pages/forqan/student/studenthome.vue')

    // student------------------------------------------------






const routes = [



    // forqan--teacherhome-----------------------------------------------------------------------
    // {path: '/savecode'      ,component: savecode        ,name: 'savecode'          ,meta: { auth: true, title: 'savecode' }},


    // admin------------------------------------------------
    {path: '/forqan/admin/adminhome'      ,component: adminhome        ,name: 'adminhome'          ,meta: { auth: true, title: 'adminhome' }},
    {path: '/forqan/admin/teacher_sub_class'      ,component: teacher_sub_class        ,name: 'teacher_sub_class'          ,meta: { auth: true, title: 'teacher_sub_class' }},
    {path: '/forqan/admin/marks/controlmarkssetups'      ,component: controlmarkssetups        ,name: 'controlmarkssetups'          ,meta: { auth: true, title: 'controlmarkssetups' }},
    {path: '/forqan/admin/marks/viewmarks'      ,component: viewmarks        ,name: 'viewmarks'          ,meta: { auth: true, title: 'viewmarks' }},
    // admin------------------------------------------------






    // teacher------------------------------------------------
    {path: '/forqan/teacher/teacherhome'      ,component: teacherhome        ,name: 'teacherhome'          ,meta: { auth: true, title: 'teacherhome' }},
    // teacher------------------------------------------------







    // student------------------------------------------------
    {path: '/forqan/student/studenthome'      ,component: studenthome        ,name: 'studenthome'          ,meta: { auth: true, title: 'studenthome' }},
    // student------------------------------------------------
    // forqan/admin/controlmarkssetups

        // forqan-resources\js\Views\forqan\admin\teacher_sub_class.vue------------------------------------------------------------------------


















        // {path: "/getdb",name: "getdb",component: getdb,title:'getdb'},
    
    // {
    //     path: "/test2",
    //     name: "test2",
    //     component: test2,
    // },
    // {
    //     path: "/savecode",  name: "savecode",  component: savecode,
    //     meta: { requiresAuth: false },
    //     // props: true
    // },
    // {
    //     path: "/admin/main",  name: "adminmain",  component: adminmain,
    //     meta: { requiresAuth: true },
    //     props: true
    // },
    // {
    //     path: "/test",
    //     name: "test",
    //     component: test,
    // },
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    },
    {
        path: "/blog",
        name: "Blog",
        component: Blog,
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact,
    },
    {
        path: "/blog/:slug",
        name: "SingleBlog",
        component: SingleBlog,
        props: true,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
        meta: { requiresGuest: true }
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
        meta: { requiresGuest: true }
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard,
        meta: { requiresAuth: true }
    },
    {
        path: "/categories/create",
        name: "CreateCategories",
        component: CreateCategories,
        meta: { requiresAuth: true },
    },

    {
        path: "/categories",
        name: "CategoriesList",
        component: CategoriesList,
        meta: { requiresAuth: true },
    },

    {
        path: "/categories/:id/edit",
        name: "EditCategories",
        component: EditCategories,
        meta: { requiresAuth: true },
        props: true
    },

    {
        path: "/posts/create",
        name: "CreatePosts",
        component: CreatePosts,
        meta: { requiresAuth: true },
    },

    {
        path: "/dashboard-posts",
        name: "DashboardPostsList",
        component: DashboardPostsList,
        meta: { requiresAuth: true },
    },

    {
        path: "/posts/:slug/edit",
        name: "EditPosts",
        component: EditPosts,
        meta: { requiresAuth: true },
        props: true
    },
    { path: '/:pathMatch(.*)*', component: PathNotFound },
];

const router = createRouter({
    history: createWebHistory(),
    routes
    // routes,routes2
});

router.beforeEach((to, from) => {
    const authenticated = localStorage.getItem("authenticated");

    if (to.meta.requiresGuest && authenticated) {
        return {
            name: "Dashboard",
        };
    } else if (to.meta.requiresAuth && !authenticated) {
        return {
            name: "Login",
        };
    }
});

export default router;
