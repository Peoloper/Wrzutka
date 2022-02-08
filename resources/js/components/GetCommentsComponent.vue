<template>
    <div class="container mt-4">
        <div class="col-md-11 col-lg-9 spr">
            <div v-if="id > 0">
                <textarea name="comment" v-model="formData.comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..."></textarea>
                <button class="btn btn-success" style="float:right;" @click="commentStore">Submit Comment</button>
            </div>
            <div class="mt-4 " style="display:block;" v-for="(comment, index) in comments" :key="index">
                <div class="justify-content-between d-flex">
                    <div>
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
    props: ['memid', 'id'],
    data() {
        return {
            comments: {},
            formData: {
                comment: '',
                mem_id: this.memid,
                id: this.id
            },
        }
    },
    mounted() {
        this.getComments()
    },
    methods: {
        commentStore() {
            axios.post('comment/store', this.formData).then((response) => {
                console.log(response)
                this.formData.comment = ''
                this.getComments()
            }).catch((errors) => {
                console.log(errors)
            });
        },
        getComments() {
            axios.get('getComments/' + this.memid).then((response) => {
                this.comments = response.data
            }).catch((errors) => {
                console.log(errors)
            });
        }
    }
}
</script>
