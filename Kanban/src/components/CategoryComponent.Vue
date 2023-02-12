<script setup>
import useBoards from '@/composables/boards.js';
import { onMounted  } from 'vue';

const {boards, getBoards} = useBoards();

onMounted(() => getBoards());
</script>

<template>
    <div class="col-md bg-light m-1 radiusBox">
        <div class="border border-3 rounded shadow mt-1">
            <div class="mx-2 bg-dark mt-1 rounded" style="height: 5px;"></div>
            <h3 class="text-center" style="font-weight: bold;">{{ board.Name }}</h3>
        </div>
        <a href="#" type="button" class="d-flex"><i class="bi bi-plus-lg fs-3 text-dark"></i></a>
        <slot name="tasks"></slot>
    </div>
</template>