<script setup>
import { reactive } from 'vue';
import useTasks from '@/composables/boards.js';
import Swal from 'sweetalert2';
import { onMounted } from 'vue';

const { board, getBoard, updateBoard, destroyBoard, errors } = useTasks();

const props = defineProps({
    board: Object,
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getBoard(props.id))

</script>

<template>
    <div class="modal fade" id="EditBoard" tabindex="1" aria-labelledby="newBoard">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body justify-content-center">
                        <form @submit.prevent="updateBoard($route.params.id)">
                            <label for="Name" value="Name" class="form-label fw-bold">Change category name</label>
                            <input id="Name" v-model="board.Name" type="text" class="form-control mb-3" />
                            <div v-if="errors.name"></div>
                            <label for="Color" value="Color" class="form-label fw-bold">Change color</label>
                            <input id="Color" v-model="board.Color" type="text" class="form-control mb-3" />
                            <div class="d-flex justify-content-start me-3">
                                <button class="btn btn-primary" type="submit" value="submit" @click="showAlert">Update
                                    category</button>
                                <button class="btn btn-danger" @click="destroyBoard(board.id)">Delete
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
        showAlert() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your category has been updated',
                showConfirmButton: false,
                timer: 2500
            })
        },
    },
};
</script>