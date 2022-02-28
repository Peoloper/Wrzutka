<template>
    <span>
        <a href="#" v-if="isLikes" @click.prevent="unLike(mem)">
        <i class="fas fa-plus  fa-lg" style="color:green"></i>
        </a>
        <a href="#" v-else @click.prevent="like(mem)">
             <i class="fas fa-plus  fa-lg " style="color:red"></i>
        </a>
    </span>
    <p>{{numberLike}}

    </p>

</template>

<script>
export default {
    props: ['mem', 'likes', 'counter'],
    data: function() {
        return {
            isLikes: '',
            numberLike: this.counter,
        }
    },

    mounted() {
        this.isLikes = !!this.isLike;
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
                    this.numberLike = response.data.like;
                    this.isLikes = true;
                })
                .catch(response => {
                   // console.log(response.data)
                });
        },

        unLike(mem) {
            axios.post('/unlike/'+mem)
                .then(response => {
                    this.numberLike = response.data.like;
                    this.isLikes = false;
                })
                .catch(response => {
                    //console.log(response.data)
                });
        }
    },
}
</script>

