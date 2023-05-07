<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/vue@next"></script>
    <script src="script.js"></script>
    <title>Генератор счетов</title>
</head>
<body>
    <main>
        <form>
            <div class="data-block">
                <div class="data-inner">
                    <input type="text" name="title" id="companyTitle" placeholder="Название компании" required>
                    <textarea name="companyAddress" id="companyAddress" placeholder="Адрес компании" required></textarea>
                    <input type="tel" name="companyTel" id="companyTel" placeholder="Номер телефона" required>
                    <input type="number" name="companyInn" id="companyInn" placeholder="ИНН" required>
                    <input type="number" name="companyKpp" id="companyKpp" placeholder="КПП" required>
                    <input type="text" name="companyDir" id="companyDir" placeholder="Директор" required>
                    <input type="text" name="companyBuh" id="companyBuh" placeholder="Бухгалтер" required>
                </div>
                <div class="data-inner">
                    <div class="inner-block">
                        <input type="text" name="title" id="clientTitle" placeholder="Название компании клиента" required>
                        <textarea name="clientAddress" id="clientAddress" placeholder="Адрес клиента" required></textarea>
                        <input type="tel" name="clientTel" id="clientTel" placeholder="Номер телефона" required>
                    </div>
                    <div class="inner-block">
                    <input type="text" name="invoiceNumber" id="invoiceNumber" placeholder="Номер счета" required>
                    <input type="date" name="invoiceDate" id="invoiceDate" placeholder="Дата" required>
                    </div>
                </div>
            </div>
            <!--  -->
            <hr color='gray' width='95%' height="2px">
            <!--  -->
            <div class="data-block">
                <div class="data-inner">
                    <input type="text" name="title" id="companyBank" placeholder="Банк получателя" required>
                    <input type="number" name="companyBik" id="companyBik" placeholder="БИК" required>
                    <input type="number" name="bankInvoiceNumber" id="bankInvoiceNumber" placeholder="Лицевой счет" required>
                    <input type="number" name="companyInvoiceNumber" id="companyInvoiceNumber" placeholder="Расчетный счет" required>
                </div>
                
            </div>
            <!--  -->
            <hr color='gray' width='95%' height="2px"> 
            <!--  -->
            <div class="table-wrap" id="table">
                <table>
                    <thead>
                        <th width='40%'>Наименование услуги</th>
                        <th width='10%'>Кол-во</th>
                        <th>Ед</th>
                        <th>Цена</th>
                        <th>Итоговая сумма</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in dataRows" :key="index">
                            <td contenteditable='true' v-for="key in Object.keys(item).length-1" @keyup="updateTable()">{{item[key-1]}}</td>
                            <td contenteditable='false'>{{item[Object.keys(item).length-1]}}</td>
                            <td contenteditable='false'>
                                <a @click="removeRow(item)">Удалить</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button @click="addNewRow()">Добавить</button>
            </div>
            <!--  -->
            <hr color='gray' width='95%' height="2px"> 
            <!--  -->
            <div class="table-wrap">
                <button type="submit">Сгенерировать</button>
            </div>
        </form>
    </main>
</body>
</html>
