<script setup>
import CategoryComponent from '@/components/CategoryComponent.vue';
import TaskComponent from '@/components/TaskComponent.vue';
import modalSettings from '@/components/modalSettings.vue';
import modalTheme from '@/components/modalTheme.vue';
import TopNav from '@/components/TopNav.vue';
import useBoards from '@/composables/boards.js';
import useTasks from '@/composables/task.js'
import { onMounted, ref, reactive } from 'vue';
import ModalNewTask from '../components/modalNewTask.vue';
import ModalNewBoard from '../components/modalNewBoard.vue';
import modalEditBoard from '../components/modalEditBoard.vue';
import $ from 'jquery';

// import { format, parseISO } from 'date-fns';

const { boards, getBoards, updateBoard } = useBoards();
const { tasks, getTasks, updateTask } = useTasks();

onMounted(() => getBoards());
onMounted(() => getTasks());

const props = defineProps({
  board: Object,
  id: {
    required: true,
    type: String
  }
})

const startDrag = (event, item) => {
  console.log(item);
  event.dataTransfer.dropEffect = 'move';
  event.dataTransfer.effectAllowed = 'move';

  //Info about the task
  event.dataTransfer.setData('taskID', item.id);
  event.dataTransfer.setData('taskType', item.Type);
  event.dataTransfer.setData('taskTitel', item.Titel);
  event.dataTransfer.setData('taskPrio', item.Priority);
}

const onDrop = (event, columnID) => {

  //Skal opdater tasken virker ikke !

  const itemID = event.dataTransfer.getData('taskID');
  const itemType = event.dataTransfer.getData('taskType');
  const itemTitel = event.dataTransfer.getData('taskTitel');
  const itemPrio = event.dataTransfer.getData('taskPrio');

  const form = reactive({
    id: itemID,
    Titel: itemTitel,
    Priority: itemPrio,
    Type: itemType,
    Column_id: columnID,
  });

  updateTask(form);
}

const canEdit = ref(false);



// function formatdate(date) {
//   return format(parseISO(date), 'd/MMM')
// }

</script>

<template>
  <TopNav />
  <div class="rounded-1 bg-light bg-opacity-25 m-25 p-5 container mx-auto my-auto overflow-auto">
    <div class="row" style="flex-wrap: nowrap;">
      <div v-for="board in boards" :key="boards.id" class="col-3 bg-light m-1 radiusBox w-25"
        @drop="onDrop($event, board.id)" @dragenter.prevent @dragover.prevent>
        <div class="border border-3 rounded shadow mt-1">
          <div class="mx-2 mt-1 rounded" :style="{ 'background-color': board.Color }" style="height: 5px;"></div>
          <h3 class="text-center" style="font-weight: bold;">{{ board.Name }}</h3>
          <!-- Edit board -->
          <RouterLink type="button" class="d-flex justify-content-end"
            :to="{ name: 'BoardEdit', params: { id: board.id } }"><i class="bi bi-pencil me-2"></i></RouterLink>
        </div>
        <!-- New task -->
        <RouterLink :to="{ name: 'TaskCreate', params: { id: board.id } }"><i class="bi bi-plus-lg fs-3 text-dark"></i>
        </RouterLink>

        <dl class="mx-auto overflow-scroll" style="height: 500px;">
          <dt v-for="task in tasks" :key="task.id">
            <div v-if="task.ColumnID == board.id" draggable="true" @dragstart="startDrag($event, task)"
              class=" bg-light rounded-1 bangerShadow">
              <p class="ms-2 m-1 fs-6 fw-bold">{{ task.Titel }}</p>
              <div class="ms-2 rounded" :style="{ 'background-color': task.ColorTask }" style="height: 5px; width: 38px;"></div>
              <div class="d-flex">
                <img src="Cat.jpg" class="rounded ms-2 mt-1" height="76" width="76" alt="username-pfp">
                <p class="ms-2 fs-6 fw-bold" style="align-self: center">John Doe</p>

              </div>
              <p class="ms-2 m-1 fs-6 fw-bold">Priority: {{ task.Priority }}</p>
              <p class="ms-2 m-1 fs-6 fw-bold">Type: {{ task.Type }}</p>
              <div class="d-flex justify-content-end">
                <!-- <a class="fs-6 me-5" style="text-decoration: none; color: #444444; opacity: 0.30;"><i
                    class="bi bi-stopwatch"></i>
                  15 feb</a> -->
                <RouterLink class="fs-6 me-2" :to="{ name: 'TaskEdit', params: { id: task.id } }"
                  style="text-decoration: none; color: #444444; opacity: 0.30;"><i class="bi bi-pencil me-2"></i>
                </RouterLink>
              </div>

            </div>
          </dt>
        </dl>
      </div>
    </div>
  </div>

  <modalTheme />
  <modalSettings />
  <ModalNewBoard />
</template>