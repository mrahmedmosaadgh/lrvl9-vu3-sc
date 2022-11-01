<template>
    <div>
        sum9
        <span>{{num1}}</span>  <br>
        <span>{{num2}}</span> <br> 
        <input type="number"  v-model="num1">
        <input type="number"  v-model="num2"
        @change="sumnum=num1+num2"
        >
        <button @click="sumnum=num1+num2">sum</button>
        <span>{{sumnum}}</span><br> 
    </div>
</template>

<script setup>
    import { ref,computed } from 'vue';


        // setup(props, context) {
             const num1 = ref(0);
             const num2 = ref(1);
             const sumnum = ref(9);
            // const featureRef = ref(value);
            // const featureState = reactive({ property: 'value' });

            // return {
            //     featureRef,
            //     featureState
            // }
// const featureState = ref(initialValue);

 computed(() => 
 sumnum.value=sum1.value+sum2.value
 
 );
</script>

<style lang="scss" scoped>

</style>