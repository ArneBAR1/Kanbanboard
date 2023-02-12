import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://127.0.0.1:8000/api/V1/";

export default function useTasks() {

    const tasks = ref([]);
    const task = ref([]);
    const errors = ref({});
    const router = useRouter();

    const getTasks = async () => {
        const response = await axios.get("task");
        tasks.value = response.data.data;
    }

    const getTask = async (id) => {
        const response = await axios.get("task/" + id);
        task.value = response.data.data
    }

    const storeTask = async (data) => {
        try {
            await axios.post("task", data)
            await router.push({ name: "home" });
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateTask = async (id) => {
        try {
            await axios.put("task/" + id, task.value);
            await router.push({ name: "home" })
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyTask = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete("task/" + id);
        await router.push({ name: "home" })
        await getBoards();
    }


    return {
        task,
        tasks,
        getTask,
        getTasks,
        storeTask,
        updateTask,
        destroyTask,
        errors,
    }
}