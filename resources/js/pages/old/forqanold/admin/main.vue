<template>
    <div class=' m-5'>
    <nav1>
        nav err
    </nav1>
        Laravel9Vue3BlogAdmin' <br>
        Laravel9Vue3BlogAdmin' <br>
        Laravel9Vue3BlogAdmin' <br>
        Laravel9Vue3BlogAdmin' <br>
        <p> <br></p>
        <p>{{uuactivestore1}}</p>
        <p>{{uuactivestore1}}</p>
        <p>{{tasks}}</p>
        <p>{{isactivemain}}</p>
        <p>{{isactivemain}}</p>
    </div>
</template>

<script setup>
import nav1 from './nav.vue'
import { ref } from 'vue';
import { useTaskStore } from '../../../stores/store';
const {tasks,uuactivestore1}=useTaskStore();

const isactivemain=ref('isactivemain');

</script>

<style scoped>
.m-5{
    margin:42px;
}
</style>