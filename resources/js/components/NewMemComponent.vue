<template>
    <div class="container mt-4">
        <div class="col-md-11 col-lg-9 spr ">
            <div class="card">
                <form @submit.prevent="uploadImage">
                <div class="card-header">
                    <div class="form-group" id="app" @click="livePaper = true">
                        <input type="text" name="title" class="form-control" placeholder="Wpisz tytuł" v-model="title">
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
                        <input type="file" v-on:change="onImageChange" class="form-control">
                    </div>
                    <label class="mt-3"> Tagi:</label>
                    <div class=" d-flex flex-wrap">
                        <p class="me-2">Sugerowane:</p>
                        <div v-for="(item, tags) in tags" :key="item" :index="tags">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <label class="title" @click="() => onSelect(item)">{{item.name }}</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class=" d-flex flex-wrap">
                        <p class="me-2">Wybrane:</p>
                        <div v-for="(memTag, memTags) in memTags" :key="memTag.id" :index="memTags">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <span class="title" @click="() => onSelectTwo(memTag)">{{memTag.name }}</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label> Wybierz kategorie:</label>
                    <div class=" d-flex flex-wrap">
                        <div v-for="(item, category) in categories" :key="item.id">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <span  @click="current = category; selectCategory(item.id)" :class="{current:category == current}">{{item.name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-success btn-block" @click="uploadImage;">Upload Image</button>
                        <button type="button" @click="livePaper = false; image =''; current = '-1';"> Anuluj </button>
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
            memTags: [],
            image: '',
            current:-1,
            livePaper: false,
            memIdTag: []
        }
    },
    methods: {
        getTags(e){
            alert('elo')
        },
        onImageChange(e) {
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.onloadend=(file) =>{
                this.image = reader.result
            }

            reader.readAsDataURL(file)
        },
        onSelect(item) {
            this.tags.splice(this.tags.indexOf(item), 1)
            this.memTags.push(item)
            this.memIdTag.push(item.id)

        },
        onSelectTwo(item) {
            this.memTags.splice(this.memTags.indexOf(item), 1)
            this.memIdTag.splice(this.memIdTag.indexOf(item), 1)
            this.tags.push(item)
        },
        selectCategory(item)
        {
            this.category_id = item
        },
        uploadImage(){
            axios.post('/mem',{content:this.content,
                title: this.title,image: this.image,
                tags:this.memIdTag, formFields:this.formFields,
                category_id:this.category_id})
                .then(response => {
                if (response.data.success) {
                    this.livePaper = false;
                }
            });
        },
    }
}
</script>

<style>
.current{
    background:rgb(56,184,131);
}
</style>
