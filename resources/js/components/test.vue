<template>
    <div class="center-container">
        <div class="col-md-10 col-lg-8 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="form-group" id="app" @click="livePaper = true">
                        <input type="text" name="title" class="form-control" placeholder="Wpisz tytuł">
                    </div>
                </div>
                <div class="card-body" v-if="livePaper" id="hide">
                    <div class="form-group mt-2">
                        <textarea type="text" name="content" class="form-control" placeholder="Tekst (opcjonalnie)"></textarea>
                    </div>
                    <div style="width: 500px; height:100%; display: inline-block;" class="img-fluid form-group mt-2"  v-if="image">
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
                        <div v-for="(memTag, memTags) in memTags" :key="memTag" :index="memTags">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <span class="title" @click="() => onSelectTwo(memTag)">{{memTag.name }}</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label> Wybierz kategorie:</label>
                    <div class=" d-flex flex-wrap">
                        <div v-for="(item, categories) in categories" :key="item">
                            <div class="custom-control custom-checkbox" style="margin-right: 10px">
                                <span  @click="current = categories" :class="{current:categories == current}">{{item.name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-success btn-block" @click="uploadImage">Upload Image</button>
                        <button type="button" @click="livePaper = false;  current = '-1';"> Anuluj </button>
                    </div>
                </div>
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
            image: '',
            memTags: [],
            current:-1,
            livePaper: false,
        }
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        uploadImage(){
            axios.post('/mem',{image: this.image}).then(response => {
                if (response.data.success) {
                    alert(response.data.success);
                }
            });
        },
        onSelect(item) {
            this.tags.splice(this.tags.indexOf(item), 1)
            this.memTags.push(item)
        },
        onSelectTwo(item) {
            this.memTags.splice(this.memTags.indexOf(item), 1)
            this.tags.push(item)
        },
    }
}
</script>
