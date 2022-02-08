<template>
    <div class="container mt-4">
        <div class="col-md-8 col-lg-8 spr ">
            <div class="card">
                <form @submit.prevent="submitForm">
                    <div class="card-header">
                        <div class="form-group ">
                            <button v-on:click="password = true; avatar= false">Hasło</button>
                            <button v-on:click="avatar = true; password=false">Avatar</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div v-if="password" class="form-group mt-2">
                            <input type="password" name="old_pass" class="form-control mt-2" placeholder="Aktualne Hasło">
                            <input type="password" name="new_pass" class="form-control mt-2" placeholder="Nowe Hasło">
                            <input type="submit" class="mt-4" value="Zapisz">
                        </div>
                        <div v-if="avatar" class="form-group mt-2">
                            avatar
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            password: true,
            avatar: false,
        }
    },
}
</script>

<style scoped>

</style>
