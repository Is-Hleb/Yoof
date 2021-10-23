<template>
    <div>
        <a-modal
            :title="'Редактируется: ' + this.row.type"
            :visible="visible"
            @ok="handleOk"
            @cancel="$emit('onClose')"
        >
            <br>
            <div>
                <a-input
                    v-model="newName"
                >
                </a-input>
            </div>
            <div v-if="row.is === 'category'">
                <a-input
                    v-model="newGradationName"
                >
                </a-input>
            </div>
        </a-modal>
    </div>
</template>
<script>
export default {
    data() {
        return {
            newName: '',
            prop: '',
            newGradationName: '',
        };
    },
    props: {
        row: {},
        visible: {},
    },
    methods: {
        handleOk() {
            let data = {};
            if(this.row.is === 'category') {
                data = {
                    name: this.newName,
                    gradation_name: this.newGradationName,
                }
            } else {
                data = {
                    name: this.newName,
                }
            }
            console.log(data)
            const hide = this.$message.loading('Меняю значение...', 0);
            setTimeout(hide, 2500);
            this.$store.dispatch('editCategory', {
                id: this.row.id,
                type: this.row.is,
                data,
            });
            this.$emit('onClose');
        },
        handleCancel() {
            this.$emit('onClose');
        },
    },
    mounted() {
        this.newName = this.row.name;
        if(this.row.is === 'category') {
            this.newGradationName = this.row.gradation_name;
        }
    },

};
</script>
