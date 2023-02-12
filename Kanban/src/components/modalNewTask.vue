<script setup>
import { reactive } from 'vue';
import useTasks from '@/composables/task.js';
import useBoards from '@/composables/boards.js';
import { onMounted, ref } from 'vue';
import Swal from 'sweetalert2';
import $ from 'jquery';

const { storeTask, errors } = useTasks();

function checkboardID() {
    var nameValue = document.getElementById("Column_id").value;
    form.Column_id = nameValue;
    console.log("Den virker!");
}

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const form = reactive({
    Titel: "",
    Priority: "",
    Type: "",
    Column_id: props.id,
});

</script>

<template>
    <div class="modal fade" id="NewTask" tabindex="-1" aria-labelledby="newTask" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Create a New Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body justify-content-center">
                    <form @submit.prevent="storeTask(form)">
                        <label for="Titel" value="Titel" class="form-label fw-bold">Titel</label>
                        <input id="Titel" v-model="form.Titel" type="text" placeholder="Write titel for the task"
                            class="form-control mb-3" />
                        <div v-if="errors.Titel">
                            <span class="fs-6 text-danger">{{ errors.Titel[0] }}</span>
                        </div>
                        <label for="Priority" value="Priority" class="form-label fw-bold">Priority</label>
                        <input id="Priority" v-model="form.Priority" type="text" placeholder="Insert number of priority"
                            class="form-control mb-3" />
                        <div v-if="errors.Priority">
                            <span class="fs-6 text-danger">{{ errors.Priority[0] }}</span>
                        </div>
                        <label for="Type" value="Type" class="form-inpyt fw-bold">Type</label>
                        <input id="Type" v-model="form.Type" type="text" placeholder="Is it in dev, build, etc?"
                            class="form-control mb-3" />
                        <div v-if="errors.Type">
                            <span class="fs-6 text-danger">{{ errors.Type[0] }}</span>
                        </div>
                        <input id="Column_id" v-model="form.Column_id" type="hidden" class="form-control mb-5" />
                        <div v-if="errors.Column_id">
                            <span class="fs-6 text-danger">{{ errors.Column_id[0] }}</span>
                        </div>
                        <div class="">
                            <button class="btn btn-primary" type="submit" @click="showAlert">{{id}}Create task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    methods: {
        showAlert() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your new task has been added',
                showConfirmButton: false,
                timer: 2500
            })
        }
    },
};
</script>