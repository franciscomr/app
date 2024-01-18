import DataTable from "@/pages/DataTable.vue";
import DataForm from "@/pages/DataForm.vue";
import { TableElement } from "@/classes/table/TableElement";
import { TableElementAction } from "@/classes/table/TableElementAction";
import { FormElementInput } from "@/classes/form/FormElementInput";

const name = new TableElement('name', 'Departamento');
const costCenter = new TableElement('costCenter', 'Centro de Costo');
const createdBy = new TableElement('createdBy', 'Creado Por');
const createdAt = new TableElement('createdAt', 'Creado a las');
const updatedBy = new TableElement('updatedBy', 'Actualizado Por');
const updatedAt = new TableElement('updatedAt', 'Actualizado a las');

const edit = new TableElementAction('edit','Editar Registro','departments.edit','edit',false);
const remove = new TableElementAction('remove','Inactivar Registro','departments.edit','do_not_disturb_on',false);


const  form_Name = new FormElementInput('name','Departamento','input','text',true)
const  form_CostCenter = new FormElementInput('costCenter','Centro de Costo','input','number',true)

export default[
  {
    path:'/app/departments',
    name:'departments',
    component:DataTable,
    props:{
      title:'Departamentos',
      type:'departments',
      attributes:{
        name,costCenter, createdBy, updatedBy, createdAt, updatedAt
      },
      actions:{
        edit, remove
      }
    }
  },
  {
    path:'/app/departments/create',
    name:'departments.create',
    component:DataForm,
    props:{
      title:'Departamentos',
      type:'departments',
      formAction:'create',
      attributes:{
        form_Name, form_CostCenter
      },
    }
  },
  {
    path: "/app/departments/edit/:id",
    name: "departments.edit",
    component: DataForm,
    props: {
      title: 'Departamentos',
      type: 'departments',
      formAction:'edit',
      attributes:{
        form_Name, form_CostCenter
      },
    }
  }
]