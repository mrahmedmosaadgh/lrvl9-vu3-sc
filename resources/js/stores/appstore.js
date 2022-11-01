import { defineStore } from "pinia";
import { useRouter } from 'vue-router'
import Swal from 'sweetalert2'
const router = useRouter()

export const useAppStore =defineStore('appstore',{


    state:()=>({
        user      :{
          usertype:'',
          nameen:'',
          subjects:'[]',
          classname:'[]',
        },

        //   usertype:'',
        //   nameen:'',
        //   subjects:'[]',
        //   classname:'[]',

        teachers  :null,
        classes   :null,
        subjects  :null,
        marks     :null,
        datafromdb:null,
        datatodb  :null,
        loggedIn:false,
        loading:false,
        // myroutes:{
        //             'admin':[

        //               'adminhome',
        //               'teacher_sub_class',
        //               'controlmarkssetups',
        //               'viewmarks',
        //               'hhhhhhhhhhhhhhh',
        //             ],
        //             'teacher':[

        //               'teacherhome         ',

        //             ],

        // },
         Toast : Swal.mixin({
          toast: true,
          position: 'top-right',
          iconColor: 'white',
          customClass: {
            popup: 'colored-toast'
          },
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true
        }),
//           router : useRouter(),
//   route : useRoute()

    }),
    actions:{

// async redirectme(){
//     console.log('AppStore : redirectme()');
//     this.loggedIn=true
//     await axios
//     .post("/api/userdata")
//     .then((res) => {
//       // mydata.value=res.data.dat   a
//       this.user=res.data.data
     



//       if (this.user.usertype=='admin') {
//         //  console.log(usertype.value)
//          console.log("usertype.value admin")
    
//                 router.push({ name: "adminhome" });

//                 return
//               }
//                if(this.user.usertype=='teacher') {
//                  console.log("usertype.value teacher")
//                  router.push({ name: "teacherhome" });
//                 // router.push({ name: "teacherhome" });
//                 return
//               }else{
//                  console.log("usertype.value student")
    
//                 router.push({ name: "Dashboard" });
//               }














//       console.log('userdata from appstore');

//     })
//     .catch((error) => {
//       console.log(error);
//       // console.log(error.response.data.errors);

//       // errors.value = error.response.data.errors;
//     });
// },

//   check_auth(error_status){
// console.log('check_auth(error_status) start');
// console.log('error_status');
// console.log(error_status);

//     if (error_status === 401) {
//       // router.push('login')
//       console.log('AppStore check_auth() error_status 401 ');
//       console.log(error_status);
      
// //place your reentry code
// alert('AppStore check_auth() error_status 401')
// return
// }
// alert('AppStore check_auth() error_status  not 401')




//     // router.push('/user/1')
//   }

    }

})