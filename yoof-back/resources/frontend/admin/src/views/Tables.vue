<template>
    <div>
        <!-- Authors Table -->
        <a-row :gutter="24" type="flex">

            <!-- Authors Table Column -->
            <a-col :span="24" class="mb-24">

                <!-- Authors Table Card -->
                <CardAuthorTable
                    @onChangeUserStatus="changeUserStatus"
                    @onDelete="onDeleteInUsers"
                    @sortTableByRole="sortTableByRole"
                    @onSearch="searchInUsers"
                    :data="table1Data"
                    :columns="table1Columns"
                    :row-key="record => record.key"
                    :loading="loading"
                ></CardAuthorTable>
                <!-- / Authors Table Card -->

            </a-col>
            <!-- / Authors Table Column -->

        </a-row>
        <!-- / Authors Table -->

        <!-- Projects Table -->
        <a-row :gutter="24" type="flex">

            <!-- Projects Table Column -->
            <a-col :span="24" class="mb-24">

                <!-- Projects Table Column -->
                <CardCategoriesTable></CardCategoriesTable>
                <!-- / Projects Table Column -->

            </a-col>
            <!-- / Projects Table Column -->

        </a-row>
        <!-- / Projects Table -->

        <!-- Projects Table -->
        <a-row :gutter="24" type="flex">

            <!-- Projects Table Column -->
            <a-col :span="24" class="mb-24">

                <!-- Projects Table Column -->
                <CardArticlesTable></CardArticlesTable>
                <!-- / Projects Table Column -->

            </a-col>
            <!-- / Projects Table Column -->

        </a-row>
        <!-- / Projects Table -->

    </div>

</template>

<script>

// "Authors" table component.
import CardAuthorTable from '../components/Cards/CardAuthorTable' ;

// "Projects" table component.
import CardCategoriesTable from '../components/Cards/CardCategoriesTable' ;
import CardArticlesTable from "../components/Cards/CardArticlesTable";// "Authors" table list of columns and their properties.
const table1Columns = [
    {
        title: 'ФИО И EMAIL',
        dataIndex: 'author',
        scopedSlots: {customRender: 'author'},
    },

    {
        title: 'СТАТУС АККАУНТА',
        dataIndex: 'status',
        filters: [
            {text: 'ПОДТВЕРЖДЕНЫ', value: 'true'},
            {text: 'НЕ ПОДТВЕРЖДЕНЫ', value: 'false'},
        ],
        onFilter: (value, record) => {
            if (value === 'true')
                return record.status;
            return !record.status;
        },
        width: 20,
        scopedSlots: {customRender: 'status'},
    },
    {
        title: 'РЕГИСТРАЦИЯ',
        dataIndex: 'employed',
        class: 'text-muted',
    },
    {
        title: 'ВЗАИМОДЕЙСТВИЕ',
        scopedSlots: {customRender: 'editBtn'},
        width: 60,
    },
];



// "Projects" table list of columns and their properties.


// "Projects" table list of rows and their properties.
const table2Data = [
    {
        key: 123,
        id: 123,
        name: 'name',
        children: [
            {
                key: 1,
                id: 23,
                name: 'propName1'
            },

            {
                key: 2,
                id: 24,
                name: 'propName2'
            },

        ],
    },

];

export default ({
    components: {
        CardAuthorTable,
        CardCategoriesTable,
        CardArticlesTable
    },
    methods: {
        onDeleteInUsers(key) {
            let user = this.table1Data[key]
            this.$store.dispatch('deleteUser', user.id)
        },
        changeUserStatus(index) {
            this.$store.dispatch('changeUserStatus', index)
        },
        sortTableByRole(role) {
            this.sortArguments.string = role
            this.sortArguments.type = 'role'
        },
        searchInUsers(string) {
            this.sortArguments.string = string
            this.sortArguments.type = 'search'
        },
    },
    computed: {
        loading() {
            return this.$store.getters.loading;
        },
        table1Data() {
            return this.$store.getters.searchInUsers(this.sortArguments.type, this.sortArguments.string)
        }

    },
    data() {
        return {
            sortArguments: {
                type: 'role',
                string: 'all',
            },
            // Associating "Users" table data with its corresponding property.
            // Associating "Users" table columns with its corresponding property.
            table1Columns: table1Columns,

            // Associating "Categories" table data with its corresponding property.
            table2Data: table2Data,

            // Associating "Projects" table columns with its corresponding property.
        }
    },

})

</script>

<style lang="css">


</style>
