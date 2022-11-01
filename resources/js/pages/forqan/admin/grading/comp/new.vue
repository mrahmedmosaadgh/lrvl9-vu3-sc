<template>
    <div>
        <p>path:{{path}}</p>
        resources\js\pages\forqan\admin\grading\comp\new.vue
<!--        
    resources\js\router\index.js

    .........................................................
       mypath='forqan/admin/grading/comp/new'
       myname='newname'
const newname          = () => import('../pages/mypath.vue')
    {path: '/mypath'      ,component: newname        ,name: 'newname'          ,meta: { auth: true, title: 'grading' }}, -->


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