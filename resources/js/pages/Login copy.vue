<template>
  <Background>
    <template #content>
      <div class=" w-full h-screen bg-neutral-200 dark:bg-neutral-900 py-8">
      <div class="max-w-md mx-auto">
        <div class="flex flex-col bg-white p-6 dark:bg-white/10 space-y-4 rounded-t-md">
          <Image :image-size="'lg'" />

            <FormInput :id="'user'" :label="'Usuario'" v-model="form.user" />
            <FormInput :id="'password'" :label="'Password'" :type="'password'" v-model="form.password"  />

       


        </div>

        <div class="flex flex-col bg-neutral-100 dark:bg-neutral-800  p-6 rounded-b-md">
          <div class="inline-flex items-center justify-end">
            <FormButton :default-button="false" :label="'Iniciar Sesión'" />
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
import Image from '@/components/Image.vue';
import FormInput from '@/components/FormInput.vue';
import FormButton from '@/components/FormButton.vue';

export default {
  name:'Login',
  components :{
    Background,
    Image,
    FormInput,
    FormButton
  },
  setup() {
    type resource = {
    user?: string;
    password?: string;
    }

    const form = ref<resource>({});

    return { form }
  }

}
</script>