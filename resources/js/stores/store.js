import { defineStore } from "pinia";

export const useTaskStore =defineStore('taskStore',{
    state:()=>({
        tasks:[
            {id:1,title:'hi', isFav: false},
            {id:2,title:'hi2', isFav: true},
        ],
        name:'Ali'
    }),
    actions:{
        
    }

})