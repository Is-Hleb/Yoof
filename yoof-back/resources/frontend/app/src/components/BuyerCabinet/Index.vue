<template>
    <div>
    <div class="main_bloc">
        <head-component></head-component>
        <hr class="line">
        <img src="./img/heade.png" class="headepo">
        <div class="bodynomer1">
            <div class="flexbetweennomer1">
                <h1 class="a">ЛИЧНЫЙ КАБИНЕТ</h1>
                <div class="flexaling">
                    <div class="poptop">
                        <div class="flex">
                            <h1 class="a2">Мой баланс:</h1>
                            <a href="#" class="yelow">0</a><span class="yelow">₽</span>
                        </div>
                        <h1 class="a2 top"><span class="yelow">+</span> Пополнить баланс</h1>
                    </div>
                    <img class="img" src="./img/img.png">
                    <h1 class="a2">Иван</h1>
                    <h1 class="a3">Иванов</h1>
                    <img class="exit" src="./img/exit.png">
                </div>
            </div>
            <div class="flexcenter">
                <button class="button-1"><span class="bh1 h1a">Мои данные</span></button>
                <button class="button-2"><span class="bh2 h1a">Мои заявки </span>
                    <div class="boxcifra8">2</div>
                </button>
                <button class="button-3"><span class="bh3 h1a">Активные аукционы</span></button>
                <button class="button-4"><span class="bh4 h1a">Избранное</span></button>
                <button class="button-5"><span class="bh5 h1a">История покупок</span></button>

            </div>
            <div class="moi-dani">
                <div>
                    <p v-if="errors.length" class="p_error">
                        <b>Пожалуйста, исправьте указанные ошибки:</b>
                    <ul class="ul_error">
                        <li v-for="error in errors" v-bind:key="error" class="li_error">{{ error }}</li>
                    </ul>
                    </p>
                </div>
                <div class="flexnomer1">

                        <div>
                            <div class="flex6661"><h1 class="h1_1">Имя</h1><input type="text" class="text1" v-model="name"></div>
                            <div class="flex1"><h1 class="h1_1">Фамилия</h1><input type="text" class="text1" v-model="surname"></div>
                            <div class="flex1"><h1 class="h1_1">Отчество</h1><input type="text" class="text1" v-model="patronymic"></div>
                            <div class="flex1"><h1 class="h1_1">Телефон</h1><input type="tel" class="text1" v-model="telephone"></div>
                            <div class="flex1"><h1 class="h1_1">Электронная почта</h1><input type="email" class="text1" v-model="email"></div>
                            <div class="flex1"><h1 class="h1_1">Сменить пароль</h1><input type="password" class="text1" v-model="password"></div>
                            <div class="flex1"><h1 class="h1_1">Повторить пароль</h1><input type="password" class="text1" v-model="repeatPassword"></div>
                            <div class="flexkyky"><button class="button1" type="button" v-on:click="checkForm">СОХРАНИТЬ ИЗМЕНЕНИЯ</button></div>
                        </div>

                    <div class="adres">
                        <h1 class="h1a">Адреса доставки</h1>
                        <div class="papap">
                            <h1 class="steli">123456, Москва, ул. Багратиона, д.9, кв. 35</h1>
                            <div class="flex ml15 pob">
                                <div class="flex"><img src="./img/izmene.png" class="size17"><h1 class="rededal">Редактировать</h1></div>
                                <div class="flex"><img src="./img/ydal.png" class="size1418"><h1 class="rededal">Удалить</h1></div>
                            </div>
                        </div>
                        <div class="flex top3">
                            <h1 class="daiu"><span class="plus">+</span> Добавить адрес</h1>

                        </div>
                    </div>
                </div>
            </div>

            <div class="moi-zaiavki">
                <div class="bodynomer2">
                    <div class="hr_big">
                        <div class="flexaround">
                            <div>
                                <h2 class="h8">Номер заявки</h2>
                                <div class="mh45"></div>
                                <div class="flex">
                                    <img src="./img/boxgal.png" class="size2020">
                                    <h1 class="data0100"><span class="color-zel">№325478</span> от<br>01.03.2021
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <h2 class="h8">Наименование товара</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                            </div>
                            <div>
                                <h2 class="h8">Текущая цена</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">18 000₽</h1>
                            </div>
                            <div>
                                <h2 class="h8">Статус</h2>
                                <div class="mh45"></div>
                                <div class="flex">
                                    <div class="boxcifra4">4</div>
                                    <h1 class="data0144 color-zel">Посмотреть<br>отклики</h1>
                                </div>
                            </div>
                            <div>
                                <h2 class="h8">Чат</h2>
                                <div class="mh45"></div>
                                <div class="flex">
                                    <div class="boxcifra4">2</div>
                                    <h1 class="color-zel mess">Сообщения</h1>
                                </div>
                            </div>
                            <div>
                                <h2 class="h8">Настройки</h2>
                                <div class="mh45"></div>
                                <div>
                                    <div class="flex"><img src="./img/ydal.png" class="size1419">
                                        <h1 class="ydal">Удалить</h1></div>
                                </div>
                            </div>
                            <div>
                                <h2 class="h8">Старт</h2>
                                <div class="mh45"></div>
                                <div class="flex pofigy">
                                    <h1 class="data0103 color-zel">НАЧАТЬ<br>ТОРГИ</h1>
                                    <img class="y" src="./img/y.png">
                                </div>
                            </div>
                        </div>

                        <hr class="hr_min">
                        <div class="flexend">
                            <button class="button-balanc"><span class="oioiio">ПОПОЛНИТЬ БАЛАНС</span></button>
                            <button class="button-new"><span class="oioiio">СОЗДАТЬ НОВУЮ ЗАЯВКУ</span></button>
                        </div>
                    </div>
                    <div class="adap">
                        <div class="bodyl">
                            <div class="flex">
                                <div class="hr_big3 mr10">
                                    <h2 class="h88">Номер заявки</h2>
                                    <h2 class="h88">Наименование товара</h2>
                                    <h2 class="h88">Текущая цена</h2>
                                    <h2 class="h88">Статус</h2>
                                    <h2 class="h88">Чат</h2>
                                    <h2 class="h88">Настройки</h2>
                                    <h2 class="h88 pd">Старт</h2>
                                </div>
                                <div class="ta">
                                    <div class="flex pds">
                                        <img src="./img/boxgal.png" class="size2020">
                                        <h1 class="data0100"><span class="color-zel">№325478</span> от 01.03.2021
                                        </h1>
                                    </div>
                                    <h1 class="data0103 p10d">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                    <h1 class="data0103 p10d">18 000₽</h1>
                                    <div class="flex p10d">
                                        <div class="boxcifra4">4</div>
                                        <h1 class="data0144 color-zel">Посмотреть отклики</h1>
                                    </div>
                                    <div class="flex p10d">
                                        <div class="boxcifra4">2</div>
                                        <h1 class="data0103 color-zel mess">Сообщения</h1>
                                    </div>
                                    <div class="p10d">
                                        <div class="flex"><img src="./img/izmene.png" class="size17">
                                            <h1 class="rededal">Редактировать</h1></div>
                                        <div class="flex"><img src="./img/ydal.png" class="size1419">
                                            <h1 class="rededal">Удалить</h1></div>
                                    </div>
                                    <div class="flex ppd">
                                        <h1 class="data0106663 color-zel">НАЧАТЬ ТОРГИ</h1>
                                        <img class="y" src="./img/y.png">
                                    </div>
                                </div>
                            </div>
                            <hr class="hr_mini2">
                            <div class="gsdg4e">
                                <button class="button-balanc"><span class="oioiio">ПОПОЛНИТЬ БАЛАНС</span></button>
                            </div>
                            <div class="dhdsg">
                                <button class="button-new"><span class="oioiio">СОЗДАТЬ НОВУЮ ЗАЯВКУ</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aktivnei_oykcion">
                <div class="body203">
                    <div class="hr_big222">
                        <div class="flexaround">
                            <div>
                                <h2 class="h8">Номер заявки</h2>
                                <div class="mh45"></div>
                                <h2 class="data1103">Аукцион <span class="color-zel">№325478</span><br>от 01.03.2021
                                </h2>
                            </div>
                            <div>
                                <h2 class="h8">Наименование товара</h2>
                                <div class="mh45"></div>
                                <h2 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                            </div>
                            <div>
                                <h2 class="h8">Текущая цена</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">18 000₽</h1>
                            </div>
                            <div>
                                <h2 class="h8">Статус</h2>
                                <div class="mh45"></div>
                                <div class="flex">
                                    <div class="boxcifra4">4</div>
                                    <h1 class="data2103 color-zel">Посмотреть<br>отклики</h1>
                                </div>
                            </div>
                            <div>
                                <h2 class="h8">Чат</h2>
                                <div class="mh45"></div>
                                <div class="flex">
                                    <div class="boxcifra4">2</div>
                                    <h1 class="mess color-zel">Сообщения</h1>
                                </div>
                            </div>
                        </div>
                        <hr class="hr_min">
                        <h1 class="podobrat"><span class="podobrot">+</span> Подобрать еще</h1>
                    </div>
                </div>
                <div class="adap_2">
                    <div class="bodyl">
                        <div class="flex">
                            <div class="hr_big3 mr10">
                                <h2 class="h88">Номер заявки</h2>
                                <h2 class="h88">Наименование товара</h2>
                                <h2 class="h88">Текущая цена</h2>
                                <h2 class="h88">Статус</h2>
                                <h2 class="h88">Чат</h2>
                            </div>
                            <div class="tal">
                                <h2 class="data1103 pds">Аукцион <span class="color-zel">№325478</span><br>от
                                    01.03.2021</h2>
                                <h2 class="data0103 ps20">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                                <h1 class="data0103 p10d">18 000₽</h1>
                                <div class="flex p10d">
                                    <div class="boxcifra4">4</div>
                                    <h1 class="data2103 color-zel">Посмотреть отклики</h1>
                                </div>
                                <div class="flex p10d">
                                    <div class="boxcifra4">2</div>
                                    <h1 class="data0103 color-zel mess">Сообщения</h1>
                                </div>

                            </div>
                        </div>
                        <hr class="hr_min">
                        <h1 class="podobrat"><span class="podobrot">+</span> Подобрать еще</h1>
                    </div>
                </div>
            </div>
            <div class="izbranoe">
                <h1 class="podobrat2"><span class="podobrot">+</span> Подобрать еще</h1>
                <div class="flex">
                    <div class="box2">
                        <div class="lpyup">
                            <img src="./img/like.png" class="like">
                            <img src="./img/phone.png" class="size">
                            <h1 class="data0103">Смартфон Sumsung Galaxy A51 128Гб</h1>
                            <div class="FLEX60">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="torgi">НАЧАТЬ ТОРГИ</button>
                        </div>
                        <div class="lpyup">
                            <img src="./img/like.png" class="like">
                            <img src="./img/phone.png" class="size">
                            <h1 class="data0103">Смартфон Sumsung Galaxy A51 128Гб</h1>
                            <div class="FLEX60">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="torgi">НАЧАТЬ ТОРГИ</button>
                        </div>
                        <div class="lpyup">
                            <img src="./img/like.png" class="like">
                            <img src="./img/phone.png" class="size">
                            <h1 class="data0103">Смартфон Sumsung Galaxy A51 128Гб</h1>
                            <div class="FLEX60">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="torgi">НАЧАТЬ ТОРГИ</button>
                        </div>
                        <div class="lpyup">
                            <img src="./img/like.png" class="like">
                            <img src="./img/phone.png" class="size">
                            <h1 class="data0103">Смартфон Sumsung Galaxy A51 128Гб</h1>
                            <div class="FLEX60">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>

                            <button class="torgi">НАЧАТЬ ТОРГИ</button>
                        </div>
                        <div class="lpyup">
                            <img src="./img/like.png" class="like">
                            <img src="./img/phone.png" class="size">
                            <h1 class="data0103">Смартфон Sumsung Galaxy A51 128Гб</h1>
                            <div class="FLEX60">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="torgi">НАЧАТЬ ТОРГИ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="purchase_history">
                <div class="body222">
                    <div class="hr_big44">
                        <div class="flexaround">
                            <div>
                                <h2 class="h8">Номер заявки</h2>
                                <div class="mh45"></div>
                                <h2 class="data31039">Заявка <span class="color-zel">№325478</span><br>от 01.03.2021
                                </h2>
                            </div>
                            <div>
                                <h2 class="h8">Наименование товара</h2>
                                <div class="mh45"></div>
                                <h2 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                            </div>
                            <div>
                                <h2 class="h8">Итоговая цена</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">17 200₽</h1>
                            </div>
                            <div>
                                <h2 class="h8">Оплата</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">Карта VISA</h1>
                            </div>
                            <div>
                                <h2 class="h8">Доставка</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103">Самовывоз</h1>
                            </div>
                            <div>
                                <h2 class="h8">Статус</h2>
                                <div class="mh45"></div>
                                <h1 class="data0103 color-zel">Доставлен<br>в магазин</h1>
                            </div>
                        </div>
                        <hr class="hr_min">

                        <div class="flexaround mt50">

                            <h2 class="data31039 posa">Заявка <span class="color-zel">№325478</span><br>от
                                01.03.2021</h2>
                            <h2 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                            <h1 class="data0103 widt">17 200₽</h1>
                            <h1 class="data0106">PayPal</h1>
                            <div>
                                <h1 class="data0103">Доставка</h1>
                                <h2 class="ylica">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                            </div>


                            <h1 class="data0103 color-zel">Доставлен<br><span class="color-zel2">Отслеживание</span>
                            </h1>

                        </div>
                        <hr class="hr_min">
                    </div>
                </div>
                <div class="adap_3">
                    <div class="bodyl">
                        <div class="flex">
                            <div class="hr_big3 mr10">
                                <h2 class="h88">Номер заявки</h2>
                                <h2 class="h88">Наименование товара</h2>
                                <h2 class="h88">Итоговая цена</h2>
                                <h2 class="h88">Оплата</h2>
                                <h2 class="h88">Доставка</h2>
                                <h2 class="h88">Статус</h2>
                            </div>
                            <div class="tal">
                                <h2 class="data31039 tal pds">Заявка <span class="color-zel">№325478</span><br>от
                                    01.03.2021</h2>
                                <h2 class="data0103 pd35">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                                <h1 class="data0103 p10d">17 200₽</h1>
                                <h1 class="data0103 p10d">Карта VISA</h1>
                                <h1 class="data0103 p10d">Самовывоз</h1>
                                <h1 class="data0103 color-zel p10d">Доставлен<br>в магазин</h1>
                            </div>
                        </div>
                        <hr class="hr_min">
                        <div class="flex">
                            <div class="hr_big3 mr10">
                                <h2 class="h88">Номер заявки</h2>
                                <h2 class="h88">Наименование товара</h2>
                                <h2 class="h88">Итоговая цена</h2>
                                <h2 class="h88">Оплата</h2>
                                <h2 class="h88">Доставка</h2>
                                <h2 class="h88">Статус</h2>
                            </div>
                            <div class="tal">
                                <h2 class="data31039 tal pds">Заявка <span class="color-zel">№325478</span><br>от
                                    01.03.2021</h2>
                                <h2 class="data0103 pd35">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                                <h1 class="data0103 p10d">17 200₽</h1>
                                <h1 class="data0103 p10d">Карта VISA</h1>
                                <h1 class="data0103 p10d">Самовывоз</h1>
                                <h1 class="data0103 color-zel p10d">Доставлен<br>в магазин</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer">
            <div class="bodyilp">
                <img src="./img/logo2.png" class="yoof-yelomhgl">
                <div class="gdsfgs">
                    <h1 class="hh1">О сервисе</h1>
                    <div class="margin-bottom20"><a class="hh2">Как работает сервис?</a></div>
                    <div class="margin-bottom20"><a class="hh2">Правила использования</a></div>
                    <div class="margin-bottom20"><a class="hh2">Отзывы о нас</a></div>
                </div>
                <div class="nhgikk">
                    <h1 class="hh1">Контакты</h1>
                    <div class="flex margin-bottom20"><img src="./img/ins.png" class="wh22"><a
                        class="hh2">Instagram</a>
                    </div>
                    <div class="flex margin-bottom20"><img src="./img/fac.png" class="wh22"><a
                        class="hh2">Facebook</a></div>
                    <div class="flex margin-bottom20"><img src="./img/tel.png" class="wh22"><a
                        class="hh2">Telegram</a></div>
                </div>

            </div>
        </div>
        <div class="popup">
            <div class="popup_2">
                <img src="./img/krest.png" class="krest">
                <h1 class="pp">Добавить адрес</h1>
                <div class="flexlhlooi">
                    <div class="flex aopop">
                        <div>
                            <div class="flex298"><h1 class="h1_1">Индекс</h1><input type="text" class="text2" placeholder="Индекс"></div>
                            <div class="flex2"><h1 class="h1_1">Город</h1><input type="text" class="text2" placeholder="Город"></div>
                            <div class="flex2"><h1 class="h1_1">Район</h1><input type="text" class="text2" placeholder="Район"></div>
                            <div class="flex2"><h1 class="h1_1">Населенный пункт</h1><input type="text"
                                                                                            class="text2" placeholder="Населенный пункт"></div>
                            <div class="flex2"><h1 class="h1_1">Улица</h1><input type="text" class="text2" placeholder="Улица"></div>
                        </div>
                    </div>
                    <div class="flex aopop">
                        <div>
                            <div class="flex3678"><h1 class="h1_1">Дом</h1><input type="text" class="text2" placeholder="Дом"></div>
                            <div class="flex3"><h1 class="h1_1">Корпус</h1><input type="text" class="text2" placeholder="Корпус"></div>
                            <div class="flex3"><h1 class="h1_1">Подъезд</h1><input type="text" class="text2" placeholder="Подъезд"></div>
                            <div class="flex3"><h1 class="h1_1">Квартира</h1><input type="text" class="text2" placeholder="Квартира"></div>
                            <div class="flex3"><h1 class="h1_1">Этаж</h1><input type="text" class="text2" placeholder="Этаж"></div>
                        </div>
                    </div>
                </div>
                <button class="button2">СОХРАНИТЬ ИЗМЕНЕНИЯ</button>
            </div>

        </div>

        <div class="popup-3">
            <div class="popup_33">
                <img src="./img/krest.png" class="krest">
                <div class="body0">
                    <div class="flexdddd">
                        <div class="flex wid2">
                            <input type="text" placeholder="Введите модель техники..." class="text-popup">
                            <img src="./img/lypa.png" class="lypa2">
                            <button class="button-filtr"><h1 class="pppp2">искать</h1></button>
                        </div>
                    </div>
                    <h1 class="pppp mtb">Результаты поиска</h1>

                    <div class="flex1000proc">
                        <div class="box-mini">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/super.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/sitiling.png" class="sitiling"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela"><span class="pppp">хочу дешевле</span></button>
                        </div>
                        <div class="box-mini2">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/analog.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/mvideo-2.png" class="Mvideo"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela2"><span class="pppp">хочу дешевле</span></button>
                        </div>
                        <div class="box-mini3">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/analog.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/eldorado.png" class="eldorado"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela3"><span class="pppp">хочу дешевле</span></button>
                        </div>
                    </div>
                    <h2 class="we">Вы можете запросить готовность участия продавцов в аукционе по всем найденным
                        моделям, но запустить аукцион сможете только по одной выбранной модели. Если результат
                        поиска вас не устраивает, повторите поиск, воспользовавшись фильтрами.<br><br>Запустите
                        аукцион с одним из предложенных вариантов. Если результат поиска вас не устраивает,
                        воспользуйтесь фильтрами. Для запуска аукциона ваш лицевой счет должен быть пополнен на
                        сумму не менее </h2>
                </div>
            </div>
        </div>

        <div class="popup-4">
            <div class="popup_44">
                <img src="./img/krest.png" class="krest1">
                <div class="body0">
                    <h1 class="gyl">СРАВНЕНИЕ</h1>
                    <div class="hr-medle">
                        <div class="popox"></div>
                        <h1 class="note">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                        <h1 class="note">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                    </div>
                    <div class="flexaitems">
                        <div class="sravnenie">
                            <h1 class="gyl2">Стоимость</h1>
                            <h1 class="gyl2">Размер диагонали</h1>
                            <h1 class="gyl2">Бренд</h1>
                            <h1 class="gyl2">Цвет</h1>
                        </div>

                        <div class="sravnenie2">
                            <a href="#" class="cena2">20 000 ₽</a>
                            <h1 class="lb">15,6”</h1>
                            <h1 class="kj">ASUS</h1>
                            <h1 class="kf">Черный</h1>
                        </div>
                        <div class="sravnenie3">
                            <a href="#" class="cena3">21 000 ₽</a>
                            <h1 class="lb">15,6”</h1>
                            <h1 class="kj">HP</h1>
                            <h1 class="kf">Черный</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="popup-6">
        <div class="popup-66">
            <div class="body">

                <img src="./img/krest.png" class="krest">
                <h1 class="pppp10 fonsize">Заявка №325478</h1>
                <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                <div>
                    <div class="flex">
                        <h1 class="fonsize-slim2 mr30">Начальная стоимость</h1>
                        <h1 class="data0103 asdd">18 000 ₽</h1>
                    </div>
                    <div class="flex">
                        <h1 class="fonsize-slim2 mar30 mr30">Информация о товаре</h1>
                        <h2 class="mar0 mar30"><span class="fonsize-slim2">Диагональ/разрешение</span> <span
                            class="data0103">15.6"/1920х1080 пикс.</span><br>
                            <span class="fonsize-slim2">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                            <span class="fonsize-slim2">Оперативная память (RAM)</span> <span
                                class="data0103">4 ГБ</span><br>
                            <span class="fonsize-slim2">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                            <span class="fonsize-slim2">ОбЪем HDD</span> <span class="data0103">500 ГБ</span></h2>
                    </div>
                    <div class="flex mt30">
                        <h1 class="fonsize-slim2 mr30 w228">Доставка</h1>
                        <h2 class="ylica2">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                    </div>
                    <div class="flex mt30">
                        <h1 class="fonsize-slim2 mr30">Добавить комментарий</h1>
                        <div>
                            <input type="text" class="lasttext mt0">
                            <button class="aswb data0103">СОХРАНИТЬ</button>
                            <button class="asb data0103 pofigy">НАЧАТЬ ТОРГИ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="popup-6">
                <div class="popup-66">
                <div class="body">

                    <img src="./img/krest.png" class="krest">
                    <h1 class="pppp10 fonsize">Заявка №325478</h1>
                    <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                    <div class="flex">
                        <div class="tar2">
                            <h1 class="fonsize-slim2">Начальная стоимость</h1>
                            <h1 class="fonsize-slim2 mar30">Информация о товаре</h1>
                            <h1 class="fonsize-slim2 mat192">Доставка</h1>
                            <h1 class="fonsize-slim2 mar30">Добавить комментарий</h1>
                        </div>
                        <div class="wid70">
                            <h1 class="data0103 asdd">18 000 ₽</h1>
                            <h2 class="mar0 mar30"><span class="fonsize-slim2">Диагональ/разрешение</span> <span class="data0103">15.6"/1920х1080 пикс.</span><br>
                                <span class="fonsize-slim2">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                <span class="fonsize-slim2">Оперативная память (RAM)</span> <span class="data0103">4 ГБ</span><br>
                                <span class="fonsize-slim2">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                                <span class="fonsize-slim2">ОбЪем HDD</span> <span class="data0103">500 ГБ</span></h2>
                                <h2 class="ylica2 mar50">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                                <input type="text" class="lasttext">
                        </div>
                    </div>
                </div>
                </div>
            </div>-->
    <div class="popup-7">
        <div class="popup-77">
            <div class="body">
                <img src="./img/krest.png" class="krest">
                <h1 class="pppp10 fonsize">Заявка №325478</h1>
                <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                <div class="jcc">
                    <div style="width: 720px;">
                        <div>
                            <div class="flex mar50">
                                <h1 class="fonsize-slim2 tar2">Начальная стоимость</h1>
                                <h1 class="data0103 asdd">18 000 ₽</h1>
                            </div>
                            <div class="flex mar30">
                                <h1 class="fonsize-slim2 tar2">Информация о товаре</h1>
                                <h2 class="mar0"><span class="fonsize-slim2">Диагональ/разрешение</span> <span
                                    class="data0103">15.6"/1920х1080 пикс.</span><br>
                                    <span class="fonsize-slim2">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                    <span class="fonsize-slim2">Оперативная память (RAM)</span> <span
                                        class="data0103">4 ГБ</span><br>
                                    <span class="fonsize-slim2">Графический контроллер</span> <span
                                        class="data0103">GeForce 810M 2ГБ</span><br>
                                    <span class="fonsize-slim2">ОбЪем HDD</span> <span
                                        class="data0103">500 ГБ</span></h2>
                            </div>
                            <div class="flex mar30">
                                <h1 class="fonsize-slim2 tar2 w120">Доставка</h1>
                                <h2 class="ylica2 lh20">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                            </div>
                            <div class="flex mar30">
                                <h1 class="fonsize-slim2 tar3">Отклики продавцов</h1>
                                <div>
                                    <div>
                                        <button class="ded fg12"><span class="data0103">М.Видео</span></button>
                                        <button class="ded"><span class="data0103">Ситилинк</span></button>
                                    </div>
                                    <div>
                                        <button class="ded fg12"><span class="data0103">Эльдорадо</span></button>
                                        <button class="ded"><span class="data0103">Online</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="asb data0103 mar30 marginright pofigy">НАЧАТЬ ТОРГИ</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="popup-8">
        <div class="popup-88">
            <div class="body">
                <img src="./img/krest.png" class="krest">
                <h1 class="pppp10 fonsize">АУКЦИОН №325478</h1>
                <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                <div class="flex88">
                    <div class="jcc">
                        <div>
                            <div class="flex mt30">
                                <h1 class="fonsize-slim2 tar2 marleft">Информация о товаре</h1>
                                <h2 class="mmm"><span class="fonsize-slim2 asdwg">Диагональ/разрешение</span> <span
                                    class="data0103">15.6"/1920х1080 пикс.</span><br>
                                    <span class="fonsize-slim2 asdwg">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                    <span class="fonsize-slim2 asdwg">Оперативная память (RAM)</span> <span
                                        class="data0103">4 ГБ</span><br>
                                    <span class="fonsize-slim2 asdwg">Графический контроллер</span> <span
                                        class="data0103">GeForce 810M 2ГБ</span><br>
                                    <span class="fonsize-slim2 asdwg">ОбЪем HDD</span> <span
                                        class="data0103">500 ГБ</span></h2>
                            </div>
                            <div class="flex mar30">
                                <h1 class="fonsize-slim2 tar2 marleft">Начальная стоимость</h1>
                                <h1 class="data0103 mt3">18 000₽</h1>
                            </div>
                            <div class="flex mar30">
                                <h1 class="fonsize-slim2 tar2">Предложения продавцов</h1>
                                <div>
                                    <div>
                                        <button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span
                                            class="flexaround"><h1 class="data0103">М.Видео</h1><h1 class="data0103">17 900₽</h1></span>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span
                                            class="flexaround"><h1 class="data0103">Ситилинк</h1><h1 class="data0103">17 900₽</h1></span>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span
                                            class="flexaround"><h1 class="data0103">Эльдорадо</h1><h1 class="data0103">17 900₽</h1></span>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span
                                            class="flexaround"><h1 class="data0103">Online</h1><h1 class="data0103">17 900₽</h1></span>
                                        </button>
                                    </div>
                                    <button class="but mar30"><span class="data0103">ЗАВЕРШИТЬ АУКЦИОН</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-10">
        <div class="popup-100">
            <div class="body">
                <img src="./img/krest.png" class="krest">
                <h1 class="pppp10 fonsize">АУКЦИОН №325478</h1>
                <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                <div class="jcc mt50">
                    <div>
                        <div class="flex">
                            <h1 class="fonsize-slim2 tar2">Информация о товаре</h1>
                            <h2 class="mmm"><span class="fonsize-slim2 asdwg">Диагональ/разрешение</span> <span
                                class="data0103">15.6"/1920х1080 пикс.</span><br>
                                <span class="fonsize-slim2 asdwg">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                <span class="fonsize-slim2 asdwg">Оперативная память (RAM)</span> <span
                                    class="data0103">4 ГБ</span><br>
                                <span class="fonsize-slim2 asdwg">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                                <span class="fonsize-slim2 asdwg">ОбЪем HDD</span> <span class="data0103">500 ГБ</span>
                            </h2>
                        </div>
                        <div class="flex mar30">
                            <h1 class="fonsize-slim2 tar2 mar30 asasas">Сообщения</h1>
                            <div>
                                <input type="text" class="lasttext">
                                <button class="asb data0109 mar50">ЗАВЕРШИТЬ АУКЦИОН</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-20">
        <div class="popup_22">
            <img src="./img/krest.png" class="krest">
            <div class="body">
                <div class="flexgkyuk"><h1 class="pppp">ФИЛЬТРЫ</h1>
                </div>
                <h1 class="pppp67k">Введите модель техники, которую Вы ищете, или воспользуйтесь нашими умными фильтрами
                    ниже</h1>
                <div class="flex asw">
                    <input type="text" placeholder="Введите модель техники..." class="text-popup">
                    <img src="./img/lypa.png" class="lypa">
                    <button class="button-filtr"><h1 class="pppp2">ИСКАТЬ</h1></button>
                </div>
                <div class="flexjkh">
                    <h1 class="ppppp">Холодильники</h1>
                    <h1 class="ppppp6578">Ноутбуки</h1>
                    <h1 class="ppppp9009">Пылесосы</h1>
                </div>
                <div class="flexjkh">
                    <h1 class="ppppp">Телевизоры</h1>
                    <h1 class="ppppp">Смартфоны</h1>
                    <h1 class="ppppp">Стиральные машины</h1>
                </div>
                <div class="FLEX5">

                </div>
                <div class="flexjkh">
                    <div>
                        <h1 class="pppp">Диагональ</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">23”–24” (58 см–60см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">30”–32” (76 см–81см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">40”–43” (101 см–109см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">49”–55” (127 см–139см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">60”–70” (152 см–178см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">70”–80” (178 см–203см)</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                    <div>
                        <h1 class="pppp90">Цвет</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Белый</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Серебристый</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Черный</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Серый</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                    <div>
                        <h1 class="pppp">Диагональ</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">23”–24” (58 см–60см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">30”–32” (76 см–81см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">40”–43” (101 см–109см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">49”–55” (127 см–139см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">60”–70” (152 см–178см)</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">70”–80” (178 см–203см)</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                </div>
                <div class="flexbetweenn2">
                    <div>
                        <h1 class="pppp">Бренд</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">LG</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Samsung</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">SONY</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">TCL</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">BBK</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">XIAOMI</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                    <div>
                        <h1 class="pppp">Бренд</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">LG</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Samsung</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">SONY</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">TCL</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">BBK</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">XIAOMI</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                    <div>
                        <h1 class="pppp">Бренд</h1>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">LG</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">Samsung</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">SONY</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">TCL</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">BBK</p></div>
                        <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ">
                            <p class="p">XIAOMI</p></div>
                        <h1 class="ppppp">Показать все ></h1>
                    </div>
                </div>
                <div class="FLEX5 ai fmtp">
                    <h1 class="ppppp10">Очистить все фильтры</h1>
                    <div class="flexvbn">
                        <button class="button-nc"><span class="pppp">НАЧАТЬ ПОИСК</span></button>
                    </div>
                    <h1 class="colwhi">Очистить все фильтры</h1>
                </div>
            </div>
        </div>
        <div class="popup-3">
            <div class="popup_33">
                <img src="./img/krest.png" class="krest">
                <div class="body0">
                    <div class="flexdddd">
                        <div class="flex">
                            <input type="text" placeholder="Введите модель техники..." class="text-popup plac">
                            <img src="./img/lypa.png" class="lypa">
                            <button class="button-filtr"><h1 class="pppp2">ИСКАТЬ</h1></button>
                        </div>
                    </div>
                    <h1 class="pppp22">Результаты поиска</h1>

                    <div class="flex1000proc">
                        <div class="box-mini">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/super.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/sitiling.png" class="sitiling"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela"><span class="pppp">хочу дешевле</span></button>
                        </div>
                        <div class="box-mini2">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/analog.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/Mvideo.png" class="Mvideo"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela2"><span class="pppp">хочу дешевле</span></button>
                        </div>
                        <div class="box-mini3">
                            <div class="dsa">
                                <div class="box-img"></div>
                                <img src="./img/analog.png" class="size50">
                            </div>
                            <h1 class="pppp10">Ноутбук ASUS VivoBook Max X541NC-DM114T</h1>
                            <div class="set"><img src="./img/eldorado.png" class="eldorado"></div>
                            <div class="FLEX6">
                                <h1 class="akty">Актуальная<br>текущая цена</h1>
                                <a href="#" class="cena">20 000 ₽</a>
                            </div>
                            <button class="sela3"><span class="pppp">хочу дешевле</span></button>
                        </div>
                    </div>
                    <h2 class="we">Вы можете запросить готовность участия продавцов в аукционе по всем найденным
                        моделям, но запустить аукцион сможете только по одной выбранной модели. Если результат поиска
                        вас не устраивает, повторите поиск, воспользовавшись фильтрами.<br><br>Запустите аукцион с одним
                        из предложенных вариантов. Если результат поиска вас не устраивает, воспользуйтесь фильтрами.
                        Для запуска аукциона ваш лицевой счет должен быть пополнен на сумму не менее </h2>
                </div>
            </div>
        </div>
    </div>
        <div class="popup-city-2">
            <div class="popup-city" id="modal_cinw_ctnr">
                <div class="body-city">
                    <div class="header-city">
                        <div class="header-min">
                            <img src="./img/krest.png" class="krest">
                            <img src="./img/logo1.png" class="sizelog">
                            <div class="wid75">
                                <input type="input" placeholder="Введите название города" class="input-city">
                                <img src="./img/lypa.png" class="lypa3">
                                <hr class="hr-city">
                            </div>
                        </div>
                    </div>
                    <div class="flex mar50 flex-wrap pb40">
                        <ul class="ul">
                            <li class="li-1" style="list-style-type: none;"><a class="li">Москва</a></li>
                            <li class="li-1"><a class="li">Санкт-Петербург</a></li>
                            <li class="li-1"><a class="li">Воронеж</a></li>
                            <li class="li-1"><a class="li">Волгоград</a></li>
                            <li class="li-1"><a class="li">Екатеринбург</a></li>
                            <li class="li-1"><a class="li">Казань</a></li>
                            <li class="li-1"><a class="li">Красноярск</a></li>
                            <li class="li-1"><a class="li">Новосибирск</a></li>
                            <li class="li-1"><a class="li">Нижний Новгород</a></li>
                            <li class="li-1"><a class="li">Омск</a></li>
                            <li class="li-1"><a class="li">Пермь</a></li>
                            <li class="li-1"><a class="li">Ростов-на-Дону</a></li>
                            <li class="li-1"><a class="li">Самара</a></li>
                            <li class="li-1"><a class="li">Челябинск</a></li>
                            <li class="li-1"><a class="li">Уфа</a></li>
                        </ul>
                    </div>
                    <div class="flex-city">
                        <div class="city-div">
                            <h1 class="city-key">А</h1>
                            <ul>
                                <li class="mart"><a class="city">Абакан</a></li>
                                <li class="mart"><a class="city">Адлер</a></li>
                                <li class="mart"><a class="city">Азнакаево</a></li>
                                <li class="mart"><a class="city">Азов</a></li>
                                <li class="mart"><a class="city">Алатырь</a></li>
                                <li class="mart"><a class="city">Александровское</a></li>
                                <li class="mart"><a class="city">Алексеевка</a></li>
                                <li class="mart"><a class="city">Алексеевское</a></li>
                                <li class="mart"><a class="city">Алексин</a></li>
                                <li class="mart"><a class="city">Альметьевск</a></li>
                                <li class="mart"><a class="city">Анапа</a></li>
                                <li class="mart"><a class="city">Ангарск</a></li>
                                <li class="mart"><a class="city">Апатиты</a></li>
                                <li class="mart"><a class="city">Апрелевка</a></li>
                                <li class="mart"><a class="city">Арамиль</a></li>
                                <li class="mart"><a class="city">Арзамас</a></li>
                                <li class="mart"><a class="city">Арзгир</a></li>
                                <li class="mart"><a class="city">Армавир</a></li>
                                <li class="mart"><a class="city">Арск</a></li>
                                <li class="mart"><a class="city">Архангельск</a></li>
                                <li class="mart"><a class="city">Асбест</a></li>
                                <li class="mart"><a class="city">Астрахань</a></li>
                                <li class="mart"><a class="city">Аткарск</a></li>
                                <li class="mart"><a class="city">Ахтубинск</a></li>
                                <li class="mart"><a class="city">Ачинск</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Б</h1>
                                <li class="mart"><a class="city">Бавлы</a></li>
                                <li class="mart"><a class="city">Баксан</a></li>
                                <li class="mart"><a class="city">Балаково</a></li>
                                <li class="mart"><a class="city">Балахна</a></li>
                                <li class="mart"><a class="city">Балашиха</a></li>
                                <li class="mart"><a class="city">Балашов</a></li>
                                <li class="mart"><a class="city">Барнаул</a></li>
                                <li class="mart"><a class="city">Батайск</a></li>
                                <li class="mart"><a class="city">Безенчук</a></li>
                                <li class="mart"><a class="city">Белая Калитва</a></li>
                                <li class="mart"><a class="city">Белгород</a></li>
                                <li class="mart"><a class="city">Белебей</a></li>
                                <li class="mart"><a class="city">Белорецк</a></li>
                                <li class="mart"><a class="city">Белореченск</a></li>
                                <li class="mart"><a class="city">Бердск</a></li>
                                <li class="mart"><a class="city">Березники</a></li>
                                <li class="mart"><a class="city">Березовский</a></li>
                                <li class="mart"><a class="city">Беслан</a></li>
                                <li class="mart"><a class="city">Бийск</a></li>
                                <li class="mart"><a class="city">Бирск</a></li>
                                <li class="mart"><a class="city">Благовещенск</a></li>
                                <li class="mart"><a class="city">Благодарный</a></li>
                                <li class="mart"><a class="city">Боброво</a></li>
                                <li class="mart"><a class="city">Богородицк</a></li>
                                <li class="mart"><a class="city">Богородск</a></li>
                                <li class="mart"><a class="city">Бор</a></li>
                                <li class="mart"><a class="city">Борисоглебск</a></li>
                                <li class="mart"><a class="city">Боровичи</a></li>
                                <li class="mart"><a class="city">Бронницы</a></li>
                                <li class="mart"><a class="city">Брянск</a></li>
                                <li class="mart"><a class="city">Бугульма</a></li>
                                <li class="mart"><a class="city">Бугуруслан</a></li>
                                <li class="mart"><a class="city">Буденновск</a></li>
                                <li class="mart"><a class="city">Бузулук</a></li>
                                <li class="mart"><a class="city">Бутово</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">В</h1>
                                <li class="mart"><a class="city">Валуйки</a></li>
                                <li class="mart"><a class="city">Великий Новгород</a></li>
                                <li class="mart"><a class="city">Верхнеуральск</a></li>
                                <li class="mart"><a class="city">Верхняя Пышма</a></li>
                                <li class="mart"><a class="city">Верхняя Салда</a></li>
                                <li class="mart"><a class="city">Веселый</a></li>
                                <li class="mart"><a class="city">Вешенская</a></li>
                                <li class="mart"><a class="city">Видное</a></li>
                                <li class="mart"><a class="city">Вичуга</a></li>
                                <li class="mart"><a class="city">Владикавказ</a></li>
                                <li class="mart"><a class="city">Владимир</a></li>
                                <li class="mart"><a class="city">Внуково</a></li>
                                <li class="mart"><a class="city">Волгоград</a></li>
                                <li class="mart"><a class="city">Волгодонск</a></li>
                                <li class="mart"><a class="city">Волжск</a></li>
                                <li class="mart"><a class="city">Волжский</a></li>
                                <li class="mart"><a class="city">Вологда</a></li>
                                <li class="mart"><a class="city">Волоколамск</a></li>
                                <li class="mart"><a class="city">Волхов</a></li>
                                <li class="mart"><a class="city">Вольск</a></li>
                                <li class="mart"><a class="city">Воронеж</a></li>
                                <li class="mart"><a class="city">Ворсма</a></li>
                                <li class="mart"><a class="city">Воскресенск</a></li>
                                <li class="mart"><a class="city">Воткинск</a></li>
                                <li class="mart"><a class="city">Всеволожск</a></li>
                                <li class="mart"><a class="city">Выборг</a></li>
                                <li class="mart"><a class="city">Выкса</a></li>
                                <li class="mart"><a class="city">Вышний Волочек</a></li>
                                <li class="mart"><a class="city">Вязники</a></li>
                                <li class="mart"><a class="city">Вязьма</a></li>
                                <li class="mart"><a class="city">Вятские Поляны</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Г</h1>
                                <li class="mart"><a class="city">Гатчина</a></li>
                                <li class="mart"><a class="city">Геленджик</a></li>
                                <li class="mart"><a class="city">Георгиевск</a></li>
                                <li class="mart"><a class="city">Глазов</a></li>
                                <li class="mart"><a class="city">Горно-Алтайск</a></li>
                                <li class="mart"><a class="city">Городец</a></li>
                                <li class="mart"><a class="city">Гороховец</a></li>
                                <li class="mart"><a class="city">Горячий Ключ</a></li>
                                <li class="mart"><a class="city">Грязи</a></li>
                                <li class="mart"><a class="city">Губкин</a></li>
                                <li class="mart"><a class="city">Гуково</a></li>
                                <li class="mart"><a class="city">Гусь-Хрустальный</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Д</h1>
                                <li class="mart"><a class="city">Данков</a></li>
                                <li class="mart"><a class="city">Дедовск</a></li>
                                <li class="mart"><a class="city">Дзержинск</a></li>
                                <li class="mart"><a class="city">Дзержинский</a></li>
                                <li class="mart"><a class="city">Дивеево</a></li>
                                <li class="mart"><a class="city">Дивное</a></li>
                                <li class="mart"><a class="city">Димитровград</a></li>
                                <li class="mart"><a class="city">Дмитров</a></li>
                                <li class="mart"><a class="city">Добрянка</a></li>
                                <li class="mart"><a class="city">Долгопрудный</a></li>
                                <li class="mart"><a class="city">Домодедово</a></li>
                                <li class="mart"><a class="city">Донецк</a></li>
                                <li class="mart"><a class="city">Донское</a></li>
                                <li class="mart"><a class="city">Донской</a></li>
                                <li class="mart"><a class="city">Дубна</a></li>
                                <li class="mart"><a class="city">Дубовка</a></li>
                                <li class="mart"><a class="city">Дюртюли</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Е</h1>
                                <li class="mart"><a class="city">Егорьевск</a></li>
                                <li class="mart"><a class="city">Ейск</a></li>
                                <li class="mart"><a class="city">Екатеринбург</a></li>
                                <li class="mart"><a class="city">Елабуга</a></li>
                                <li class="mart"><a class="city">Елань</a></li>
                                <li class="mart"><a class="city">Елец</a></li>
                                <li class="mart"><a class="city">Енотаевка</a></li>
                                <li class="mart"><a class="city">Ершов</a></li>
                                <li class="mart"><a class="city">Ессентуки</a></li>
                                <li class="mart"><a class="city">Ефремов</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ж</h1>
                                <li class="mart"><a class="city">Железноводск</a></li>
                                <li class="mart"><a class="city">Железногорск (Красноярский край)</a></li>
                                <li class="mart"><a class="city">Железногорск (Курская область)</a></li>
                                <li class="mart"><a class="city">Жердевка</a></li>
                                <li class="mart"><a class="city">Жигулевск</a></li>
                                <li class="mart"><a class="city">Жирновск</a></li>
                                <li class="mart"><a class="city">Жуковский</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">З</h1>
                                <li class="mart"><a class="city">Заволжье</a></li>
                                <li class="mart"><a class="city">Задонск</a></li>
                                <li class="mart"><a class="city">Заречный</a></li>
                                <li class="mart"><a class="city">Засечное</a></li>
                                <li class="mart"><a class="city">Звенигород</a></li>
                                <li class="mart"><a class="city">Зеленогорск</a></li>
                                <li class="mart"><a class="city">Зеленоград</a></li>
                                <li class="mart"><a class="city">Зеленодольск</a></li>
                                <li class="mart"><a class="city">Зеленокумск</a></li>
                                <li class="mart"><a class="city">Зерноград</a></li>
                                <li class="mart"><a class="city">Зимовники</a></li>
                                <li class="mart"><a class="city">Златоуст</a></li>
                                <li class="mart"><a class="city">Знаменск</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">И</h1>
                                <li class="mart"><a class="city">Ибреси</a></li>
                                <li class="mart"><a class="city">Иваново</a></li>
                                <li class="mart"><a class="city">Ивантеевка</a></li>
                                <li class="mart"><a class="city">Ижевск</a></li>
                                <li class="mart"><a class="city">Изобильный</a></li>
                                <li class="mart"><a class="city">Иловля</a></li>
                                <li class="mart"><a class="city">Ильинский</a></li>
                                <li class="mart"><a class="city">Ипатово</a></li>
                                <li class="mart"><a class="city">Иркутск</a></li>
                                <li class="mart"><a class="city">Искитим</a></li>
                                <li class="mart"><a class="city">Истра</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Й</h1>
                                <li class="mart"><a class="city">Йошкар-Ола</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">К</h1>
                                <li class="mart"><a class="city">Казань</a></li>
                                <li class="mart"><a class="city">Калач-на-Дону</a></li>
                                <li class="mart"><a class="city">Калининск</a></li>
                                <li class="mart"><a class="city">Калуга</a></li>
                                <li class="mart"><a class="city">Каменка</a></li>
                                <li class="mart"><a class="city">Каменск-Уральский</a></li>
                                <li class="mart"><a class="city">Каменск-Шахтинский</a></li>
                                <li class="mart"><a class="city">Камызяк</a></li>
                                <li class="mart"><a class="city">Камышин</a></li>
                                <li class="mart"><a class="city">Канаш</a></li>
                                <li class="mart"><a class="city">Кандалакша</a></li>
                                <li class="mart"><a class="city">Каневская</a></li>
                                <li class="mart"><a class="city">Канск</a></li>
                                <li class="mart"><a class="city">Карачев</a></li>
                                <li class="mart"><a class="city">Карталы</a></li>
                                <li class="mart"><a class="city">Качканар</a></li>
                                <li class="mart"><a class="city">Кашира</a></li>
                                <li class="mart"><a class="city">Кемерово</a></li>
                                <li class="mart"><a class="city">Кингисепп</a></li>
                                <li class="mart"><a class="city">Кинель</a></li>
                                <li class="mart"><a class="city">Кинешма</a></li>
                                <li class="mart"><a class="city">Кириши</a></li>
                                <li class="mart"><a class="city">Киров</a></li>
                                <li class="mart"><a class="city">Кирово-Чепецк</a></li>
                                <li class="mart"><a class="city">Киселевск</a></li>
                                <li class="mart"><a class="city">Кисловодск</a></li>
                                <li class="mart"><a class="city">Клин</a></li>
                                <li class="mart"><a class="city">Ковров</a></li>
                                <li class="mart"><a class="city">Коломна</a></li>
                                <li class="mart"><a class="city">Кольчугино</a></li>
                                <li class="mart"><a class="city">Коммунарка</a></li>
                                <li class="mart"><a class="city">Кондопога</a></li>
                                <li class="mart"><a class="city">Константиновск</a></li>
                                <li class="mart"><a class="city">Копейск</a></li>
                                <li class="mart"><a class="city">Кореновск</a></li>
                                <li class="mart"><a class="city">Коркино</a></li>
                                <li class="mart"><a class="city">Королев</a></li>
                                <li class="mart"><a class="city">Костомукша</a></li>
                                <li class="mart"><a class="city">Кострома</a></li>
                                <li class="mart"><a class="city">Котельники</a></li>
                                <li class="mart"><a class="city">Котельниково</a></li>
                                <li class="mart"><a class="city">Котово</a></li>
                                <li class="mart"><a class="city">Котовск</a></li>
                                <li class="mart"><a class="city">Кочубеевское</a></li>
                                <li class="mart"><a class="city">Красноармейск</a></li>
                                <li class="mart"><a class="city">Красногвардейское</a></li>
                                <li class="mart"><a class="city">Красногорск</a></li>
                                <li class="mart"><a class="city">Краснодар</a></li>
                                <li class="mart"><a class="city">Краснокамск</a></li>
                                <li class="mart"><a class="city">Красноярск</a></li>
                                <li class="mart"><a class="city">Кропоткин</a></li>
                                <li class="mart"><a class="city">Крымск</a></li>
                                <li class="mart"><a class="city">Кстово</a></li>
                                <li class="mart"><a class="city">Кугеси</a></li>
                                <li class="mart"><a class="city">Кузнецк</a></li>
                                <li class="mart"><a class="city">Кукмор</a></li>
                                <li class="mart"><a class="city">Кулебаки</a></li>
                                <li class="mart"><a class="city">Кумертау</a></li>
                                <li class="mart"><a class="city">Кунгур</a></li>
                                <li class="mart"><a class="city">Курган</a></li>
                                <li class="mart"><a class="city">Курганинск</a></li>
                                <li class="mart"><a class="city">Курск</a></li>
                                <li class="mart"><a class="city">Курчатов</a></li>
                                <li class="mart"><a class="city">Куса</a></li>
                                <li class="mart"><a class="city">Кущевская</a></li>
                                <li class="mart"><a class="city">Кыштым</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Л</h1>
                                <li class="mart"><a class="city">Лабинск</a></li>
                                <li class="mart"><a class="city">Лебедянь</a></li>
                                <li class="mart"><a class="city">Ленинградская</a></li>
                                <li class="mart"><a class="city">Лениногорск</a></li>
                                <li class="mart"><a class="city">Ленинск</a></li>
                                <li class="mart"><a class="city">Ленинск-Кузнецкий</a></li>
                                <li class="mart"><a class="city">Ливны</a></li>
                                <li class="mart"><a class="city">Липецк</a></li>
                                <li class="mart"><a class="city">Лиски</a></li>
                                <li class="mart"><a class="city">Лобня</a></li>
                                <li class="mart"><a class="city">Ломоносов</a></li>
                                <li class="mart"><a class="city">Лопатино</a></li>
                                <li class="mart"><a class="city">Лосино-Петровский</a></li>
                                <li class="mart"><a class="city">Луга</a></li>
                                <li class="mart"><a class="city">Лысково</a></li>
                                <li class="mart"><a class="city">Лысьва</a></li>
                                <li class="mart"><a class="city">Лыткарино</a></li>
                                <li class="mart"><a class="city">Люберцы</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">м</h1>
                                <li class="mart"><a class="city">Магнитогорск</a></li>
                                <li class="mart"><a class="city">Майкоп</a></li>
                                <li class="mart"><a class="city">Маркс</a></li>
                                <li class="mart"><a class="city">Мелеуз</a></li>
                                <li class="mart"><a class="city">Миасс</a></li>
                                <li class="mart"><a class="city">Миллерово</a></li>
                                <li class="mart"><a class="city">Минеральные Воды</a></li>
                                <li class="mart"><a class="city">Михайловка</a></li>
                                <li class="mart"><a class="city">Михайловск</a></li>
                                <li class="mart"><a class="city">Мичуринск</a></li>
                                <li class="mart"><a class="city">Можайск</a></li>
                                <li class="mart"><a class="city">Моздок</a></li>
                                <li class="mart"><a class="city">Мончегорск</a></li>
                                <li class="mart"><a class="city">Морозовск</a></li>
                                <li class="mart"><a class="city">Моршанск</a></li>
                                <li class="mart"><a class="city">Москва</a></li>
                                <li class="mart"><a class="city">Московский</a></li>
                                <li class="mart"><a class="city">Мурманск</a></li>
                                <li class="mart"><a class="city">Муром</a></li>
                                <li class="mart"><a class="city">Мценск</a></li>
                                <li class="mart"><a class="city">Мытищи (Московская область)</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Н</h1>
                                <li class="mart"><a class="city">Набережные Челны</a></li>
                                <li class="mart"><a class="city">Навашино</a></li>
                                <li class="mart"><a class="city">Нальчик</a></li>
                                <li class="mart"><a class="city">Наро-Фоминск</a></li>
                                <li class="mart"><a class="city">Нарткала</a></li>
                                <li class="mart"><a class="city">Невинномысск</a></li>
                                <li class="mart"><a class="city">Нефтегорск</a></li>
                                <li class="mart"><a class="city">Нефтекамск</a></li>
                                <li class="mart"><a class="city">Нижнекамск</a></li>
                                <li class="mart"><a class="city">Нижний Ломов</a></li>
                                <li class="mart"><a class="city">Нижний Новгород</a></li>
                                <li class="mart"><a class="city">Нижний Тагил</a></li>
                                <li class="mart"><a class="city">Николаевск</a></li>
                                <li class="mart"><a class="city">Никольск</a></li>
                                <li class="mart"><a class="city">Новоалександровск</a></li>
                                <li class="mart"><a class="city">Новоалтайск</a></li>
                                <li class="mart"><a class="city">Новоаннинский</a></li>
                                <li class="mart"><a class="city">Нововоронеж</a></li>
                                <li class="mart"><a class="city">Новокузнецк</a></li>
                                <li class="mart"><a class="city">Новокуйбышевск</a></li>
                                <li class="mart"><a class="city">Новомосковск</a></li>
                                <li class="mart"><a class="city">Новониколаевский</a></li>
                                <li class="mart"><a class="city">Новороссийск</a></li>
                                <li class="mart"><a class="city">Новосибирск</a></li>
                                <li class="mart"><a class="city">Новотроицк</a></li>
                                <li class="mart"><a class="city">Новочебоксарск</a></li>
                                <li class="mart"><a class="city">Новочеркасск</a></li>
                                <li class="mart"><a class="city">Новошахтинск</a></li>
                                <li class="mart"><a class="city">Ногинск</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">О</h1>
                                <li class="mart"><a class="city">Обливская</a></li>
                                <li class="mart"><a class="city">Обнинск</a></li>
                                <li class="mart"><a class="city">Одинцово</a></li>
                                <li class="mart"><a class="city">Озерск</a></li>
                                <li class="mart"><a class="city">Октябрьск</a></li>
                                <li class="mart"><a class="city">Омск</a></li>
                                <li class="mart"><a class="city">Оренбург</a></li>
                                <li class="mart"><a class="city">Орехово-Зуево</a></li>
                                <li class="mart"><a class="city">Орловский</a></li>
                                <li class="mart"><a class="city">Орёл</a></li>
                                <li class="mart"><a class="city">Острогожск</a></li>
                                <li class="mart"><a class="city">Отрадный</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">П</h1>
                                <li class="mart"><a class="city">Павлово</a></li>
                                <li class="mart"><a class="city">Павловская</a></li>
                                <li class="mart"><a class="city">Павловский Посад</a></li>
                                <li class="mart"><a class="city">Палласовка</a></li>
                                <li class="mart"><a class="city">Пенза</a></li>
                                <li class="mart"><a class="city">Первоуральск</a></li>
                                <li class="mart"><a class="city">Пермь</a></li>
                                <li class="mart"><a class="city">Петровск</a></li>
                                <li class="mart"><a class="city">Петрозаводск</a></li>
                                <li class="mart"><a class="city">Подольск</a></li>
                                <li class="mart"><a class="city">Подрезково</a></li>
                                <li class="mart"><a class="city">Полярные Зори</a></li>
                                <li class="mart"><a class="city">Похвистнево</a></li>
                                <li class="mart"><a class="city">Преображенская</a></li>
                                <li class="mart"><a class="city">Приволжск</a></li>
                                <li class="mart"><a class="city">Приволжский</a></li>
                                <li class="mart"><a class="city">Приморско-Ахтарск</a></li>
                                <li class="mart"><a class="city">Прокопьевск</a></li>
                                <li class="mart"><a class="city">Пролетарск</a></li>
                                <li class="mart"><a class="city">Протвино</a></li>
                                <li class="mart"><a class="city">Прохладный</a></li>
                                <li class="mart"><a class="city">Псков</a></li>
                                <li class="mart"><a class="city">Пугачев</a></li>
                                <li class="mart"><a class="city">Путилково</a></li>
                                <li class="mart"><a class="city">Пушкин</a></li>
                                <li class="mart"><a class="city">Пушкино</a></li>
                                <li class="mart"><a class="city">Пущино</a></li>
                                <li class="mart"><a class="city">Пятигорск</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Р</h1>
                                <li class="mart"><a class="city">Раменское</a></li>
                                <li class="mart"><a class="city">Рассказово</a></li>
                                <li class="mart"><a class="city">Реутов</a></li>
                                <li class="mart"><a class="city">Ржев</a></li>
                                <li class="mart"><a class="city">Родники</a></li>
                                <li class="mart"><a class="city">Россошь</a></li>
                                <li class="mart"><a class="city">Ростов</a></li>
                                <li class="mart"><a class="city">Ростов-на-Дону</a></li>
                                <li class="mart"><a class="city">Ртищево</a></li>
                                <li class="mart"><a class="city">Рубцовск</a></li>
                                <li class="mart"><a class="city">Рудня</a></li>
                                <li class="mart"><a class="city">Рыбинск</a></li>
                                <li class="mart"><a class="city">Рязановское</a></li>
                                <li class="mart"><a class="city">Рязань</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">С</h1>
                                <li class="mart"><a class="city">Салават</a></li>
                                <li class="mart"><a class="city">Сальск</a></li>
                                <li class="mart"><a class="city">Самара</a></li>
                                <li class="mart"><a class="city">Санкт-Петербург</a></li>
                                <li class="mart"><a class="city">Саранск</a></li>
                                <li class="mart"><a class="city">Сарапул</a></li>
                                <li class="mart"><a class="city">Саратов</a></li>
                                <li class="mart"><a class="city">Саров</a></li>
                                <li class="mart"><a class="city">Сатка</a></li>
                                <li class="mart"><a class="city">Сафоново</a></li>
                                <li class="mart"><a class="city">Светлоград</a></li>
                                <li class="mart"><a class="city">Северодвинск</a></li>
                                <li class="mart"><a class="city">Семикаракорск</a></li>
                                <li class="mart"><a class="city">Сергиев Посад</a></li>
                                <li class="mart"><a class="city">Сердобск</a></li>
                                <li class="mart"><a class="city">Серов</a></li>
                                <li class="mart"><a class="city">Серпухов</a></li>
                                <li class="mart"><a class="city">Сертолово</a></li>
                                <li class="mart"><a class="city">Сибай</a></li>
                                <li class="mart"><a class="city">Славянск-на-Кубани</a></li>
                                <li class="mart"><a class="city">Смоленск</a></li>
                                <li class="mart"><a class="city">Снежинск</a></li>
                                <li class="mart"><a class="city">Соликамск</a></li>
                                <li class="mart"><a class="city">Солнечногорск</a></li>
                                <li class="mart"><a class="city">Сосновый Бор</a></li>
                                <li class="mart"><a class="city">Сочи</a></li>
                                <li class="mart"><a class="city">Ставрополь</a></li>
                                <li class="mart"><a class="city">Староминская</a></li>
                                <li class="mart"><a class="city">Старый Оскол</a></li>
                                <li class="mart"><a class="city">Стерлитамак</a></li>
                                <li class="mart"><a class="city">Строитель</a></li>
                                <li class="mart"><a class="city">Ступино</a></li>
                                <li class="mart"><a class="city">Суровикино</a></li>
                                <li class="mart"><a class="city">Суходол</a></li>
                                <li class="mart"><a class="city">Сызрань</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Т</h1>
                                <li class="mart"><a class="city">Таганрог</a></li>
                                <li class="mart"><a class="city">Тамбов</a></li>
                                <li class="mart"><a class="city">Тверь</a></li>
                                <li class="mart"><a class="city">Тейково</a></li>
                                <li class="mart"><a class="city">Тельмана</a></li>
                                <li class="mart"><a class="city">Темрюк</a></li>
                                <li class="mart"><a class="city">Тимашевск</a></li>
                                <li class="mart"><a class="city">Тихвин</a></li>
                                <li class="mart"><a class="city">Тихорецк</a></li>
                                <li class="mart"><a class="city">Тольятти</a></li>
                                <li class="mart"><a class="city">Томск</a></li>
                                <li class="mart"><a class="city">Торжок</a></li>
                                <li class="mart"><a class="city">Тосно</a></li>
                                <li class="mart"><a class="city">Троицк (Москва)</a></li>
                                <li class="mart"><a class="city">Троицк (Челябинская область)</a></li>
                                <li class="mart"><a class="city">Туапсе</a></li>
                                <li class="mart"><a class="city">Туймазы</a></li>
                                <li class="mart"><a class="city">Тула</a></li>
                                <li class="mart"><a class="city">Тюмень</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">У</h1>
                                <li class="mart"><a class="city">Углич</a></li>
                                <li class="mart"><a class="city">Удомля</a></li>
                                <li class="mart"><a class="city">Узловая</a></li>
                                <li class="mart"><a class="city">Улан-Удэ</a></li>
                                <li class="mart"><a class="city">Ульяновск</a></li>
                                <li class="mart"><a class="city">Усть-Донецкий</a></li>
                                <li class="mart"><a class="city">Усть-Лабинск</a></li>
                                <li class="mart"><a class="city">Уфа</a></li>
                                <li class="mart"><a class="city">Учалы</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ф</h1>
                                <li class="mart"><a class="city">Фролово</a></li>
                                <li class="mart"><a class="city">Фрязино</a></li>
                                <li class="mart"><a class="city">Фурманов</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Х</h1>
                                <li class="mart"><a class="city">Химки</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ц</h1>
                                <li class="mart"><a class="city">Цивильск</a></li>
                                <li class="mart"><a class="city">Цимлянск</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ч</h1>
                                <li class="mart"><a class="city">Чайковский</a></li>
                                <li class="mart"><a class="city">Чапаевск</a></li>
                                <li class="mart"><a class="city">Чебаркуль</a></li>
                                <li class="mart"><a class="city">Чебоксары</a></li>
                                <li class="mart"><a class="city">Челябинск</a></li>
                                <li class="mart"><a class="city">Чердаклы</a></li>
                                <li class="mart"><a class="city">Череповец</a></li>
                                <li class="mart"><a class="city">Черкесск</a></li>
                                <li class="mart"><a class="city">Чернышковский</a></li>
                                <li class="mart"><a class="city">Чехов</a></li>
                                <li class="mart"><a class="city">Чистополь</a></li>
                                <li class="mart"><a class="city">Чкаловск</a></li>
                                <li class="mart"><a class="city">Чусовой</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ш</h1>
                                <li class="mart"><a class="city">Шадринск</a></li>
                                <li class="mart"><a class="city">Шахты</a></li>
                                <li class="mart"><a class="city">Шебекино</a></li>
                                <li class="mart"><a class="city">Шелехов</a></li>
                                <li class="mart"><a class="city">Шумерля</a></li>
                                <li class="mart"><a class="city">Шуя</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Щ</h1>
                                <li class="mart"><a class="city">Щекино</a></li>
                                <li class="mart"><a class="city">Щелково</a></li>
                                <li class="mart"><a class="city">Щербинка</a></li>
                                <li class="mart"><a class="city">Щёлково</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Э</h1>
                                <li class="mart"><a class="city">Электросталь</a></li>
                                <li class="mart"><a class="city">Электроугли</a></li>
                                <li class="mart"><a class="city">Элиста</a></li>
                                <li class="mart"><a class="city">Энгельс</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Ю</h1>
                                <li class="mart"><a class="city">Южноуральск</a></li>
                                <li class="mart"><a class="city">Юрюзань</a></li>
                            </ul>
                        </div>
                        <div class="city-div">
                            <ul>
                                <h1 class="city-key">Я</h1>
                                <li class="mart"><a class="city">Ялуторовск</a></li>
                                <li class="mart"><a class="city">Ярославль</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="hr-bot">
                    <li class="lib"><a class="li-hr">— полноформатные магазины, в которых некоторые товары можно забрать в
                        день покупки.</a></li>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import JQuery from 'jquery'
import HeadComponent from "@/components/Templates/Header";
const $ = JQuery
window.$ = $


export default {
    name: "cabinet",
    components: {HeadComponent},
    data () {
        return {
            errors: [],
            name: '',
            surname: '',
            patronymic: '',
            telephone: '',
            email: '',
            password: '',
            repeatPassword: ''
        }
    },
    mounted() {

        $(function () {
            let header = $('.header-city');
            let hederHeight = header.height();

            $(window).scroll(function () {
                if ($(this).scrollTop() > 1) {
                    header.addClass('active');
                    $('.header-min').addClass('active');
                    $('body').css({
                        'paddingTop': hederHeight + 'px'
                    });
                } else {
                    header.removeClass('active');
                    $('.header-min').removeClass('active');
                    $('body').css({
                        'paddingTop': 0
                    })
                }
            });
        });
        $('.input-city').on('click', function () {
            $('.hr-city').addClass('active');
        });
        $('.flex200000').on('click', function () {
            $('.popup-city').addClass('active');
        });
        $('.flex200000').on('click', function () {
            $('.popup-city-2').addClass('active');
        });
        $('.button_2').on('click', function () {
            $('.popup_iner').addClass('active2');
        });
        $('.krest').on('click', function () {
            $('.popup-city').removeClass('active');
            $('.popup-city-2').removeClass('active');
        });

        $('.box-mini2').on('click', function () {
            $('.popup-4').addClass('active');
        });
        $('.box-mini3').on('click', function () {
            $('.popup-4').addClass('active');
        });
        $('.krest1').on('click', function () {
            $('.popup-4').removeClass('active');
        });

        $('.button-filtr').on('click', function () {
            $('.popup-3').addClass('active');
            $('.popup-20').removeClass('active');
        });

        $('.daiu').on('click', function () {
            $('.popup').addClass('active');
        });
        $('.rededal').on('click', function () {
            $('.popup').addClass('active');
        });
        $('.krest').on('click', function () {
            $('.popup').removeClass('active');
        });
        $('.krest').on('click', function () {
            $('.popup-3').removeClass('active');
        });
        $('.button-2').on('click', function () {
            $('.moi-zaiavki').addClass('active');
            $('.moi-dani').addClass('remove');
            $('.aktivnei_oykcion').removeClass('active');
            $('.izbranoe').removeClass('active');
            $('.purchase_history').removeClass('active');

            $('.button-1').removeClass('active')
            $('.button-2').addClass('active')
            $('.boxcifra8').addClass('active')
            $('.button-3').removeClass('active')
            $('.button-4').removeClass('active')
            $('.button-5').removeClass('active');
            $('.bodynomer1').removeClass('active')
        });

        $('.button-new').on('click', function () {
            $('.popup-20').addClass('active');
        });
        $('.data0100').on('click', function () {
            $('.popup-6').addClass('active');
        });
        $('.data0144').on('click', function () {
            $('.popup-7').addClass('active');
        });
        $('.podobrat').on('click', function () {
            $('.popup-20').addClass('active');
        });
        $('.podobrat2').on('click', function () {
            $('.popup-20').addClass('active');
        });
        $('.data1103').on('click', function () {
            $('.popup-8').addClass('active');
        });
        $('.data2103').on('click', function () {
            $('.popup-8').addClass('active');
        });
        $('.data3103').on('click', function () {
            $('.popup-6').addClass('active');
        });
        $('.krest').on('click', function () {
            $('.popup-2').removeClass('active');
            $('.popup-6').removeClass('active');
            $('.popup-7').removeClass('active');
            $('.popup-8').removeClass('active');
            $('.popup-20').removeClass('active');
            $('.popup-10').removeClass('active');
        });
        $('.mess').on('click', function () {
            $('.popup-10').addClass('active');
        });
        $('.pofigy').on('click', function () {
            $('.popup-8').addClass('active');
        });
        $('.button-1').on('click', function () {
            $('.moi-zaiavki').removeClass('active');
            $('.moi-dani').removeClass('remove');
            $('.bh1').addClass('active');
            $('.aktivnei_oykcion').removeClass('active');
            $('.izbranoe').removeClass('active');
            $('.purchase_history').removeClass('active');

            $('.button-1').addClass('active')
            $('.button-2').removeClass('active')
            $('.boxcifra8').removeClass('active')
            $('.button-3').removeClass('active')
            $('.button-4').removeClass('active')
            $('.button-5').removeClass('active');
            $('.bodynomer1').removeClass('active')
        });


        $('.krest').on('click', function () {
            $('.popup').removeClass('active');
        });


        $('.button-3').on('click', function () {
            $('.moi-zaiavki').removeClass('active');
            $('.moi-dani').addClass('remove');
            $('.aktivnei_oykcion').addClass('active');
            $('.izbranoe').removeClass('active');
            $('.purchase_history').removeClass('active');
            $('.button-1').removeClass('active')
            $('.button-2').removeClass('active')
            $('.boxcifra8').removeClass('active')
            $('.button-3').addClass('active')
            $('.button-4').removeClass('active')
            $('.button-5').removeClass('active');
            $('.bodynomer1').removeClass('active')
        });

        $('.button-4').on('click', function () {
            $('.moi-zaiavki').removeClass('active');
            $('.moi-dani').addClass('remove');
            $('.aktivnei_oykcion').removeClass('active');
            $('.izbranoe').addClass('active');
            $('.purchase_history').removeClass('active');
            $('.button-1').removeClass('active')
            $('.button-2').removeClass('active')
            $('.boxcifra8').removeClass('active')
            $('.button-3').removeClass('active')
            $('.button-4').addClass('active')
            $('.bodynomer1').addClass('active')
            $('.button-5').removeClass('active');
        });

        $('.button-5').on('click', function () {
            $('.moi-zaiavki').removeClass('active');
            $('.moi-dani').addClass('remove');
            $('.aktivnei_oykcion').removeClass('active');
            $('.izbranoe').removeClass('active');
            $('.purchase_history').addClass('active');
            $('.bodynomer1').removeClass('active')
            $('.button-1').removeClass('active')
            $('.button-2').removeClass('active')
            $('.boxcifra8').removeClass('active')
            $('.button-3').removeClass('active')
            $('.button-4').removeClass('active')
            $('.button-5').addClass('active');
        });
    },
    methods: {
        checkForm: function (e) {

            this.errors = [];

            if (this.name && (this.name.length < 2 || this.name.length > 20)) {
                this.errors.push('Некорреткно введено имя');
            }
            if (this.surname && (this.surname.length <= 3 || this.surname.length > 20)) {
                this.errors.push('Некорреткно введеная фамилия');
            }



            e.preventDefault();
        }
    }
}
</script>

<style scoped src="./assets/Styles.css"></style>
