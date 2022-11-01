import { defineStore } from "pinia";

export const useTeacherStore =defineStore('teacherstore',{
    state:()=>({
        user      :null,

        classes   :null,
        mystudents   :null,
        subjects  :null,
        marks     :null,
        datafromdb:null,
        datatodb  :null,
        currentclass:''
    }),
    actions:{
        async    class_get_students_fun(myclass) {
            myclasstoedit.value=myclass

                            try{
                            await axios.post("/api/forqan/teacher/class/getstudents",{classname:myclass} )
                            .then((res) => {
                            this.mystudents = res.data.data;
            console.log(res.data);
                            // this.loading = false;
                            });
                            } catch (e) {
                            console.log(e);
                            // alert(e.response.status);
                            }

        }


    }

})