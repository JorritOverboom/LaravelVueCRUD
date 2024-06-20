import { createStore } from 'vuex'
import axios from '../axios'

const store = createStore({
    state() {
        return {
            posts: []
        }
    },
    getters: {
        getPosts: (state) => state.posts
    },
    mutations: {
        setPosts(state, posts) {
            state.posts = posts
        },
        addPost(state, post) {
            state.posts.push(post)
        }
    },
    actions: {
        async fetchPosts({ commit }) {
            try {
                const response = await axios.get('/api/posts')
                commit('setPosts', response.date)
            } catch (error) {
                console.error('Failed to fetch posts:', error)
            }
        },
        async addPost({ commit }, post) {
            try {
                const response = await axios.post('/api/posts', post)
                commit('addPost', response.data)
            } catch (error) {
                console.error('Failed to add post:', error)
            }
        }
    }
})

export default store