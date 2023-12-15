<template>
  <Background>
    <template #content>
      <div class="h-screen overflow-hidden">
        <div class="flex flex-col h-full">
          <div class="flex  w-full h-12">
            <NavBar>
              <template #left>
                <div class="inline-flex space-x-2">
                    <NavBarButton @click="showMenu = !showMenu" :icon-name="'menu'"/>
                    <div class="rounded justify-center items-center flex">
                        <img src="images/logo.png" class="h-10 w-auto" />
                    </div>
                </div>
                </template>
                <template #right>
                  <div class="inline-flex space-x-2">
                    <NavBarButton  :icon-name="'search'" class="sm:hidden"/>
                    <NavBarButton @click="showUserMenu = !showUserMenu" :icon-name="'person'" :icon-fill="true"/>
                    </div>
                </template>
            </NavBar>
          </div>

          <div class="flex  w-full h-full bg-white dark:bg-neutral-900 overflow-hidden">

            
                <div v-show="showUserMenu" class="absolute top-15 right-0 z-10">
                    <div class="p-1  bg-white dark:bg-neutral-800  rounded shadow dark:shadow-neutral-950  border-white border-opacity-0 flex-col inline-flex w-64 ">

                        <DropdownLink :label="'Cerrar Sesión'" />
                    </div>
                </div>
          


            <Dropdown v-show="showMenu" :width="'lg'">
                <template #content>
                    <DropdownMenu :label="'Organizaciones'">
                        <template #content>
                           <DropdownLink :label="'Nuevo Elemento'" />
                           <DropdownLink />
                           <DropdownLink />
                           <DropdownLink />
                        </template>
                    </DropdownMenu>

                    <DropdownMenu :label="'Mesa de Ayuda Mantenimiento'">
                        <template #content>
                            <DropdownLink />
                            <DropdownLink :label="'Nuevo Elemento'" />
                           <DropdownLink />
                        </template>
                    </DropdownMenu>
                </template>
            </Dropdown>





<div class="w-full p-4 overflow-y-auto space-y-4">


    <div>
        <span class="text-3xl font-bold dark:text-neutral-100 flex flex-col">Heading new heading</span>
    </div>
    <div>
        <div class="inline-flex items-center justify-end w-full space-x-2">
            <div class="inline-flex items-center bg-white dark:bg-neutral-800  dark:border-neutral-700 rounded border border-neutral-300 py-0.5 px-3 space-x-1  hover:bg-neutral-100 dark:hover:bg-neutral-700">
            <Icons :icon-name="'download'" :icon-size="'md'" class="dark:text-neutral-200"  />
                <div class="dark:text-neutral-200 text-sm font-semibold leading-tight">Exportar</div>
            </div>

            <div class="inline-flex items-center dark:border-green-400 bg-skin-fill rounded border border-neutral-300 py-0.5 px-3 space-x-1 hover:bg-white/10">
            <Icons :icon-name="'add'" :icon-size="'md'" class="text-white"  />
                <div class="text-white text-sm font-semibold leading-tight">Nuevo</div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto relative shadow-md rounded-t-lg">
   
            <table class="w-full">
                <thead class="">
       
                    <tr class="w-full text-sm  text-left h-12 dark:text-neutral-200 bg-neutral-100 dark:bg-neutral-700 ">

                            <th class="p-2  border-b border-neutral-100 dark:border-neutral-700">Header</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">ipsum</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">fdfd</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">lofdfdrem</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">lofdfdrem</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">lofdfdrem</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">lofdrem</th>
                            <th class="p-2 border-b border-neutral-100 dark:border-neutral-700">dfdfd</th>
                        </tr>
             
                </thead>
                <tbody class="">
                    <tr class="text-sm text-left h-12 dark:text-neutral-200 border-t dark:border-neutral-700 dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <td> <span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                    </tr>
                    
                    <tr class="text-sm text-left h-12 dark:text-neutral-200 border-t dark:border-neutral-700 dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <td> <span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                    </tr>

                    <tr class="text-sm text-left h-12 dark:text-neutral-200 border-t dark:border-neutral-700 dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <td> <span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                    </tr>

                    <tr class="text-sm text-left h-12 dark:text-neutral-200 border-t dark:border-neutral-700 dark:bg-neutral-800 hover:bg-neutral-100 dark:hover:bg-neutral-600">
                        <td> <span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                        <td><span class="px-1">Lorem ipsum</span></td>
                    </tr>

                </tbody>
            </table>

   



    </div>




    <div>
        <div class="w-full flex items-center justify-center">
            <div class="bg-neutral-200 h-8 w-full"></div>

        </div>
    </div>






</div>

   
           



          </div>

        </div>
      </div>

    </template>
  </Background>

</template>

<script lang="ts">
import { ref } from 'vue';
import Background from '@/components/Background.vue';
import NavBar from '@/components/NavBar.vue';
import NavBarButton from '@/components/NavBarButton.vue';
import Sidebar from '@/components/Sidebar.vue';
import Dropdown from '@/components/Dropdown.vue';
import DropdownMenu from '@/components/DropdownMenu.vue';
import DropdownLink from '@/components/DropdownLink.vue';
import Button from '@/components/Button.vue';
import Icons from '@/components/Icons.vue';
import Header from '@/components/Header.vue';
export default {
  name:'Dashboard',
  components:{
    Background,
    NavBar,
    NavBarButton,
    Sidebar,
    Dropdown,
    DropdownMenu,
    DropdownLink,
    Button,Icons,Header
  },
  setup() {
    const showMenu = ref(false);
    const showUserMenu = ref(false);

    return { showMenu, showUserMenu}
  }
}
</script>