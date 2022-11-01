<template>
    <div>
        <p>path:{{path}}</p>
        resources/js\pages\forqan\admin\addstudent\addstudenthome.vue
<!--        
    resources\js\router\index.js

    .........................................................
       mypath='forqan/admin/addstudent/addstudenthome'
       myname='addstudenthome'
const newname          = () => import('../pages/mypath.vue')
    {path: '/mypath'      ,component: newname        ,name: 'newname'          ,meta: { auth: true, title: 'grading' }}, -->

<!-- 
    App.vue add to sidebar - -> 
-->

    </div>
</template>

<script setup>
    import { ref,computed } from 'vue';
    import {useRoute} from 'vue-router'
    import {useAppStore} from '@/stores/appstore'
    const route=useRoute();
    const AppStore = useAppStore();
    const path = computed(() =>route.path)

    // import { ref, reactive,computed } from 'vue';
            const featureRef = ref('');
            // const featureState = reactive({ property: 'value' });


</script>

<style scoped>

</style>