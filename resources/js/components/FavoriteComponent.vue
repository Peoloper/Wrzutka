<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(mem)">
            <i  class="fa fa-heart fa-lg"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(mem)">
            <i class="far fa-heart fa-lg"></i>
        </a>
    </span>

</template>

<script>
export default {
    props: ['mem', 'favorited'],
    data: function() {
        return {
            isFavorited: '',
        }
    },

    mounted() {
        this.isFavorited = !!this.isFavorite;
    },

    computed: {
        isFavorite() {
            return this.favorited;
        },
    },

    methods: {
        favorite(mem) {
            axios.post('/favorite/'+mem)
                .then(response => this.isFavorited = true)
                .catch(response => {
                    //console.log(response.data)
                });
        },

        unFavorite(mem) {
            axios.post('/unfavorite/'+mem)
                .then(response => this.isFavorited = false)
                .catch(response => {
                    //console.log(response.data)
                });
        }
    }
}
</script>

