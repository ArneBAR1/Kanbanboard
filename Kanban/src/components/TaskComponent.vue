<script setup>
import useTasks from '@/composables/task.js'
import { onMounted, ref } from 'vue';

const { tasks, getTasks } = useTasks();
onMounted(() => getTasks());
</script>

<template>
    <dl class="mx-auto overflow-scroll" style="height: 500px;">
        <dt v-for="task in tasks" :key="task.id">
            <div v-if="task.ColumnID == board.id" class=" bg-light rounded-1 bangerShadow">
                <p class="ms-2 m-1 fs-6 fw-bold">{{ task.Titel }}</p>
                <div class="ms-2 bg-danger rounded" style="height: 5px; width: 38px;"></div>
                <div class="d-flex">
                    <img src="Cat.jpg" class="rounded ms-2 mt-1" height="76" width="76" alt="username-pfp">
                    <p class="ms-2 fs-6 fw-bold" style="align-self: center">Username</p>

                </div>
                <p class="ms-2 m-1 fs-6 fw-bold">Priority: {{ task.Priority }}</p>
                <p class="ms-2 m-1 fs-6 fw-bold">Type: {{ task.Type }}</p>
                <a class="fs-6 d-flex justify-content-end me-2"
                    style="text-decoration: none; color: #444444; opacity: 0.30;"><i class="bi bi-stopwatch"></i> 15
                    Feb</a>
            </div>
        </dt>
    </dl>
</template>