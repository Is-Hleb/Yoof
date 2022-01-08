<template>
    <div>
        <div class="main_bloc">
            <img src="./img/heade.png" class="headepo">
            <div class="bodynomer1">
                <div class="flexbetweennomer1">
                    <h1 class="a">ЛИЧНЫЙ КАБИНЕТ</h1>
                    <div class="flexaling">
                        <div class="poptop">
                            <div class="flex">
                                <h1 class="a2">Мой баланс:</h1>
                                <span href="#" class="yelow">0</span><span class="yelow">₽</span>
                            </div>
                            <h1 class="a2 top" style="cursor: pointer"><span class="yelow">+</span> Пополнить баланс</h1>
                        </div>

                        <img class="img" src="./img/img.png">
                        <h1 class="a2">Иван</h1>
                        <h1 class="a3">Иванов</h1>
                        <img class="exit" src="./img/exit.png">
                    </div>
                </div>
                <div class="flexcenter">
                    <button class="button-1"
                            @click="navigator = 'myData'"
                            :class="{ active: navigator === 'myData' }"
                    ><span class="bh1 h1a">Мои данные</span></button>

                    <button class="button-2"
                            @click="navigator = 'myApplication'"
                            :class="{ active: navigator === 'myApplication' }"
                    ><span class="bh2 h1a" style="margin-right: 5px">Мои заявки </span>
                        <div class="boxcifra8" v-if="counterMyApplication > 0">{{ counterMyApplication }}</div>
                    </button>

                    <button class="button-3"
                            @click="navigator = 'activeAuctions'"
                            :class="{ active: navigator === 'activeAuctions' }"
                    ><span class="bh3 h1a">Активные аукционы</span></button>

                    <button class="button-4"
                            @click="navigator = 'favorites'"
                            :class="{ active: navigator === 'favorites' }"
                    ><span class="bh4 h1a">Избранное</span></button>

                    <button class="button-5"
                            @click="navigator = 'history'"
                            :class="{ active: navigator === 'history' }"
                    ><span class="bh5 h1a">История покупок</span></button>
                </div>

                <div class="moi-dani" v-if="navigator === 'myData'">
                    <div class="flexnomer1">
                        <div>
                            <div class="flex6661"><h1 class="h1_1">Имя</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Фамилия</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Отчество</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Телефон</h1><a-input type="tel" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Электронная почта</h1><a-input type="email" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Сменить пароль</h1><a-input-password type="password" class="input-pass" /></div>
                            <div class="flex1"><h1 class="h1_1">Повторить пароль</h1><a-input-password type="password" class="input-pass" /></div>
                            <div class="flexkyky"><a-button class="button1">СОХРАНИТЬ ИЗМЕНЕНИЯ</a-button></div>
                        </div>
                        <div class="adres">
                            <h1 class="h1a" style="text-align: left; margin-left: 5px;">Адреса доставки</h1>
                            <div class="papap" style="text-align: left">
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

                <div class="moi-zaiavki" v-if="navigator === 'myApplication'">

<!--                    <div class="bodynomer2">-->
<!--                        <div class="hr_big">-->
<!--                            <div class="flexaround">-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Номер заявки</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <div class="flex">-->
<!--                                        <img src="./img/boxgal.png" class="size2020">-->
<!--                                        <h1 class="data0100"><span class="color-zel">№325478</span> от<br>01.03.2021</h1>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Наименование товара</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <h1 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Текущая цена</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <h1 class="data0103">18 000₽</h1>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Статус</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <div class="flex">-->
<!--                                        <div class="boxcifra4">4</div>-->
<!--                                        <h1 class="data0144 color-zel">Посмотреть<br>отклики</h1>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Чат</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <div class="flex">-->
<!--                                        <div class="boxcifra4">2</div>-->
<!--                                        <h1 class="color-zel mess">Сообщения</h1>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Настройки</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <div>-->
<!--                                        <div class="flex"><img src="./img/ydal.png" class="size1419"><h1 class="ydal">Удалить</h1></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <h2 class="h8">Старт</h2>-->
<!--                                    <div class="mh45"></div>-->
<!--                                    <div class="flex pofigy">-->
<!--                                        <h1 class="data0103 color-zel">НАЧАТЬ<br>ТОРГИ</h1>-->
<!--                                        <img class="y" src="./img/y.png">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <hr class="hr_min">-->
<!--                            <div class="flexend">-->
<!--                                <button class="button-balanc"><span class="oioiio">ПОПОЛНИТЬ БАЛАНС</span></button>-->
<!--                                <button class="button-new"><span class="oioiio">СОЗДАТЬ НОВУЮ ЗАЯВКУ</span></button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="adap">-->
<!--                            <div class="bodyl">-->
<!--                                <div class="flex">-->
<!--                                    <div class="hr_big3 mr10">-->
<!--                                        <h2 class="h88">Номер заявки</h2>-->
<!--                                        <h2 class="h88">Наименование товара</h2>-->
<!--                                        <h2 class="h88">Текущая цена</h2>-->
<!--                                        <h2 class="h88">Статус</h2>-->
<!--                                        <h2 class="h88">Чат</h2>-->
<!--                                        <h2 class="h88">Настройки</h2>-->
<!--                                        <h2 class="h88 pd">Старт</h2>-->
<!--                                    </div>-->
<!--                                    <div class="ta">-->
<!--                                        <div class="flex pds">-->
<!--                                            <img src="./img/boxgal.png" class="size2020">-->
<!--                                            <h1 class="data0100"><span class="color-zel">№325478</span> от 01.03.2021</h1>-->
<!--                                        </div>-->
<!--                                        <h1 class="data0103 p10d">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>-->
<!--                                        <h1 class="data0103 p10d">18 000₽</h1>-->
<!--                                        <div class="flex p10d">-->
<!--                                            <div class="boxcifra4">4</div>-->
<!--                                            <h1 class="data0144 color-zel">Посмотреть отклики</h1>-->
<!--                                        </div>-->
<!--                                        <div class="flex p10d">-->
<!--                                            <div class="boxcifra4">2</div>-->
<!--                                            <h1 class="data0103 color-zel mess">Сообщения</h1>-->
<!--                                        </div>-->
<!--                                        <div class="p10d">-->
<!--                                            <div class="flex"><img src="./img/izmene.png" class="size17"><h1 class="rededal">Редактировать</h1></div>-->
<!--                                            <div class="flex"><img src="./img/ydal.png" class="size1419"><h1 class="rededal">Удалить</h1></div>-->
<!--                                        </div>-->
<!--                                        <div class="flex ppd">-->
<!--                                            <h1 class="data0106663 color-zel">НАЧАТЬ ТОРГИ</h1>-->
<!--                                            <img class="y" src="./img/y.png">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <hr class="hr_mini2">-->
<!--                                <div class="gsdg4e"><button class="button-balanc"><span class="oioiio">ПОПОЛНИТЬ БАЛАНС</span></button></div>-->
<!--                                <div class="dhdsg"><button class="button-new"><span class="oioiio">СОЗДАТЬ НОВУЮ ЗАЯВКУ</span></button></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>

                <div class="aktivnei_oykcion">
                    <div class="body203">
                        <div class="hr_big222">
                            <div class="flexaround">
                                <div>
                                    <h2 class="h8">Номер заявки</h2>
                                    <div class="mh45"></div>
                                    <h2 class="data1103">Аукцион <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
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
                                    <h2 class="data1103 pds">Аукцион <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
                                    <h2 class="data0103 ps20">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                                    <h1 class="data0103 p10d">18 000₽</h1>
                                    <div class="flex p10d">
                                        <div class="boxcifra4">4</div><h1 class="data2103 color-zel">Посмотреть отклики</h1>
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
                                    <h2 class="data31039">Заявка <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
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

                                <h2 class="data31039 posa">Заявка <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
                                <h2 class="data0103">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h2>
                                <h1 class="data0103 widt">17 200₽</h1>
                                <h1 class="data0106">PayPal</h1>
                                <div>
                                    <h1 class="data0103">Доставка</h1>
                                    <h2 class="ylica">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                                </div>


                                <h1 class="data0103 color-zel">Доставлен<br><span class="color-zel2">Отслеживание</span></h1>

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
                                    <h2 class="data31039 tal pds">Заявка <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
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
                                    <h2 class="data31039 tal pds">Заявка <span class="color-zel">№325478</span><br>от 01.03.2021</h2>
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
                    <img src="./img/logoYoofEnd (2).png" class="yoof-yelomhgl">
                    <div class="gdsfgs">
                        <h1 class="hh1">О сервисе</h1>
                        <div class="margin-bottom20"><a class="hh2">Как работает сервис?</a></div>
                        <div class="margin-bottom20"><a class="hh2">Правила использования</a></div>
                        <div class="margin-bottom20"><a class="hh2">Отзывы о нас</a></div>
                    </div>
                    <div class="nhgikk">
                        <h1 class="hh1">Контакты</h1>
                        <div class="flex margin-bottom20"><img src="./img/ins.png" class="wh22"><a class="hh2">Instagram</a></div>
                        <div class="flex margin-bottom20"><img src="./img/fac.png" class="wh22"><a class="hh2">Facebook</a></div>
                        <div class="flex margin-bottom20"><img src="./img/tel.png" class="wh22"><a class="hh2">Telegram</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'ant-design-vue/dist/antd.css'

export default  {
    data: () => ({
        navigator: 'myData',
        counterMyApplication: 2
    }),
}
</script>

<style scoped type="text/css">
@import "assets/StyleUserCabinet.css";
</style>
