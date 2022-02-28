<template>
    <div class="container mt-4">
        <div class="col-md-11 col-lg-9 marginAuto">
            <div v-if="user_id > 0" class="mt-4">
                <textarea name="comment" v-model="formData.comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..."></textarea>
                <button class="btn btn-success" style="float:right;" @click="addComment">Submit Comment</button>
            </div>
            <div class="mt-4 border p-2 wrapText" style="display:block;" v-for="(comment, index) in comments" :key="index">
                <div class="justify-content-between">
                    <div>
                        <figure class="author-figure float-left">

                            <img :src="comment.user.photos ? comment.user.photos.path : photo" alt="Image" class="avatar img-fluid">

                            {{comment.user.name}}
                        </figure>
                        <p>{{comment.created_at}}</p>
                        <p>
                            {{comment.comment}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['memid', 'photo', 'user_id'],
    data() {
        return {
            comments: {},
            formData: {
                comment: '',
                mem_id: this.memid,
            },
        }
    },
    mounted() {
        this.getComments()
    },
    methods: {
        addComment() {
            axios.post('store', this.formData).then((response) => {
                this.formData.comment = ''
                this.getComments()
            }).catch((errors) => {
                //console.log(errors)
            });
        },
        getComments() {
            axios.get('getComments/' + this.memid).then((response) => {
                this.comments = response.data
            }).catch((errors) => {
               // console.log(errors)
            });
        }
    }
}
</script>
<style>
.marginBott
{
    margin-bottom: 10px;
}
</style>
