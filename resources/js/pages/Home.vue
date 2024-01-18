<template>
  <Background>
    <template #content>
      <div class="h-screen overflow-hidden">
        <div class="flex flex-col h-full">
          <div class="flex  w-full h-12">
            <NavBar>
              <template #left>
                <NavBarButton @click="showMenu = !showMenu" :icon-name="'menu'"/>
                <Image :image-size="'xs'"/>
              </template>

              <template #right>
                <NavBarButton @click="showUserMenu = !showUserMenu" :icon-name="'person'" :icon-fill="true"/>
              </template>
            </NavBar>
          </div>

          <div class="flex w-full h-full bg-neutral-100 dark:bg-neutral-900 overflow-hidden">
            <div v-show="showUserMenu" class="absolute top-15 right-0 z-10">
              <Dropdown >
                <template #content>
                  <DropdownLink @click="logout()" :label="'Cerrar Sesión'" />
                </template>
              </Dropdown>
            </div>

            <div class="relative z-50">
              <div v-show="showMenu"  class="absolute h-full overflow-y-auto">
               
                <Dropdown :width="'lg'" >
                  <template #content >
                    <DropdownMenu v-for="menu in userMenu"  :label="menu.title" :icon-name="menu.icon">
                      <template #content>
                        <div v-for="(index, value) in menu.links" :key="index" class="flex items-center justify-start w-full">
                          <DropdownLink @click="showMenu = false" :label="value" :route-name="index" class="indent-9 px-0.5"/>
                        </div>
                      </template>
                    </DropdownMenu>
                  </template>
                </Dropdown>
             
              </div>
            </div>

            <div class="w-full h-full overflow-y-auto">
            <router-view />
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
import Image from '@/components/Image.vue';
import Dropdown from '@/components/Dropdown.vue';
import DropdownMenu from '@/components/DropdownMenu.vue';
import DropdownLink from '@/components/DropdownLink.vue';

import logout from '@/functions/logout';
export default {
  name:'Home',
  components:{
    Background,
    NavBar,
    NavBarButton,
    Image,
    Dropdown,
    DropdownMenu,
    DropdownLink
  },
  setup() {
    const showMenu = ref(false);
    const showUserMenu = ref(false);

    const userMenu = {
      'Catalog': {
        'title': 'Organizaciones',
        'icon': 'domain',
        'links': {
          'Organizaciones': 'companies',
          'Sucursales': 'branches',
          'Departamentos': 'departments'
        }
      },
      'new': {
        'title': 'New',
        'icon': 'people',
        'links': {
          'Organizaciones': 'companies',
          'Sucursales': 'branches',
          'Departamentos': 'departments'
        }
      },

    }

    return { showMenu, showUserMenu, userMenu, logout}
  }
}
</script>