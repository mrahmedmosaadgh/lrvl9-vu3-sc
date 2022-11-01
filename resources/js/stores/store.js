import { defineStore } from "pinia";

export const useTaskStore =defineStore('taskStore',{
    state:()=>({
        user:null,
        loggedIn:false,
        tasks:[
            {id:1,title:'hi', isFav: false},
            {id:2,title:'hi2', isFav: true},
        ],
        name:'Ali',
        uuactivestore1:'yyyyyyyyyyyyy',
    }),
    actions:{
        
    }

})