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
                                avatar
                                <div class="form-group mt-5">
                                    <button class="btn btn-success btn-block" @click="updateAvatar;">zmień avatar</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            formData: {
                password: '',
                password_confirmation: '',
            },
            password: true,
            avatar: false,
            errors: [],
        }
    },
    methods: {
        updatePassword() {
            axios.post('setting/password', this.formData)
                .then(response => {
                    this.$toast.success(`Hasło zostało zmienione!`);
                    this.formData = '';
                })
                .catch((error) =>
                {
                    this.errors = error.response.data.errors;
                   // console.log(error.response.data.errors)
                })
        },
        updateAvatar() {
            axios.post('setting/avatar')
                .then(response => {
                    console.log('avatar');
                })
                .catch(response => {
                    //console.log(response.data)
                });
        },
        hasError(fieldName){
            return (fieldName in this.errors);
        },
        getError(fieldName){
            return this.errors[fieldName][0];
        },
    }

    }
</script>

<style scoped>

</style>
