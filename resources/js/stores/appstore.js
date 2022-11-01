import { defineStore } from "pinia";
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()
export const useAppStore =defineStore('appstore',{


    state:()=>({
        user      :null,
        teachers  :null,
        classes   :null,
        subjects  :null,
        marks     :null,
        datafromdb:null,
        datatodb  :null,
        loggedIn:false,
        loading:false,
        myroutes:{
                    'admin':[

                      'adminhome',
                      'teacher_sub_class',
                      'controlmarkssetups',
                      'viewmarks',
                      'hhhhhhhhhhhhhhh',
                    ],
                    'teacher':[

                      'teacherhome         ',

                    ],

        },
//           router : useRouter(),
//   route : useRoute()

    }),
    actions:{
get_teachers(){

},
async redirectme(){
    console.log('AppStore : redirectme()');
    this.loggedIn=true
    await axios
    .post("/api/userdata")
    .then((res) => {
      // mydata.value=res.data.dat   a
      this.user=res.data.data
     



      if (this.user.usertype=='admin') {
        //  console.log(usertype.value)
         console.log("usertype.value admin")
    
                router.push({ name: "adminhome" });

                return
              }
               if(this.user.usertype=='teacher') {
                 console.log("usertype.value teacher")
                 router.push({ name: "teacherhome" });
                // router.push({ name: "teacherhome" });
                return
              }else{
                 console.log("usertype.value student")
    
                router.push({ name: "Dashboard" });
              }














      console.log('userdata from appstore');

    })
    .catch((error) => {
      console.log(error);
      // console.log(error.response.data.errors);

      // errors.value = error.response.data.errors;
    });
},
async userdata() {
    //  console.log('userdata from appstore')
   await axios
      .post("/api/userdata")
      .then((res) => {
        // mydata.value=res.data.dat   a
        this.user=res.data.data
       
        console.log('userdata from appstore');

      })
      .catch((error) => {
        console.log(error);
        // console.log(error.response.data.errors);

        // errors.value = error.response.data.errors;
      });
  }

    }

})