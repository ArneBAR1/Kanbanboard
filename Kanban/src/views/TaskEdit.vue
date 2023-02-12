<script setup>
import { reactive } from 'vue';
import useTask from '@/composables/task.js';
import useBoards from '@/composables/boards.js';
import Swal from 'sweetalert2';
import { onMounted } from 'vue';

const { task, getTask, updateTask, destroyTask, errors } = useTask();
const { boards, getBoards } = useBoards();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => getBoards());
onMounted(() => getTask(props.id))

</script>

<template>
    <div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-light bg-opacity-50 rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="modal-title fs-2 fw-bold" id="exampleModalLabel">Edit Task</h1>
                    <RouterLink :to="{ name: 'home' }"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></RouterLink>
                </div>
                <div class="modal-body">
                    <div class="modal-body justify-content-center">
                        <form @submit.prevent="updateTask($route.params.id)">
                            <label class="form-label fs-5 mt-3">Change Titel</label>
                            <input type="text" v-model="task.Titel" class="form-control"
                                placeholder="Fx. Auto update program" />
                            <div v-if="errors.title">
                                <span class="fs-6 text-danger">{{ errors.title[0] }}</span>
                            </div>

                            <label class="form-label fs-5 mt-3"> Change Priority</label>
                            <input type="text" v-model="task.Priority" class="form-control" placeholder="Fx. 2,8,21" />
                            <div v-if="errors.Priority">
                                <span class="fs-6 text-danger">{{ errors.Priority[0] }}</span>
                            </div>

                            <label class="form-label fs-5 mt-3"> Change Type</label>
                            <select class="form-select" v-model="task.Type" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Dev">Dev</option>
                                <option value="Build">Build</option>
                                <option value="Bug">Bug</option>
                                <option value="Error">Error</option>
                            </select>

                            <label class="form-label fs-5 mt-3"> Change Category</label>
                            <select class="form-select" v-model="task.Column_id" aria-label="Default select example">
                                <option v-for="board in boards" :key="board.id" :value="board.id">
                                    {{ board.Name }}
                                </option>
                            </select>

                            <div class="d-flex justify-content-start mt-4 gap-4">
                                <button class="btn btn-primary" type="submit" value="submit"
                                    @click="showAlert('Updated')">Updated
                                    task</button>
                                <button class="btn btn-danger"
                                    @click="showAlert('Deleted'), destroyTask(task.id)">Delete
                                    category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    methods: {
        showAlert(handling) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your Task has been ' + handling,
                showConfirmButton: false,
                timer: 2500
            })
        },
    },
};
</script>