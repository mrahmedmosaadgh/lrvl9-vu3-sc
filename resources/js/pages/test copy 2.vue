<template>
    <div>
        Laravel9Vue3BlogTest' <br>
        {{taskStore.name}} <br>
        {{taskStore.tasks[0].title}} <br>
        {{taskStore.tasks[0].title}} <br>
        {{taskStore.tasks[0].title}} <br>
        {{taskStore.tasks[0].title}} <br>
        {{taskStore.tasks[1].title}} <br>
    </div>
</template>

<script setup>
import {useTaskStore} from '../stores/store.js'
const taskStore = useTaskStore()

</script>

<style lang="scss" scoped>

</style>