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
        },
        updatePost(state, updatedPost) {
            const index = state.posts.findIndex(post => post.id === updatedPost.id);
            if (index !== -1) {
                state.posts.splice(index, 1, updatedPost);
            }
        },
        deletePost(state, id) {
            state.posts = state.posts.filter((post) => post.id !== id)
        }
    },
    actions: {
        async fetchPosts({ commit }) {
            try {
                const response = await axios.get('/api/posts')
                commit('setPosts', response.data)
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
        },
        async updatePost({ commit }, { id, content }) {
            try {
                const response = await axios.put(`/api/posts/${id}`, { content })
                commit('updatePost', response.data)
            } catch (error) {
                console.error('Failed to update post:', error)
            }
        },
        async deletePost({ commit }, { id }) {
            try {
                const response = await axios.delete(`/api/posts/${id}`)
                commit('deletePost', response.data);
            } catch (error) {
                console.error('Failed to delete post', error)
            }
        }
    }
})

export default store