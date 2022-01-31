require('./bootstrap')

import { createApp } from 'vue'

import NewMem from './components/NewMem'
import test from './components/test'



const app = createApp({})

app.component('new-mem', NewMem)
app.component('test', test)


app.mount('#app')
