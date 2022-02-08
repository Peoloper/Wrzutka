<template>
    <span>
        <a href="#" v-if="isLikes" @click.prevent="unLike(mem)">
            <i  class="fa fa-heart"></i>
            ({{this.counter}})
        </a>
        <a href="#" v-else @click.prevent="like(mem)">
            <i class="far fa-heart"></i>
             ({{this.counter}})
        </a>
    </span>

</template>

<script>
export default {
    props: ['mem', 'likes'],
    data: function() {
        return {
            isLikes: '',
            counter: ''
        }
    },

    mounted() {
        this.isLikes = !!this.isLike;
        this.getLikes(this.mem)
    },

    computed: {
        isLike() {
            return this.likes;
        },
    },

    methods: {
        like(mem) {
            axios.post('/like/'+mem)
                .then(response => {
                    this.getLikes(mem)
                    this.isLikes = true
                })
                .catch(response => console.log(response.data));
        },

        unLike(mem) {
            axios.post('/unlike/'+mem)
                .then(response => {
                    this.getLikes(mem)
                    this.isLikes = false
                })
                .catch(response => console.log(response.data));
        },
        getLikes(mem)
        {
            axios.get('/getlikes/'+mem)
                .then(response => this.counter = response.data)
                .catch(response => console.log(response.data));
        },
    }
}
</script>

