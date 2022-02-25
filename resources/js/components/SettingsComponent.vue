<template>
    <div class="container mt-4">
        <div class="col-md-8 col-lg-8 marginAuto ">
            <div class="card">
                <div class="card-header">
                    <div class="form-group ">
                        <button v-on:click="password = true; avatar= false">Hasło</button>
                        <button v-on:click="avatar = true; password=false">Avatar</button>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="updatePassword">
                        <div v-if="password" class="form-group mt-2">
                            <input type="password" name="password" class="form-control mt-2" v-model="formData.password"
                                   placeholder="Podaj Hasło" :class="hasError('password') ? 'is-invalid' : ''">
                            <div v-if="hasError('password')" class="invalid-feedback">
                                {{getError('password')}}
                            </div>
                            <input type="password" name="password_confirmation" class="form-control mt-2" v-model="formData.password_confirmation"
                                   placeholder="Powtórz Hasło" :class="hasError('password_confirmation') ? 'is-invalid' : ''">
                            <div v-if="hasError('password_confirmation')" class="invalid-feedback">
                                {{getError('password_confirmation')}}
                            </div>
                            <div class="form-group mt-5">
                                <button class="btn btn-success btn-block" @click="updatePassword;">Zmień Hasło</button>
                            </div>
                        </div>
                    </form>

                    <form @submit.prevent="updateAvatar">
                        <div v-if="avatar" class="form-group mt-2">
                            <div class="mb-3">
                                <my-upload field="img"
                                           @crop-success="cropSuccess"
                                           @crop-upload-success="cropUploadSuccess"
                                           @crop-upload-fail="cropUploadFail"
                                           v-model="show"
                                           :width="100"
                                           :height="80"
                                           lang-type="en"
                                           url="/setting/avatar"
                                           :params="params"
                                           :headers="headers"
                                           img-format="png"
                                         ></my-upload>
                                <img
                                    :width="100"
                                    :height="80"
                                    :src="imgDataUrl">
                            </div>
                            <button  class="btn" @click="toggleShow">Zmień avatar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import myUpload from "vue-image-crop-upload";


export default {
    props: ['path'],
    components: {
        myUpload
    },
    data: function() {
        return {
            formData: {
                password: '',
                password_confirmation: '',
            },
            password: true,
            avatar: false,
            errors: [],

            show: true,
            params: {
                name: '',
            },
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            imgDataUrl: this.path
        }
    },
    methods: {
        updatePassword() {
            axios.post('setting/password', this.formData)
                .then(response => {
                    this.$toast.success(`Hasło zostało zmienione!`);
                    this.formData = '';
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    // console.log(error.response.data.errors)
                })
        },
        hasError(fieldName) {
            return (fieldName in this.errors);
        },
        getError(fieldName) {
            return this.errors[fieldName][0];
        },

        toggleShow() {
            this.show = !this.show;
        },

        cropSuccess(imgDataUrl, field){
            // console.log('-------- crop success --------');
            this.imgDataUrl = imgDataUrl;
        },

        cropUploadSuccess(jsonData, field){
          // console.log('-------- upload success --------');
           // console.log(jsonData);
           // console.log('field: ' + field);
        },

        cropUploadFail(status, field){
            this.imgDataUrl = this.path
            // console.log('-------- upload fail --------');
            // console.log(status);
            // console.log('field: ' + field);
        }
    },
}
</script>

<style scoped>

</style>
