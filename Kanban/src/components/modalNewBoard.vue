<script setup>
import { reactive } from 'vue';
import useBoards from '@/composables/boards.js';
import Swal from 'sweetalert2';

const { storeBoard, errors } = useBoards();

const form = reactive({
    Name: "",
    Color: ""
})

</script>

<template>
    <div class="modal fade" id="NewBoard" tabindex="-1" aria-labelledby="newBoard" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">New Board</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body justify-content-center">
                        <form @submit.prevent="storeBoard(form),reloadPage">
                            <label for="Name" value="Name" class="form-label fw-bold">Category name</label>
                            <input id="Name" v-model="form.Name" type="text" placeholder="Write titel for the category"
                                class="form-control mb-3" />
                            <div v-if="errors.name"></div>
                            <label for="Color" value="Color" class="form-label fw-bold">Color</label>
                            <input id="Color" v-model="form.Color" type="color" class="form-control form-control-color mb-4" title="Choose your color">
                            <div class="">
                                <button class="btn btn-primary" type="submit" value="submit" @click="showAlert">Create
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
                title: 'Your new Category has been Added',
                showConfirmButton: false,
                timer: 2500
            }).then((result) => {
                location.reload();
            });
        },
    },
};
</script>