<template>
    <div>
        <div class="main_bloc">
            <img src="./img/heade.png" class="sdfsdf78">
            <div class="body h0">
                <div class="flexbetwen">
                    <h1 class="a">ЛИЧНЫЙ КАБИНЕТ</h1>
                    <div class="flexaling">
                        <h1 class="a23" style="">Аккаунт</h1>
                        <a href="#" class="yelowasdf">АКТИВЕН</a>
                        <img class="imgasf" src="./img/Mvideo.png">
                        <h1 class="a2ads">ООО “М.Видео”</h1>
                        <img class="exit" src="./img/exit.png" style="cursor: pointer">
                    </div>
                </div>
                <div class="flexcenter">
                    <button class="button-1" :class="{active: navigator === 'dataCompany'}" @click="navigator = 'dataCompany'"><span class="bh1 h1a">Данные компании</span></button>
                    <button class="button-2" :class="{active: navigator === 'applications'}" @click="navigator = 'applications'"><span class="bh2 h1a">Новые заявки</span><div class="boxcifra8" style="margin-left: 7px" v-if="counterNewApplications > 0">{{counterNewApplications}}</div></button>
                    <button class="button-3" :class="{active: navigator === 'auctions'}" @click="navigator = 'auctions'"><span class="bh3 h1a">Активные аукционы</span></button>
                    <button class="button-4" :class="{active: navigator === 'history'}" @click="navigator = 'history'"><span class="bh4 h1a">История аукционов</span></button>
                </div>


                <div class="Company-data" v-if="navigator === 'dataCompany'">
                    <div class="flexte">
                        <div>
                            <div class="flex123"><h1 class="h1_1">Название организации или ИП</h1><a-input type="text"
                                                                                                           class="text1"
                                                                                                           :default-value=this.autocompleteInput.organization />
                            </div>
                            <div class="flex1"><h1 class="h1_1">Юридический адрес</h1><a-input type="text"
                                                                                               class="text1"
                                                                                               :default-value=this.autocompleteInput.address /></div>
                            <div class="flex1"><h1 class="h1_1">ИНН</h1><a-input type="text"
                                                                                 class="text1"
                                                                                 :default-value=this.autocompleteInput.inn /></div>
                            <div class="flex1"><h1 class="h1_1">Банк</h1><a-input type="text"
                                                                                  class="text1"
                                                                                  :default-value=this.autocompleteInput.bank /></div>
                            <div class="flex1"><h1 class="h1_1">Расчетный счет</h1><a-input type="text"
                                                                                            class="text1"
                                                                                            :default-value=this.autocompleteInput.payment /></div>
                            <div class="flex1"><h1 class="h1_1">КПП</h1><a-input type="text"
                                                                                 class="text1"
                                                                                 :default-value=this.autocompleteInput.kpp /></div>
                            <div class="flex1"><h1 class="h1_1">БИК банка</h1><a-input type="text"
                                                                                       class="text1"
                                                                                       :default-value=this.autocompleteInput.bank_bik /></div>
                            <div class="flex1"><h1 class="h1_1">Адрес электронной почты</h1><a-input type="text"
                                                                                                     class="text1"
                                                                                                     :default-value=this.autocompleteInput.email /></div>
                            <div class="flex1"><h1 class="h1_1">Сменить пароль</h1>
                                <a-input-password class="input-pass"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Повторить пароль</h1>
                                <a-input-password class="input-pass"/>
                            </div>

                            <div class="fgjfs"><button class="button1" style="height: 40px"><span class="cox">Сохранить изменения</span></button></div>
                        </div>
                        <div class="adres">
                            <div class="adres" style="margin-top: 35px;">
                                <div>
                                    <h1 class="h1a mtaw">Физическое расположение<br>магазина/склада (для самовывоза)</h1>
                                    <div>
                                        <a-input type="text" class="text1 txt" placeholder="Физическое расположение"/>
                                        <h1 class="h1_1 mdm" style="font-weight: bold;">Возможные города доставки</h1>
                                        <a-input type="text" class="text1 txt" placeholder="Возможные города доставки"/>
                                    </div>
                                </div>
                                <div>
                                    <h1 class="h1a mtt">Продаваемые вами категории</h1>
                                    <div>
                                        <div class="flex"><input type="checkbox" class="checkboxi">
                                            <h1 class="h1_1 m5t">Смартфоны</h1></div>
                                        <div class="flex"><input type="checkbox" class="checkboxi">
                                            <h1 class="h1_1 m5t">Холодильники</h1></div>
                                        <div class="flex"><input type="checkbox" class="checkboxi">
                                            <h1 class="h1_1 m5t">Телевизоры</h1></div>
                                        <div class="flex"><input type="checkbox" class="checkboxi">
                                            <h1 class="h1_1 m5t">Ноутбуки</h1></div>
                                        <h1 class="zeleni">Показать все ></h1>
                                    </div>
                                </div>
                                <h1 class="h1aasfas">Документы компании</h1>
                                <div class="box100">
                                    <div class="flexaround5">
                                        <h1 class="sdf23">Свидетельство ОГРН (или<br>лист записи ЕГРЮЛ)</h1>
                                        <div class="flex">
                                            <img src="./img/gal.png" class="size25 marr5">
                                            <h1 class="h1aaldos mart-2">Готово</h1>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex10">
                                            <div class="flex">
                                                <img src="./img/izmene.png" class="size1 marr5">
                                                <h1 class="red">Редактировать</h1>
                                            </div>
                                            <div class="flexfasf">
                                                <img src="./img/ydal.png" class="size12 marr5">
                                                <h1 class="red">Удалить</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box1001">
                                    <div class="flexaround5">
                                        <h1 class="sdf23 wid221">Свидетельство ИНН</h1>
                                        <div class="flex">
                                            <img src="./img/gal.png" class="size25 marr5">
                                            <h1 class="h1aaldos mart-2">Готово</h1>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex10">
                                            <div class="flex">
                                                <img src="./img/izmene.png" class="size1 marr5">
                                                <h1 class="red">Редактировать</h1>
                                            </div>
                                            <div class="flexfasf">
                                                <img src="./img/ydal.png" class="size12 marr5">
                                                <h1 class="red">Удалить</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="applications" v-if="navigator === 'applications'">
                        <the-new-applications
                            class="adaptive-table"
                            @participate="participate"
                        ></the-new-applications>

                </div>
                <div class="aykcion" v-if="navigator === 'auctions'">
                    <div class="body222">
                        <div class="hr_big">
                            <div class="flexaround">
                                <div>
                                    <h2 class="h8">Номер заявки</h2>
                                    <div class="mh45"></div>
                                    <div class="flex">
                                        <h1 class="data1111">Аукцион<span class="color-zel"> №325478</span><br>от 01.03.2021</h1>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="h8">Наименование товара</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data33030">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                </div>
                                <div>
                                    <h2 class="h8">Текущая цена</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data0103">18000₽</h1>
                                </div>
                                <div>
                                    <h2 class="h8">Статус</h2>
                                    <div class="mh45"></div>
                                    <div class="flex">
                                        <div class="aoaa"><h1 class="data0144 color-zel">Прием ставок</h1></div>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="h8">Чат с покупателем</h2>
                                    <div class="mh45"></div>
                                    <div class="flex">
                                        <div class="boxcifra4">2</div>
                                        <h1 class="data0103 color-zel mess">Сообщения</h1>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="h8">Настройки</h2>
                                    <div class="mh45"></div>
                                    <div>
                                        <div class="flex"><img src="./img/izmene.png" class="size17"><h1 class="rededal">Предложить цену</h1></div>
                                        <div class="flex"><img src="./img/ydal.png" class="size1419"><h1 class="rededal33">Отказаться</h1></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr_min">
                        </div>
                    </div>
                    <div class="adap2">
                        <div class="bodyl">
                            <div class="flex">
                                <div class="hr_big2 mr10">
                                    <h2 class="h88">Номер заявки</h2>
                                    <h2 class="h88">Наименование товара</h2>
                                    <h2 class="h88">Текущая цена</h2>
                                    <h2 class="h88">Статус</h2>
                                    <h2 class="h88">Чат с покупателями</h2>
                                    <h2 class="h88">Настройки</h2>
                                </div>
                                <div class="tal">
                                    <h1 class="data1111 pds">Аукцион<span class="color-zel"> №325478</span> от 01.03.2021</h1>
                                    <h1 class="data33030 p10d">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                    <h1 class="data0103 p10d">18000₽</h1>
                                    <div class="flex p10d">
                                        <div class="aoaa"><h1 class="data0144 color-zel">Прием ставок</h1></div>
                                    </div>
                                    <div class="flex p10d">
                                        <div class="boxcifra4">2</div>
                                        <h1 class="data0103 color-zel mess">Сообщения</h1>
                                    </div>
                                    <div class="p30d">
                                        <div class="flex"><img src="./img/izmene.png" class="size17"><h1 class="rededal">Предложить цену</h1></div>
                                        <div class="flex"><img src="./img/ydal.png" class="size1419"><h1 class="rededal33">Отказаться</h1></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="hr_min">
                        </div>
                    </div>
                </div>
                <div class="histori" v-if="navigator === 'history'">
                    <div class="body222">
                        <div class="hr_big">
                            <div class="flexaround">
                                <div>
                                    <h2 class="h8">Номер заявки</h2>
                                    <div class="mh45"></div>
                                    <div class="flex">

                                        <h1 class="data2">Аукцион<span class="color-zel"> №325478</span><br>от 01.03.2021</h1>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="h8">Наименование товара</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data6">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                </div>
                                <div>
                                    <h2 class="h8">Итоговая цена</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data0103">17200₽</h1>
                                </div>
                                <div>
                                    <h2 class="h8">Результат</h2>
                                    <div class="mh25"></div>
                                    <img src="./img/win.png" class="size80">
                                </div>
                                <div>
                                    <h2 class="h8">Доставка</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data0103">Самовывоз</h1>
                                </div>
                                <div>
                                    <h2 class="h8">Статус</h2>
                                    <div class="mh45"></div>
                                    <h1 class="data0103 color-zel w">Доставлен<br>в магазин</h1>
                                </div>
                            </div>
                            <hr class="hr_min">
                        </div>
                        <div class="flexaround mt192 wid">
                            <div>
                                <div class="mh45"></div>
                                <div class="flex">

                                    <h1 class="data2">Аукцион<span class="color-zel"> №325478</span><br>от 01.03.2021</h1>
                                </div>
                            </div>
                            <div>
                                <div class="mh45"></div>
                                <h1 class="data6">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                            </div>
                            <div>
                                <div class="mh45"></div>
                                <h1 class="data0103 w2">17200₽</h1>
                            </div>
                            <div>
                                <div class="mh25"></div>
                                <img src="./img/lose.png" class="size80">
                            </div>
                            <div>
                                <div class="mh45"></div>
                                <h1 class="data0103">Доставка</h1>
                                <h2 class="ylica">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                            </div>
                            <div>
                                <div class="mh45"></div>
                                <h1 class="data0103 color-zel">Доставлен<br><span class="color-zel2">Отслеживание</span></h1>
                            </div>
                        </div>
                        <hr class="hr_min">
                    </div>
                    <div class="adap3">
                        <div class="bodyl">
                            <div class="flex">
                                <div class="hr_big2 mr10">
                                    <h2 class="h88">Номер заявки</h2>
                                    <h2 class="h88">Наименование товара</h2>
                                    <h2 class="h88">Итоговая цена</h2>
                                    <h2 class="h88">Результат</h2>
                                    <h2 class="h88">Доставка</h2>
                                    <h2 class="h88">Статус</h2>
                                </div>
                                <div class="tal">
                                    <h1 class="data2 pds">Аукцион<span class="color-zel"> №325478</span> от 01.03.2021</h1>
                                    <h1 class="data6 p10d">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                    <h1 class="data0103 w2 p10d">17200₽</h1>
                                    <img src="./img/lose.png" class="size50 p8d">
                                    <div class="flex p8d">
                                        <h1 class="data0103">Доставка</h1>
                                        <h2 class="ylica4">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                                    </div>
                                    <h1 class="data0103 color-zel p10d">Доставлен<br><span class="color-zel2">Отслеживание</span></h1>
                                </div>
                            </div>
                            <hr class="hr_min">
                            <div class="flex">
                                <div class="hr_big2 mr10">
                                    <h2 class="h88">Номер заявки</h2>
                                    <h2 class="h88">Наименование товара</h2>
                                    <h2 class="h88">Итоговая цена</h2>
                                    <h2 class="h88">Результат</h2>
                                    <h2 class="h88">Доставка</h2>
                                    <h2 class="h88">Статус</h2>
                                </div>
                                <div class="tal">
                                    <h1 class="data2 pds">Аукцион<span class="color-zel"> №325478</span> от 01.03.2021</h1>
                                    <h1 class="data6 p10d">Ноутбук ASUS VivoBook<br>Max X541NC-DM114T</h1>
                                    <h1 class="data0103 w2 p10d">17200₽</h1>
                                    <img src="./img/win.png" class="size50 p8d">
                                    <div class="flex p8d">
                                        <h1 class="data0103">Самовывоз</h1>
                                    </div>
                                    <h1 class="data0103 color-zel p10d">Доставлен в магазин</h1>
                                </div>
                            </div>
                            <hr class="hr_min">
                        </div>
                    </div>
                </div>

            </div>
            <!-- main block -->
            <the-footer></the-footer>
            <div class="popup-6" v-if="navigatorModalWindow === 'modalParticipate'">
                <div class="popup-66">
                    <div class="body">

                        <img src="./img/krest.png" class="krest" @click="navigatorModalWindow = ''">
                        <h1 class="pppp10 fonsize" style="margin-top: -50px">АУКЦИОН №325478</h1>
                        <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                        <div class="flex" style="cursor: default;">
                            <div class="tar2">
                                <h1 class="fonsize-slim2">Начальная стоимость</h1>
                                <h1 class="fonsize-slim2 mar30">Информация о товаре</h1>
                                <h1 class="fonsize-slim2 mat192">Доставка</h1>
                                <h1 class="fonsize-slim2 mar30">Добавить комментарий</h1>
                            </div>
                            <div class="wid70">
                                <h1 class="data0103 asdd" style="text-align: left; color: black; margin: 0; margin-top: 8px;">18 000 ₽</h1>
                                <h2 class="mar0 mar30" style="text-align: left; margin-top: 36px; "><span class="fonsize-slim2">Диагональ/разрешение</span> <span class="data0103">15.6"/1920х1080 пикс.</span><br>
                                    <span class="fonsize-slim2">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                    <span class="fonsize-slim2">Оперативная память (RAM)</span> <span class="data0103">4 ГБ</span><br>
                                    <span class="fonsize-slim2">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                                    <span class="fonsize-slim2">Объем HDD</span> <span class="data0103">500 ГБ</span></h2>
                                <h2 class="ylica2 mar50" style="margin-right: 165px; margin-top: 25px; font-size: 18px;">123456, Москва, ул. Багратиона, д.9, кв. 35</h2>
                                <textarea type="text" class="lasttext" style="outline: none"></textarea>
                                <div style="display: flex;">
                                    <a-button class="btn-modal">СОХРАНИТЬ</a-button>
                                    <a-button class="btn-modal">НАЧАТЬ ТОРГИ</a-button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

<!--            <a-modal-->
<!--                :visible="navigatorModalWindow === 'modalParticipate'"-->
<!--                :confirm-loading="confirmLoading"-->
<!--                width="65%"-->
<!--            >-->
<!--                <div class="container-modal">-->
<!--                    <h2 class="title-application">Заявка №325478</h2>-->
<!--                    <p class="text-product">Ноутбук ASUS VivoBook Max X541NC-DM114T</p>-->
<!--                    <p class="description-product" >Начальная стоимость <span class="price-modal">18 000 ₽</span></p>-->
<!--                    <div style="display: flex; flex-wrap: wrap">-->
<!--                        <p class="description-product" style="margin: 0; margin-right: 35px">Информация о товаре</p>-->
<!--                        <div>-->
<!--                            <p></p>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    <p>Доставка <span>123456, Москва, ул. Багритиона, д.9, кв.35</span></p>-->
<!--                    <div>-->
<!--                        <p>Добавьте комментарий</p>-->
<!--                        <a-input type="text" />-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <div class="reject-btn"></div>-->
<!--                        <div class="participate-btn"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a-modal>-->

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
                                    <h2 class="mmm"><span class="fonsize-slim2 asdwg">Диагональ/разрешение</span> <span class="data0103">15.6"/1920х1080 пикс.</span><br>
                                        <span class="fonsize-slim2 asdwg">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                        <span class="fonsize-slim2 asdwg">Оперативная память (RAM)</span> <span class="data0103">4 ГБ</span><br>
                                        <span class="fonsize-slim2 asdwg">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                                        <span class="fonsize-slim2 asdwg">ОбЪем HDD</span> <span class="data0103">500 ГБ</span></h2>
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
        </div>

        <div class="popup-8">
            <div class="popup-88">
                <div class="body">
                    <img src="./img/krest.png" class="krest">
                    <h1 class="pppp10 fonsize">АУКЦИОН №325478</h1>
                    <h2 class="fonsize-slim">Ноутбук ASUS VivoBook Max X541NC-DM114T</h2>
                    <div class="fc">
                        <div class="flex">
                            <div class="tar2">
                                <h1 class="fonsize-slim2">Информация о товаре</h1>
                                <h1 class="fonsize-slim2 mat192">Начальная стоимость</h1>
                                <h1 class="fonsize-slim2 mar30">Предложения продавцов</h1>
                                <h1 class="fonsize-slim2 cenam">Моя цена</h1>
                            </div>
                            <div class="wid70">
                                <h2 class="mmm"><span class="fonsize-slim2 asdwg">Диагональ/разрешение</span> <span class="data0103">15.6"/1920х1080 пикс.</span><br>
                                    <span class="fonsize-slim2 asdwg">Процессор</span><span class="data0103 asdd">Intel Pentium N4200 1.1 ГГц</span><br>
                                    <span class="fonsize-slim2 asdwg">Оперативная память (RAM)</span> <span class="data0103">4 ГБ</span><br>
                                    <span class="fonsize-slim2 asdwg">Графический контроллер</span> <span class="data0103">GeForce 810M 2ГБ</span><br>
                                    <span class="fonsize-slim2 asdwg">ОбЪем HDD</span> <span class="data0103">500 ГБ</span></h2>
                                <h1 class="data0103 marbottom">18 000₽</h1>
                                <div class="blockdis mar35px">
                                    <div><button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span class="flexaround"><h1 class="data0103">М.Видео</h1><h1 class="data0103">17 900₽</h1></span></button></div>
                                    <div><button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span class="flexaround"><h1 class="data0103">Ситилинк</h1><h1 class="data0103">17 900₽</h1></span></button></div>
                                    <div><button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span class="flexaround"><h1 class="data0103">Эльдорадо</h1><h1 class="data0103">17 900₽</h1></span></button></div>
                                    <div><button class="ded2"><h2 class="ylica3">23.03.2021 в 10:34</h2><span class="flexaround"><h1 class="data0103">Online</h1><h1 class="data0103">17 900₽</h1></span></button></div>
                                    <input type="text" class="moicena">
                                    <div><button class="asb data0109 mar50">ПРЕДЛОЖИТЬ ЦЕНУ</button></div>
                                </div>
                            </div>
                        </div>
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
                            <img src="./img/logo.png" class="sizelog">
                            <div class="wid75">
                                <input type="text" placeholder="Введите название города" class="input-city">
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
                    <li class="lib"><a class="li-hr">— полноформатные магазины, в которых некоторые товары можно забрать в день покупки.</a></li>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import 'ant-design-vue/dist/antd.css'

import TheNewApplications from "./Tables/TheNewApplications";
import TheFooter from "./Templates/TheFooter";
export default {
    components: {TheFooter, TheNewApplications},
    data: () => ({
        navigator: 'dataCompany',
        navigatorModalWindow: null,
        counterNewApplications: 8,
        autocompleteInput: {
            organization: 'ОАО "МВидео"',
            address: 'ул. Интернациональная, д.56',
            inn: '1501501513',
            bank: 'Сбербанк',
            payment: '13515100',
            kpp: '10101010050505',
            bank_bik: '505050505',
            email: 'mvideo@mail.ru'
        }
    }),
    methods: {
        participate() {
            this.navigatorModalWindow = 'modalParticipate'
        }
    }
}
</script>

<style scoped type="text/css">
@import "../../css/kabinet-prodavca-active.css";
</style>
