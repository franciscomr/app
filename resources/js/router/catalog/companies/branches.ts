import DataTable from "@/pages/DataTable.vue";
import { TableElement } from "@/classes/table/TableElement";
import { FormElementSelect } from "@/classes/form/FormElementSelect";
import { FormElementInput } from "@/classes/form/FormElementInput";
import { RelatedTableElement} from '@/classes/table/RelatedTableElement'
import DataForm from "@/pages/DataForm.vue";

const name = new TableElement('name', 'Sucursal');
const company_id = new RelatedTableElement('company_id', 'Empresa','companies');
const address = new TableElement('address', 'Dirección');
const city = new TableElement('city', 'Ciudad');
const state = new TableElement('state', 'Estado');
const postalCode = new TableElement('postalCode', 'CP');
const createdBy = new TableElement('createdBy', 'Creado Por');
const createdAt = new TableElement('createdAt', 'Creado a las');
const updatedBy = new TableElement('updatedBy', 'Actualizado Por');
const updatedAt = new TableElement('updatedAt', 'Actualizado a las');

const form_name = new FormElementInput('name','Sucursal','input','text',true)
const form_company_id = new FormElementSelect('company_id','Empresa','select','companies',true)
const form_address = new FormElementInput('address','Dirección','input','text',true)
const form_city = new FormElementInput('city','Cuidad/Población','input','text',true)
const form_state = new FormElementInput('state','Estado','input','text',true)
const form_postalCode = new FormElementInput('postalCode','Código Postal','input','text',true)


export default [
  {
    path:'/app/branches',
    name:'branches',
    component:DataTable,
    props:{
      title:'Sucursales',
      type:'branches',
      attributes:{
        name,  address, city, state, postalCode, createdBy, updatedBy, createdAt, updatedAt
      },
      relationships:{
        company_id
      }
    }
  },
  {
    path:'/app/branches/create',
    name:'branches.create',
    component:DataForm,
    props:{
      title:'Sucursales',
      type:'branches',
      formAction:'create',
      attributes:{
        form_name,  form_address, form_city, form_state, form_postalCode
      },
      relationships:{
        form_company_id
      }
    }
  }
]