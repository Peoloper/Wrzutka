<template>
    <div class="container mt-4">
        <div class="col-md-11 col-lg-9 marginAuto ">
            <div class="card">
                <form @submit.prevent="addMem">
                <div class="card-header">
                    <div class="form-group" id="app" @click="livePaper = true">
                        <input type="text" name="title" class="form-control"
                               :class="hasError('title') ? 'is-invalid' : ''" placeholder="Wpisz tytuł" v-model="formData.title">
                        <div v-if="hasError('title')" class="invalid-feedback">
                            {{getError('title')}}
                        </div>
                    </div>
                </div>

                <div class="card-body" v-if="livePaper" id="hide">
                    <div class="form-group mt-2">
                        <textarea type="text" name="content" class="form-control" placeholder="Tekst (opcjonalnie)" v-model="formData.content"></textarea>
                    </div>
                    <div class=" img-fluid form-group mt-2"  v-if="formData.image">
                        <img :src="formData.image" class="img-fluid">
                    </div>
                    <div class="form-group mt-2">
                        <input type="file" v-on:change="onImageChange" :class="hasError('image') ? 'is-invalid' : ''" class="form-control">
                        <div v-if="hasError('image')" class="invalid-feedback">
                            {{getError('image')}}
                        </div>
                    </div>
                    <label class="mt-3"> Tagi:</label>
                    <div :class="hasError('memTagId') ? 'is-invalid' : ''" class="form-control mt-4" >
                        <div class=" d-flex flex-wrap">
                            <p class="me-2">Sugerowane:</p>
                            <div v-for="(item, tags) in tags" :key="item" :index="tags">
                                <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                    <label class="title" @click="() => allTags(item)">{{item.name }}</label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class=" d-flex flex-wrap">
                            <p class="me-2">Wybrane:</p>
                            <div v-for="(memTag, memTags) in memTags" :key="memTag.id" :index="memTags">
                                <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                    <span class="title" @click="() => selectedTags(memTag)">{{memTag.name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label> Wybierz kategorie:</label>
                    <div  :class="hasError('category_id') ? 'is-invalid' : ''" class="form-control d-flex flex-wrap mt-4" >
                        <div v-for="(item, category) in categories" :key="item.id">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <span  @click="current = category; selectedCategory(item.id)" :class="{current:category == current}">{{item.name}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <button class="btn btn-success btn-block" @click="addMem;">Dodaj mema</button>
                        <button type="button" @click="cancel"> Anuluj </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['tags', 'categories'],
    el:'#hide',
    data(){
        return {
            formData: {
                title:'',
                content:'',
                category_id:'',
                memTagId: [],
                image: '',
            },
            memTags: [],
            current:-1,
            livePaper: false,
            errors: [],
        }
    },
    methods: {
        onImageChange(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend=(file) =>{
                this.formData.image = reader.result
            }

            reader.readAsDataURL(file)
        },
        allTags(item) {
            this.tags.splice(this.tags.indexOf(item), 1)
            this.memTags.push(item)
            this.formData.memTagId.push(item.id)

        },
        selectedTags(item) {
            this.memTags.splice(this.memTags.indexOf(item), 1)
            this.formData.memTagId.splice(this.formData.memTagId.indexOf(item), 1)
            this.tags.push(item)
        },

        selectedCategory(item)
        {
            this.formData.category_id = item
        },
        addMem(){
            axios.post('/mem', this.formData)
                .then((response) => {
                    this.$toast.success(`Mem został dodany!`);
                    if(response.status === 200)
                    {
                       this.cancel();
                    }
                })
                .catch((error) =>
                {
                    this.errors = error.response.data.errors;
                })
        },
        hasError(fieldName){
            return (fieldName in this.errors);
        },
        getError(fieldName){
            return this.errors[fieldName][0];
        },
        cancel()
        {
            this.livePaper = false;
            this.current = '-1';
            this.errors = [''];
            this.formData.title = '';
            this.formData.content = '';
            this.formData.image = '';
        }
    }
}
</script>

<style>
.current{
    background:rgb(56,184,131);
}
</style>
