<script setup>
import { reactive } from 'vue';
import useTasks from '@/composables/task.js';
import { useRoute } from 'vue-router'
import useBoards from '@/composables/boards.js';
import { onMounted } from 'vue';
import $ from 'jquery';

const { storeTask, errors } = useTasks();
const { board, getBoard } = useBoards();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})
onMounted(() => getBoard(props.id))

const route = useRoute();
const id = route.params.id; // read parameter id (it is reactive) 

const form = reactive({
    Titel: "",
    Priority: "",
    Type: "",
    Column_id: props.id,
    ColorTask: "",
});

</script>

<template>
    <div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-light bg-opacity-25 rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                    <h1 class="fw-bold mb-0 fs-2">Create Task | On category {{ board.Name }}</h1>
                    <RouterLink :to="{ name: 'home' }"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></RouterLink>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" @submit.prevent="storeTask(form)">
                        <label for="exampleColorInput" class="form-label fs-5">Color picker</label>
                        <input id="ColorTask" v-model="form.ColorTask" type="color"
                            class="form-control form-control-color" title="Choose your color" />

                        <input type="hidden" v-model="form.Column_id" />

                        <label class="form-label fs-5 mt-3">Titel</label>
                        <input type="text" v-model="form.Titel" class="form-control"
                            placeholder="Fx. Auto update program" />
                        <div v-if="errors.title">
                            <span class="fs-6 text-danger">{{ errors.title[0] }}</span>
                        </div>

                        <label class="form-label fs-5 mt-3">Priority</label>
                        <input type="text" v-model="form.Priority" class="form-control" placeholder="Fx. 2,8,21" />
                        <div v-if="errors.Priority">
                            <span class="fs-6 text-danger">{{ errors.Priority[0] }}</span>
                        </div>

                        <label class="form-label fs-5 mt-3">Type</label>
                        <select class="form-select" v-model="form.Type" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="Dev">Dev</option>
                            <option value="Build">Build</option>
                            <option value="Bug">Bug</option>
                            <option value="Error">Error</option>
                        </select>

                        <button class="btn btn-primary mt-3" type="submit">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
