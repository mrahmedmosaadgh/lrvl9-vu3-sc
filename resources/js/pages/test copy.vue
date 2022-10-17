<template>
    <div>
        Laravel9Vue3BlogTest' <br>
        {{taskStore.name}}
    </div>
</template>

<script>
import {useTaskStore} from '../stores/store.js'
export default {
    name: 'Laravel9Vue3BlogTest',
setup(){
const taskStore = useTaskStore()
return {
    taskStore
}
},
    data() {
        return {
            
        };
    },

    mounted() {
        
    },

    methods: {
        
    },
};
</script>

<style lang="scss" scoped>

</style>