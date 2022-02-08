import SettingsComponent from "./components/SettingsComponent";

require('./bootstrap')

import { createApp } from 'vue'

import NewMemComponent from './components/NewMemComponent'
import getCommentsComponent from './components/GetCommentsComponent'
import test from './components/test'
import favoriteComponent from './components/FavoriteComponent'
import LikeComponent from "./components/LikeComponent";



const app = createApp({})

app.component('new-mem', NewMemComponent)
app.component('get-comments', getCommentsComponent)
app.component('test', test)
app.component('favorite', favoriteComponent)
app.component('like', LikeComponent)
app.component('setting', SettingsComponent)


app.mount('#app')
