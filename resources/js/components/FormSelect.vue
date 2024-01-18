<template>
  <div>
    <label :for="id" class="w-full inline-flex items-center dark:text-neutral-200">{{ label }}</label>
    <select :name="id" :id="id"  :value="modelValue" @change="$emit('update:modelValue', ($event.target as HTMLInputElement).value)">
      <option v-for="(option, index) in data" :value="index">
        {{ option }}
      </option>
    </select>
    <div class="h-3">
        <div v-show="errorMessage">
          <p v-for="error in errorMessage" class="text-xs font-semibold text-red-500">
            {{ error }}
          </p>
        </div>
    </div>
  </div>
</template>
<script lang="ts">
import {ref, onMounted, watch} from 'vue';
import getIdAndNameFromResource from '@/functions/getIdAndNameFromResource';
export default {
  name:'FormSelect',
  props: {
    id: {
      type: String,
      default: 'id'
    },
    label: {
      type: String,
      default: 'Label'
    },
    resource: {
      type: String,
      default: 'companies'
    },
    isrequired: {
      type: Boolean,
      default:false
    },
    errorMessage: {
      type: Array,
      default:[]
    },
    modelValue: {
      type: String,
      default: ''
    },
  },
  setup(props){
    const data= ref({})

    onMounted(async () => {
        data.value = await getIdAndNameFromResource(props.resource);
    }
    )

    watch(() => props.id, async (after, before) => {

        data.value = await getIdAndNameFromResource(props.resource);
      }
    );

    return {data}
  }
}
</script>