<template>
    <div class="container mt-4">
        <div class="col-md-11 col-lg-9 marginAuto ">
            <div class="card">
                <form @submit.prevent="addMem">
                <div class="card-header">
                    <div class="form-group" id="app" @click="livePaper = true">
                        <input type="text" name="title" class="form-control"
                               :class="hasError('title') ? 'is-invalid' : ''" placeholder="Wpisz tytuł" v-model="title">
                        <div v-if="hasError('title')" class="invalid-feedback">
                            {{getError('title')}}
                        </div>
                    </div>
                </div>

                <div class="card-body" v-if="livePaper" id="hide">
                    <div class="form-group mt-2">
                        <textarea type="text" name="content" class="form-control" placeholder="Tekst (opcjonalnie)" v-model="content"></textarea>
                    </div>
                    <div class=" img-fluid form-group mt-2"  v-if="image">
                        <img :src="image" class="img-fluid">
                    </div>
                    <div class="form-group mt-2">
                        <input type="file" v-on:change="onImageChange" :class="hasError('file') ? 'is-invalid' : ''" class="form-control">
                        <div v-if="hasError('file')" class="invalid-feedback">
                            {{getError('file')}}
                        </div>
                    </div>
                    <label class="mt-3"> Tagi:</label>
                    <div :class="hasError('tags') ? 'is-invalid' : ''" class="form-control mt-4" >
                        <div class=" d-flex flex-wrap">
                            <p class="me-2">Sugerowane:</p>
                            <div v-for="(item, tags) in tags" :key="item" :index="tags">
                                <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                    <label class="tags" @click="() => allTags(item)">{{item.name }}</label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class=" d-flex flex-wrap">
                            <p class="me-2">Wybrane:</p>
                            <div v-for="(memTag, memTags) in memTags" :key="memTag.id" :index="memTags">
                                <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                    <span class="tags" @click="() => selectedTags(memTag)">{{memTag.name }}</span>
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
                        <button class="btn btn-success m-2" @click="addMem">Dodaj mema</button>
                        <button class="btn btn-danger" @click="reset"> Anuluj </button>
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

            title:'',
            content:'',
            category_id:'',
            memTagId: [],

            image: '',
            file: "",
            memTags: [],
            current:-1,
            livePaper: false,
            errors: [],
        }
    },
    methods: {
        onImageChange(e) {
            this.file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend = (file) => {
                this.image = reader.result
            }
            reader.readAsDataURL(this.file)

        },
        allTags(item) {
            this.tags.splice(this.tags.indexOf(item), 1)
            this.memTags.push(item)
            this.memTagId.push(item.id)

        },
        selectedTags(item) {
            this.memTags.splice(this.memTags.indexOf(item), 1)
            this.memTagId.splice(this.memTagId.indexOf(item), 1)
            this.tags.push(item)
        },

        selectedCategory(item)
        {
            this.category_id = item
        },
        addMem(){
            let formDataImage = new FormData();

            formDataImage.append("title", this.title);
            formDataImage.append("content", this.content);
            formDataImage.append("category_id", this.category_id);
            formDataImage.append("file", this.file);

            for (var i = 0; i < this.memTagId.length; i++) {
                formDataImage.append("tags[]", this.memTagId[i]);
            }

            axios.post('/mem', formDataImage,)
                .then((response) => {
                    this.$toast.success(`Mem został dodany!`);
                    if(response.status === 200)
                    {
                       this.reset();
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
        reset()
        {
            this.livePaper = false;
            this.current = '-1';
            this.errors = [''];
            this.title = '';
            this.content = '';
            this.image = '';
        }
    }
}
</script>

<style>
.current{
    background:rgb(56,184,131);
}
</style>
