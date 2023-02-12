<script setup>
import { reactive, ref } from 'vue';
import useBoards from '@/composables/boards.js';
import Swal from 'sweetalert2';
import { onMounted } from 'vue';

const { board, getBoard, updateBoard, destroyBoard, errors } = useBoards();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const canDelete = ref(false)

onMounted(() => getBoard(props.id))

</script>

<template>
    <div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-light bg-opacity-50 rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="modal-title fs-2 fw-bold" id="exampleModalLabel">Edit Category</h1>
                    <RouterLink :to="{ name: 'home' }"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></RouterLink>
                </div>
                <div class="modal-body">
                    <div class="modal-body justify-content-center">
                        <form @submit.prevent="updateBoard($route.params.id)">
                            <label for="Name" value="Name" class="form-label fw-bold">Change category name</label>
                            <input id="Name" v-model="board.Name" type="text" class="form-control mb-3" />
                            <div v-if="errors.Name">
                                <span class="fs-6 text-danger">{{ errors.Name[0] }}</span>
                            </div>
                            <label for="Color" value="Color" class="form-label fw-bold">Color</label>
                            <input id="Color" v-model="board.Color" type="color"
                                class="form-control form-control-color mb-4" title="Choose your color" />
                            <div class="d-flex justify-content-start gap-4">
                                <button class="btn btn-primary" type="submit" value="submit"
                                    @click="showAlert('Updated')">Update
                                    category</button>
                                <button v-if="canDelete" class="btn btn-danger"
                                    @click="showAlert('Deleted'), destroyBoard(board.id)">Delete
                                    category</button>
                            </div>
                            <div class="d-flex mt-4 justify-content-start">
                                <p class="fs-6 me-4">Click here -></p>
                                <button @click.prevent="canDelete = !canDelete" class="btn btn-light">{{
                                    canDelete?'Cancel':
                                        'Accept'
                                }}
                                </button>
                                <div v-if="errors.destroyBoard">
                                    <span class="fs-6 text-danger">{{ errors.destroyBoard[0] }}</span>
                                </div>
                            </div>
                            <p class="fs-6">if all the tasks on this category are deleted</p>
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
                title: 'Your Category has been ' + handling,
                showConfirmButton: false,
                timer: 2500
            })
        },
    },
};
</script>