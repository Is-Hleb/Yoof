<template>
    <div id="card-article-editor">
        <form @submit.prevent="store">
            <ckeditor @upload :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
        </form>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import '@ckeditor/ckeditor5-build-classic/build/translations/ru';
import UploadAdapter from '../../adapters/UploadAdapter';
import Vue from 'vue'

Vue.use(CKEditor)

export default {
    name: 'card-article-editor',
    props: {
        id: null,
    },
    computed: {
      token() {
          return this.$store.getters.getToken
      }
    },
    methods: {
        store() {

        },
        upload: (id, token) => (editor) => {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new UploadAdapter(loader, id, token);
            };
        }
    },
    data() {
        return {
            editor: ClassicEditor,
            editorData: '<p>Пишите на здоровье)</p>',
            editorConfig: {
                // The configuration of the editor.
                language: 'ru',
                defaultLanguage: 'ru',
                extraPlugins: [this.upload(this.id, this.$store.state.user.api_token)],
            },
        }
    },
    watch: {
        editorData(newVal) {
            this.$emit('editorDataChange', newVal);
        }
    }
}
</script>

<style>
#card-article-editor {
    padding: 2%;
}
</style>
