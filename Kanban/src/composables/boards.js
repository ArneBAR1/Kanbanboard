import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://127.0.0.1:8000/api/V1/";

export default function useBoards() {

    const boards = ref([]);
    const board = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getBoards = async () => {
        const response = await axios.get("board");
        boards.value = response.data.data;
    }

    const getBoard = async (id) => {
        const response = await axios.get("board/" + id);
        board.value = response.data.data
    }

    const storeBoard = async (data) => {
        try {
            await axios.post("board", data)
            await router.push.go({ name: 'home' });
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateBoard = async (id) => {
        try {
            await axios.put("board/" + id, board.value);
            await router.push({ name: 'home' })
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyBoard = async (id) => {
        try{ 
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await axios.delete("board/" + id);
            await router.push({name: 'home'})
            await getBoards();
        } catch (error) {
            errors.value = error.response.data.errors;
        }
    }


    return {
        board,
        boards,
        getBoard,
        getBoards,
        storeBoard,
        updateBoard,
        destroyBoard,
        errors,
    }
}