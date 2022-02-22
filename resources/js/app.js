
require('./bootstrap')

import { createApp } from 'vue'
import {Toaster} from "@meforma/vue-toaster";


import NewMemComponent from './components/NewMemComponent'
import CommentsComponent from './components/CommentsComponent'
import favoriteComponent from './components/FavoriteComponent'
import LikeComponent from "./components/LikeComponent";
import SettingsComponent from "./components/SettingsComponent";


const app = createApp({})
app.use(Toaster,{
    position: "top-left",

});

app.component('new-mem', NewMemComponent)
app.component('comments', CommentsComponent)

app.component('favorite', favoriteComponent)
app.component('like', LikeComponent)
app.component('setting', SettingsComponent)


app.mount('#app')
