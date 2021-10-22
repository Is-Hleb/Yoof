const strChanger = {
    id: 'Индекс',
    name: 'Имя',
    surname: 'Фамилия',
    patronymic: 'Отчество',
    phone: 'Телефон',
    balance: 'Баланс',
    user: 'Пользователь',
    admin: 'Администратор',
    company: 'Продавец',
    company_name: 'Название организации или ИП',
    legal_address: 'Юридический адрес',
    inn: 'ИНН',
    bank: 'Банк',
    kpp: 'КПП',
    bank_bik: 'БИК Банка',
    checking_account: 'Расчётный счёт',
    category: 'Категория',
    searchArgument: 'Поисковой аргумент',
    property: 'Свойство',
    value: 'Значение',
    to: 'Начиная от',
    from: 'Заканчивая',
    value_type: 'Тип значение',
    type: 'Тип',
};

export default {
    getName: state => {
        return state.user.data.name + ' ' + state.user.data.surname;
    },
    allDBUsers: state => {
        return state.allUsers
    },
    allUsers: state => {
        let users = [];
        for (let i = 0; i < state.allUsers.length; i++) {
            let user = state.allUsers[i]
            let mathDescription = user => {
                let data = user.data
                let string = ''
                for (let key in data) {
                    if (['created_at', 'updated_at', 'user_id'].includes(key)) {
                        continue
                    }
                    string += `<b>${strChanger[key]}:</b> ${data[key]}<br>`
                }
                return string;
            }
            users.push({
                key: i,
                author: {
                    // avatar: 'images/face-2.jpg',
                    name: strChanger[user.role],
                    email: user.email,
                },
                description: mathDescription(user),
                id: user.id,
                role: user.role,
                status: user.status,
                employed: user.created_at.toString().substr(2, 8),
            })

        }
        return users;
    },
    loading: (state) => {
        return state.loading;
    },
    searchInUsers: (state, getters) => (type, string) => {
        if (type === 'role') {
            let role = string;
            let users = getters.allUsers
            if (role === 'all') {
                return users
            }
            return users.filter(item => item.role === role);
        } else if (type === 'search') {
            let search = string.toString().toLowerCase().replaceAll(' ', '');
            let filtered = state.allUsers.filter(item => {
                let data = item.data;
                let string = Object.values(data).toString() + Object.values(item).toString()
                string = string.replaceAll(',', '').replaceAll(' ', '').toLowerCase()
                return string.indexOf(search) !== -1
            })
            let usersFromGetter = getters.allUsers
            let output = [];
            for (let i = 0; i < filtered.length; i++) {
                let user = filtered[i]
                let description = usersFromGetter.filter(item => item.id === user.id)[0].description
                output.push({
                    key: i,
                    author: {
                        name: strChanger[user.role],
                        email: user.email,
                    },
                    description,
                    id: user.id,
                    role: user.role,
                    status: user.status,
                    employed: user.created_at.substr(2, 8),
                })
            }
            return output;
        }
    },
    getUserByKey: state => id => {
        return state.allUsers[id]
    },
    allCategories: state => {
        let categories = [];
        let key = 1;
        function mathDescription(arg) {
            let data = arg
            let string = ''
            for (let key in data) {
                if (['created_at', 'updated_at', 'category_id', 'category_property_id'].includes(key)) {
                    continue
                }
                string += `<b>${strChanger[key]}:</b> ${data[key]}<br>`
            }
            return string;
        }
        let formatChildren = (item) => {
            return item.properties.map(prop => {
                return {
                    ...prop,
                    idTitle: `<b>${prop.id}</b>`,
                    key: key++,
                    children: prop.searchArguments.map(arg => {
                        return {
                            ...arg,
                            key: key++,
                            idTitle: `<b class="text-danger">${arg.id}</b>`,
                            is: 'searchArgument',
                            type: strChanger['searchArgument'],
                            description: mathDescription(arg),
                            productsCount: false,
                        }
                    }),
                    is: 'property',
                    type: strChanger['property'],
                }
            });
        }
        for(let index in state.categories) {
            let item = state.categories[index]
            categories.push({
                key: key++,
                ...item.category,
                gradation: item.category.gradation_name !== 'invisible' ? ' (' + item.category.gradation_name + ')' : " (Задайте группу)",
                is: 'category',
                idTitle: `<b class="text-primary">${item.category.id}</b>`,
                type: strChanger['category'],
                children: formatChildren(item)
            })
        }
        return categories;
    }
}
