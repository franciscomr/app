import Login from "@/pages/Login.vue"
import { FormElementInput } from "@/classes/form/FormElementInput";
import { DataSchema } from "@/classes/jsonApi/DataSchema";

const user = new FormElementInput('username', 'Usuario', 'input','text',true);
const password = new FormElementInput('password', 'Contraseña', 'input','password',true);

const data = new DataSchema('login','',{user,password});

export default [
  {
    path: "/app/login",
    name: "login",
    component: Login,
    props: {
      data:data
    }
  }
]