import DataTable from '@/pages/DataTable.vue';
import { TableElement } from '@/classes/table/TableElement';

const id= new TableElement('id','ID');
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

export default [
  {
    path:'companies',
    name:'companies',
    component:DataTable,
    props:{
      title:'Empresas',
      type:'companies',
      attributes:{
        id, name, businessName, address, city, state, postalCode, createdBy, updatedBy, createdAt, updatedAt
      }
    }
  }
]