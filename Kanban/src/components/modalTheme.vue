<script setup>
import { ref } from 'vue';
import $ from 'jquery'
</script>

<template>
    <div class="modal fade" id="Theme" tabindex="-1" aria-labelledby="themeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Themes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="Default" class=" bi bi-check-lg text-light fs-3 rounded-circle m-2 text-center themecolors" @click="changeColor('linear-gradient(28deg, rgba(218,68,83,1) 0%, rgba(137,33,107,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(218,68,83,1) 0%, rgba(137,33,107,1) 100%);"></div>
                    <div id="Purple" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(173, 83, 137,1) 0%, rgba(60, 16, 83,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(173, 83, 137,1) 0%, rgba(60, 16, 83,1) 100%);">
                    </div>
                    <div id="darkPurple" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(66, 39, 90,1) 0%, rgba(115, 75, 109,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(66, 39, 90,1) 0%, rgba(115, 75, 109,1) 100%);">
                    </div>
                    <div id="Sand" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(44, 62, 80,1) 0%, rgba(253, 116, 108,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(44, 62, 80,1) 0%, rgba(253, 116, 108,1) 100%);">
                    </div>
                    <div id="defaultCopy" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(100, 43, 115,1) 0%, rgba(198, 66, 110,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(100, 43, 115,1) 0%, rgba(198, 66, 110,1) 100%);">
                    </div>
                    <div id="sandDune" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(255, 161, 127,1) 0%, rgba(0, 34, 62,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(255, 161, 127,1) 0%, rgba(0, 34, 62,1) 100%);">
                    </div>
                    <div id="Dawn" class=" rounded-circle m-2 themecolors" @click="changeColor('linear-gradient(28deg, rgba(64, 58, 62,1) 0%, rgba(190, 88, 105,1) 100%)')"
                        style="background: linear-gradient(28deg, rgba(64, 58, 62,1) 0%, rgba(190, 88, 105,1) 100%);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
function changeColor(msg){
    document.body.style.background = msg;
}
</script>