import DataTable from "@/pages/DataTable.vue";
import { TableElement } from "@/classes/table/TableElement";
import { RelatedTableElement} from '@/classes/table/RelatedTableElement'

const id = new TableElement('id','ID');
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

export default [
  {
    path:'branches',
    name:'branches',
    component:DataTable,
    props:{
      title:'Sucursales',
      type:'branches',
      attributes:{
        id, name,  address, city, state, postalCode, createdBy, updatedBy, createdAt, updatedAt
      },
      relationships:{
        company_id
      }
    }
  }
]