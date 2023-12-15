<template>
  <div>
    <Background>
      <template #content>   
        <div  class="bg-neutral-100 dark:bg-neutral-800  w-full h-screen max-h-screen">
<div class="  max-h-min h-full overflow-hidden">
  <div class="inline-flex items-center">
    <div>Service Ma</div>
    <div></div>
    <div></div>
  </div>
  <div class="h-full  flex">
    <div class="w-64">aadssd</div>
    <div class="w-full bg-white dark:bg-neutral-900 rounded-tl-lg ">dsdsd</div>
  </div>
</div>
          <!--



            <div class="">
              sss
            </div>
            <div class="inline-flex  w-full h-full">
              <div class="text-sm w-64">
                <div class="flex flex-col">Service Manager</div>
                <div class="flex flex-col">
                  <div class="inline-flex items-center">
                    <div><Icon type="memory" size="1.5rem"/></div>
                    <div><span>Procesos</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="speed" size="1.5rem"/></div>
                    <div><span>Rendimiento</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="restore" size="1.5rem"/></div>
                    <div><span>Historial de Aplicaciones</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="apps" size="1.5rem"/></div>
                    <div><span>Aplicaciones de Aranque</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="person" size="1.5rem"/></div>
                    <div><span>Usuarios</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="list" size="1.5rem"/></div>
                    <div><span>Detalles</span></div>
                  </div>
  
                  <div class="inline-flex items-center">
                    <div><Icon type="folder" size="1.5rem"/></div>
                    <div><span>Servicios</span></div>
                  </div>
  
  
  
                </div>
              </div>
              <div class="bg-white w-full h-full rounded-tl-lg" >1</div>
            </div>
          -->
        </div>    
      </template>
    </Background>
  </div>
</template>

<script lang="ts">
import { Icon } from "vue3-google-icon"
import Background from './Background.vue';
export default {
  name:'Test',
  components:{
    Background, Icon
  }
}
</script>