<template>
      <Notification />
  <div class="space-y-4 p-4">



    <div class="inline-flex  items-center w-full ">
      <div class="w-1/3 sm:w-1/4">
        <Header :label="title" />
      </div>
      <div class="inline-flex items-center  justify-end space-x-2 w-2/3 sm:w-3/4">
        <div class="md:inline-flex items-center space-x-2 hidden">
          <div>
            <input id="keyword" class="w-64 border dark:text-neutral-200 hover:bg-gray-50 dark:bg-neutral-700 dark:border-neutral-600 hover:dark:bg-white/10 focus:bg-white/10   rounded-md py-1 px-2 border-b-2 focus:border-b-primary focus:bg-white focus:outline-none"
                type="search" v-model="filters.keyword">
          </div>
          <Button @click="showFilterMenu = !showFilterMenu" :label="'Filtrar'" :icon-name="'filter_list'" />
          <div class="relative">
            <div v-show="showFilterMenu" class="absolute right-2 top-6 w-64 z-10">
              <Dropdown>
                <template #content>
                  <DropdownMenu  :icon-name="'calendar_month'" :label="'Creado'" >
                    <template #content>
                      <RadioButtonGroup v-model="filters.createdAt" :list-data="rangeDateArray" />
                    </template>
                  </DropdownMenu>
                </template>
              </Dropdown>
            </div>
          </div>
        </div>
        <Button :label="'Exportar'" :icon-name="'download'" />
        <Button @click="redirectToAction(type, type + '.create',false)" :label="'Nuevo'" :icon-name="'add'" :default-button="false"/>
      </div>
    </div>

    <div class="inline-flex items-center sm:hidden flex-col">
      <span>dsdss</span>
    </div>

      <div class="overflow-auto relative  rounded-t-lg border dark:border-neutral-700 space-y-4">
        <table class="w-full bg-white dark:bg-neutral-800">
          <thead>
            <tr class="w-full h-12 ">
              <th class="px-1 border-b text-sm font-semibold border-neutral-100 dark:text-neutral-100  dark:border-neutral-700">
                <div @click="sort('id')" class="cursor-pointer flex items-center">
                  <span>ID</span>
                  <div class="w-4">
                    <span v-show="'id' === sortBy">
                      <Icons :icon-name="'arrow_upward'" :icon-size="'2xs'" />
                    </span>
                    <span v-show="'id' === sortBy.slice(1)">
                      <Icons :icon-name="'arrow_downward'" :icon-size="'xs'" />
                    </span>
                  </div>
                </div> 
              </th>
              <th v-for="relationship in relationships" class="text-left px-1 border-b text-sm font-semibold border-neutral-100 dark:text-neutral-100  dark:border-neutral-700">
              {{ relationship.name }}
            </th>
              <th v-for="attribute in attributes" class="px-1 border-b text-sm font-semibold border-neutral-100 dark:text-neutral-100  dark:border-neutral-700">
                <div @click="sort(attribute.id)" class="cursor-pointer flex items-center">
                  <span>{{ attribute.name }}</span>
                  <div class="w-4">
                    <span v-show="attribute.id === sortBy">
                      <Icons :icon-name="'arrow_upward'" :icon-size="'2xs'" />
                    </span>
                    <span v-show="attribute.id === sortBy.slice(1)">
                      <Icons :icon-name="'arrow_downward'" :icon-size="'xs'" />
                    </span>
                  </div>
                </div> 
              </th>


            </tr>
          </thead>
          <tbody>
            <tr v-for="(data,index) in dataReceived.data" :key="index" class="text-sm text-left h-12 dark:text-neutral-200 border-t dark:border-neutral-700 dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-700">
              <td>{{data.id}}</td>
              <td v-for="relationship in relationships" class="px-1">
                {{ data.relationships[relationship.resource]['meta']['name']}} 
              </td>
              <td v-for="attribute in attributes" class="px-1">
                {{ data.attributes[attribute.id]}}
              </td>
              <td v-if="Object.keys(actions).length > 0" class="px-1 flex items-center justify-center space-x-1  h-12">
                <div v-for="action in actions">
                  
                  <IconButton @click="redirectToAction(action.name, action.routeName,action.confirmationRequired,data.id )" :icon-name="action.iconName" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>



      <div v-if="Object.keys(pagination).length > 0" class="inline-flex items-center w-full">
        <div class="text-sm min-w-max dark:text-neutral-200">
          <span>{{ pagination.from }} - {{ pagination.to }} <span class="px-1">de</span> 
          {{ pagination.total}} Resultados</span>
        </div>
    


          <div class="w-full flex justify-end space-x-2">
            <div v-for="page in pagination.links">
              <div @click="changePageDisplayed(page.url)"
                class="p-2 rounded-md border dark:border-neutral-700 text-center text-sm"
                :class="page.active? 'text-neutral-600 dark:text-neutral-500':'bg-white dark:bg-neutral-800 dark:text-neutral-200 cursor-pointer' ">
                <div :class="page.label.length < 3 ? 'w-4' : ''">
                  <span v-html="page.label"></span>
                </div>
              </div>
            </div>
          </div>
  
      </div>

      <Transition>
        <p class="text-sm" v-if="dataReceived.length  < 1">No se encontraron registros</p>
      </Transition>



  

   



  </div>
</template>

<script lang="ts">
import {ref, onMounted, watch} from 'vue';
import { useRouter } from 'vue-router';
import route from 'ziggy-js';
import search from '@/functions/search'; 
import getDates from '@/functions/getDates'
import Button from '@/components/Button.vue';
import Header from '@/components/Header.vue';
import Icons from '@/components/Icons.vue';
import FormInput from '@/components/FormInput.vue';
import Dropdown from '@/components/Dropdown.vue';
import DropdownMenu from '@/components/DropdownMenu.vue';
import RadioButtonGroup from '@/components/RadioButtonGroup.vue';
import IconButton from '@/components/IconButton.vue';
import Notification from '@/components/Notification.vue'

export default {
  name:'DataTable',
  props:{
    title: {
      type: String,
      default: 'Title'
    },
    type: {
      type: String,
      default: 'companies'
    },
    attributes: {
      type: Object,
      default:{}
    },
    relationships: {
      type: Object,
      default:{}
    },
    actions: {
      type: Object,
      default:{}
    }
  },
  components:{
    Header,
    Button,
    Icons,
    FormInput,
    Dropdown,
    DropdownMenu,
    RadioButtonGroup,
    IconButton,
    Notification
  },
  setup(props) {

    //Filters
    const showFilterMenu = ref(false);
    const filters:any = ref({
    });
    const rangeDateArray: string[][] = [
      ['Hoy', String([new getDates().today(),new getDates().today()])],
      ['Ayer', String([new getDates().yesterday(), new getDates().yesterday()])],
      ['Esta Semana', String([new getDates().lastweek(),new getDates().today()])],
      ['Este Mes',String([new getDates().lastMonth(),new getDates().today()])],
    ];

    //
    const sortBy = ref('-id');
    const perPage = ref(10);
    const pagination:any = ref({});
    const vueRouter = useRouter();
    let dataReceived:any = ref([]);
  


    const searchData = async () => {
      dataReceived.value = await search(route(String(vueRouter.currentRoute.value.name) + '.index'), sortBy.value, filters.value, perPage.value)

      pagination.value = dataReceived.value.pagination
    }

    const sort = (value:string) => {
      if (sortBy.value.startsWith('-')) {
        sortBy.value = sortBy.value.slice(1)
        if (value !== sortBy.value) {
          sortBy.value = value
        }
      } else {
        if (value === sortBy.value) {
          sortBy.value = '-' + value
        } else {
          sortBy.value = value
        }
      }
      searchData();
    }

    const changePageDisplayed = async (url:string) => {
      if (url !== null) {
        dataReceived.value = await search(url, sortBy.value, filters.value, perPage.value)
      }
    }

    watch(() => filters.value['createdAt'] || filters.value['keyword'] , (after, before) => {
     searchData();
     showFilterMenu.value = false
      //console.log(filters.value)
        });
    
    watch(() => props.title, (after, before) => {
      filters.value = {}
      dataReceived.value = {}
      pagination.value = {}
      searchData()
    });

    const redirectTo = (path:string, confirmationRequired?:boolean) => {
      if(confirmationRequired) {
        console.log('required Confirmation')
      }
      vueRouter.push({ name: path });
    }

    const redirectToAction = (name:string, routeName:string ,confirmationRequired:boolean, routeId?:string ) => {
      if(confirmationRequired) {
        if (confirm(`¿Deseas ${name} con ID ${routeId} ?`) == false) {
          return false;
        } else {
          if (routeId === undefined) {
          vueRouter.push({ name: routeName });
          } else {
            vueRouter.push({ name: routeName, params: { id : routeId } });
          }
        }
      } else {
        if (routeId === undefined) {
          vueRouter.push({ name: routeName });
          } else {
            vueRouter.push({ name: routeName, params: { id : routeId } });
          }
      }

    }
    onMounted(() => {
      searchData()
    });

    return {dataReceived,sortBy,sort, showFilterMenu, filters, rangeDateArray,changePageDisplayed, pagination, redirectTo, redirectToAction}
  }


}
</script>