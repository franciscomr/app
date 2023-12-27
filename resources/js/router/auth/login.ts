import Login from "@/pages/Login.vue"
import { FormElementInput } from "@/classes/form/FormElementInput";

const id = new FormElementInput('username', 'Usuario', 'input','text',true);
const password = new FormElementInput('password', 'Contraseña', 'input','password',true);

export default [
  {
    path: "/app/login",
    name: "login",
    component: Login,
    props: {
      title: 'Login',
      attributes:{
        id,password
      }
    },
  }
]