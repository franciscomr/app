import DataTable from '@/pages/DataTable.vue';
import DataForm from "@/pages/DataForm.vue";
import { TableElement } from '@/classes/table/TableElement';
import { TableElementAction } from "@/classes/table/TableElementAction";
import { FormElementInput } from "@/classes/form/FormElementInput";

const name = new TableElement('name', 'Empresa');
const businessName = new TableElement('businessName', 'Razón Social');
const address = new TableElement('address', 'Dirección');
const city = new TableElement('city', 'Ciudad');
const state = new TableElement('state', 'Estado');
const postalCode = new TableElement('postalCode', 'CP');
const createdBy = new TableElement('createdBy', 'Creado Por');
const createdAt = new TableElement('createdAt', 'Creado a las');
const updatedBy = new TableElement('updatedBy', 'Actualizado Por');
const updatedAt = new TableElement('updatedAt', 'Actualizado a las');


const form_name = new FormElementInput('name', 'Empresa', 'input','text', true);
const form_businessName = new FormElementInput('businessName', 'Razón Social', 'input','text', true);
const form_address = new FormElementInput('address', 'Dirección', 'input','text', true);
const form_city = new FormElementInput('city', 'Ciudad', 'input','text', true);
const form_state = new FormElementInput('state', 'Estado', 'input','text', true);
const form_postalCode = new FormElementInput('postalCode', 'CP', 'input','text', true);

const edit = new TableElementAction('edit','Editar Registro','companies.edit','edit',false);

export default [
  {
    path:'/app/companies',
    name:'companies',
    component:DataTable,
    props:{
      title:'Empresas',
      type:'companies',
      attributes:{
        name, businessName, address, city, state, postalCode, createdBy, updatedBy, createdAt, updatedAt
      },
      actions:{
        edit
      }
    }
  },
  {
    path:'/app/companies/create',
    name:'companies.create',
    component:DataForm,
    props:{
      title:'Empresas',
      type:'companies',
      formAction:'create',
      attributes:{
        form_name, form_businessName, form_address, form_city, form_state, form_postalCode
      },
    }
  },
  {
    path: "/app/companies/edit/:id",
    name: "companies.edit",
    component: DataForm,
    props: {
      title: 'Empresas',
      type: 'companies',
      formAction:'edit',
      attributes:{
        form_name, form_businessName, form_address, form_city, form_state, form_postalCode

      },
    }
  }
]