<template>
    <div>
        <a-modal
            :title="'Добавляется сортировка для характеристики: ' + this.row.name"
            :visible="visible"
            @ok="handleOk"
            @cancel="$emit('onClose')"
        >
            <div>
                <h3>Выберете тип сортировки</h3>
                <a-button-group>
                    <a-button @click="() => this.newArgument.value_type = 'range'">Диапазон</a-button>
                    <a-button @click="() => this.newArgument.value_type = 'value'">По одному значению</a-button>
                    <a-button @click="() => this.newArgument.value_type = 'boolean'">По присутствию</a-button>
                </a-button-group>
                <a-input-group v-if="this.newArgument.value_type === 'range'">
                    <p>Если значение данной характеристики у продукта попадает в данный диапазон</p>
                    <a-form-item label="Название (показывается пользователю)">
                        <a-input v-model="newArgument.name"></a-input>
                    </a-form-item>
                    <a-form-item label="Значение ОТ">
                        <a-input-number v-model="newArgument.from"></a-input-number>
                    </a-form-item>
                    <a-form-item label="Значение ДО">
                        <a-input-number v-model="newArgument.to"></a-input-number>
                    </a-form-item>
                </a-input-group>
                <a-input-group v-if="this.newArgument.value_type === 'value'">
                    <p>Если имеются совпадения значения со свойством продукта в БД</p>
                    <a-form-item label="Название (показывается пользователю)">
                        <a-input v-model="newArgument.name"></a-input>
                    </a-form-item>
                    <a-form-item label="Значение (значение, с которым нужно искать совпадения в БД)">
                        <a-input v-model="newArgument.value"></a-input>
                    </a-form-item>
                </a-input-group>
                <a-input-group v-if="this.newArgument.value_type === 'boolean'">
                    <p>Если у продукта присутствует характеристика категории</p>
                    <a-form-item label="Название (Будет отображаться пользователю)">
                        <a-input v-model="newArgument.name"></a-input>
                    </a-form-item>
                </a-input-group>
            </div>
        </a-modal>
    </div>
</template>
<script>
export default {
    data() {
        return {
            newArgument: {
                value: '',
                value_type: '',
                name: '',
                from: null,
                to: null,
                category_id: null,
                category_property_id: null,
            },
            type: 'value',
        };
    },
    props: {
        row: {},
        visible: {},
    },
    methods: {
        openNotification() {
            this.$notification.open({
                message: 'НЕ ВСЕ ПОЛЯ ФОРМЫ ЗАПОЛНЕНЫ',
                class: 'bg-warning',
                description:
                    'Поля должны быть заполнены, иначе возможны неисправности в фильтрации товаров пользователя.',
            });
        },
        handleOk() {
            let obj = this.newArgument
            if(obj.name.empty) {
                this.openNotification()
                return
            }
            for (let key in obj) {
                switch (obj.value_type) {
                    case 'range':
                        if (!obj.from || !obj.to) {
                            this.openNotification()
                            return
                        }
                        break;
                    case 'value':
                        if(obj.value.empty) {
                            this.openNotification()
                            return
                        }
                }
            }
            this.$store.dispatch('createSearchArgument', this.newArgument)
            this.$emit('onClose');
        },
        handleCancel() {
            this.$emit('onClose');
        },
    },
    mounted() {
        this.newArgument.category_id = this.row.category_id
        this.newArgument.category_property_id = this.row.id
    },

};
</script>
