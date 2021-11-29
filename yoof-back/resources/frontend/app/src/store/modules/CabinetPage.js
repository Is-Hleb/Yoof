const axios = require('axios')

export default {
    state: {
        files: [],
    },

    getters: {
        files: state => {
            let files = state.files, output = {}
            if(files.empty) {
                return {inn: '', orgn: ''}
            }
            for(let i = 0; i < files.length; i++) {
                let file = files[i];
                output[file.type] = file.name;
            }

            return output;
        },
    },

    mutations: {
        SET_FILES: (state, files) => {
            state.files = files
        },
    },

    actions: {
        loadFiles({commit}) {
            const
                headers = this.getters.axiosHeaders;

            axios.get('api/company/documents', {headers}).then(r => {
                commit("SET_FILES", r.data.data)
                console.log(r.data);
            });
        }
    },
}
