const axios = require('axios')

export default {
    state: {
        groups: [],
        news: [],
        products: [],
        filters: {},
        articles: [],
    },
    getters: {
        groups: state => Object.keys(state.groups) ?? [],
        news: state => state.news,
        filters: state => state.filters,
        articles: state => state.articles,
        categories: state => {
            let groups = state.groups
            let output = {}
            for (let key in groups) {
                output[key] = groups[key].map(category => category.name);
            }
            return output;
        },
        products: state => {
            let products = state.products,
                output = [];

            for (let key in products) {
                let props = products[key].properties,
                    description = ''

                for(let propKey in props) {
                    description += `<b>${props[propKey].name}:</b> ${props[propKey].value}<br>`
                }

                output.push({
                    key,
                    name: props.filter(prop => prop.name === 'Модель')[0].value,
                    description
                });
            }
            return output;
        },
    },
    mutations: {
        SET_GROUPS: (state, groups) => {
            state.groups = groups
        },
        SET_FILTERS: (state, filters) => {
            let iGlobal = 1,
                iteration = 1,
                localOutput = {},
                output = {}

            for (let key in filters) {

                if (iteration++ > 3) {
                    iteration = 1;
                    iGlobal++;
                    localOutput = {}
                }

                localOutput[key] = filters[key]
                output[iGlobal] = localOutput;
            }
            state.filters = output;
        },
        SET_PRODUCTS: (state, products) => {
            state.products = products
        },
        SET_ARTICLES: (state, articles) => {
            state.articles = articles;
        }
    },
    actions: {
        async loadGroups({commit}) {
            let r = await axios.get('api/public/product/groups')
            commit('SET_GROUPS', r.data.data)
        },
        async loadFilters({commit}, category_name) {
            let r = await axios.post('api/public/product/filters', {category_name: category_name})
            let data = r.data
            if (data.code === 'success') {
                commit('SET_FILTERS', data.data)
            }
        },
        async searchByArguments({commit}, args) {
            let r = await axios.post('api/public/product/search-by-args', {args})
            let data = r.data
            if(data.code === 'success') {
                commit('SET_PRODUCTS', data.data)
            }
        },
        searchByModel({commit}, str) {
            axios.post('api/public/product/search-by-model', {name: str}).then(r => {
                let data = r.data
                if(data.code === 'success') {
                    commit('SET_PRODUCTS', data.data);
                }
            })
        },
        loadArticles({commit}) {
            axios.get('api/public/articles').then(r => {
                if(r.data.code === 'success') {
                    commit('SET_ARTICLES', r.data.data);
                }
            });
        }
    },

}
