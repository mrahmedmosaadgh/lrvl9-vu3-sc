<template>
    <div>
        <p><button @click="getmarks_fromdb()">MarksSetup</button></p>    
        
        <div v-if="datadb!= null">
        <!-- <div v-if="datadb.data!= 'undefined'"> -->
            <!-- <p>datadb:{{datadb}}</p> -->
<div v-for="item in datadb.data" :key="item.id">
    {{ item.sub1 }}:{{ item.sub2 }}:{{ item.sub3 }} <br>
    P":12,"HW":11,"Q1":null,"Q2":null,"Qtotal":null,"Projects":null,"exam":null,"total":55,"grade":null,"notes":null}
</div>
        </div>
        
        </div>
</template>

<script>
export default {
    name: 'Laravel8Vue3SanctumSpaBest3Adminhome',

    data() {
        return {
            datadb:null,
        };
    },

    mounted() {
        
    },

    methods: {
      async   getmarks_fromdb(){
                 
                            // this.loading = true;  
                            try{
                            await axios.post("/api/teacher/admin/showmarks" )
                            .then((res) => {
                            this.datadb = res.data;
            console.log(res.data);
                            // this.loading = false;
                            });
                            } catch (e) {
                            console.log(e);
                            // alert(e.response.status);
                            }
                          },//fromdbfun
         
    },
};
</script>

<style  scoped>

</style>