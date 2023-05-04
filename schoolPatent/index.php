<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
    <script src="https://unpkg.com/vue@next"></script>
    <title>Школьный патент</title>
</head>
<body>
    <app id="main"> 
        <nav>
            <h4 class="title">Школьный патент</h4>
            <h5><a href="#" @click="getNotAccepted(1)">Заявки на принятие</a></h5>
            <h5><a href="#" @click="getAccepted(1)">Одобренные заявки</a></h5>
        </nav>
        <!-- MAIN -->
        <main>
            <h4 v-if="!isAccepted && rowdata.length>0" class="table_title">Заявки на принятие</h4>
            <table v-if="rowdata.length>0">
                <thead>
                    <th v-for="key in Object.keys(rowdata[0])">{{key}}</th>
                </thead>
                <tbody id="table_content">
                    <tr v-for="item in rowdata">
                        <td v-for="key in Object.keys(rowdata[0])">{{item[key]}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="nums_links" v-if="pagesCount > 1 && rowdata.length>0">
                <a href="#" class="link" v-if="!isAccepted" v-for="i in pagesCount" @click="getNotAccepted(i)">{{i}}</a>
                <a href="#" class="link" v-if="isAccepted" v-for="i in pagesCount" @click="getAccepted(i)">{{i}}</a>
            </div>
            <div v-if="rowdata.length== 0">
                {{text}}
            </div>
        </main>
        <!-- END MAIN -->
        <footer>
            <span>©2023, Шаманаев Данилл Сергеевич ИС-20</span>
            <span id="test">тел. +79774117570 </span>
        </footer>
    </app>

<!-- SCRIPTS -->

    <script>
        const TableApp = {
            data() {
                return {
                    rowdata:[],
                    pagesCount:1,
                    isAccepted:false,
                    text:"Подождите пожалуйста..."
                }
            },
            methods: {
                addItem(id,test) {
                    var my_object = {
                        id:this.id,
                        test:this.test,
                    };
                    this.rowdata.push(my_object);
                },
                async getTableData(page = 1, query) {
                    this.text = "Подождите пожалуйста...";
                    this.rowdata = [];
                    const rowCount = 25;

                    async function getDataFromServer(url, query) {
                        const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json' 
                        },
                        body: JSON.stringify({sql:query}),
                    }).then(function(response) {
                            if (response.status >= 200 && response.status < 300) {
                                return response.text()
                            }
                            throw new Error(response.statusText)
                        })
                        .then(function(response) {
                            return response;
                        })
                        return response;
                    }
                    let countQuery = "SELECT count(*) FROM patents";
                    let pagesResponse = await getDataFromServer('http://schoolpatent/server.php', countQuery);
                    let rowsCount = Object.values(JSON.parse(pagesResponse))[0]["count(*)"];
                    this.pagesCount = Math.round(rowsCount / rowCount);
                    
                    let dataTable = await getDataFromServer('http://schoolpatent/server.php', query);
                    if(dataTable == "0") {
                        this.text = "Записей нет"
                        return;
                    };

                    let parse = Object.values(JSON.parse(dataTable));

                    for (var i=0; i<parse.length; i++) 
                    {
                        if (parse[i].Результат == "0") {
                            parse[i].Результат = "На рассмотрении";
                        }
                    }
                    
                    this.rowdata = parse;
                    if(this.rowdata.length <= rowCount)
                    {
                        this.pagesCount = 1;
                    } 
                },
                async getNotAccepted(page = 1, rowCount = 25) {
                    await this.getTableData(page, `SELECT contacts.first_name as 'Имя_участника', contacts.last_name as 'Фамилия_участника',adresses.city as 'Город_участника',repr.first_name as 'Имя_представителя',repr.last_name as 'Фамилия_представителя',address.city as 'Город представителя',patents.annotation as 'Аннотация',patents.accepted as 'Результат' FROM patents JOIN contacts ON contacts.id = patents.id_participant JOIN contacts repr ON repr.id = patents.id_representative JOIN adresses ON adresses.id = contacts.id_address JOIN adresses address On address.id = repr.id_address WHERE patents.accepted = '0' limit ${rowCount} offset ${(page-1) * rowCount};`);
                },
                async getAccepted(page = 1, rowCount = 25) {
                    this.rowdata = [];
                    await this.getTableData(page, `SELECT contacts.first_name as 'Имя_участника', contacts.last_name as 'Фамилия_участника',adresses.city as 'Город_участника',repr.first_name as 'Имя_представителя',repr.last_name as 'Фамилия_представителя',address.city as 'Город представителя',patents.annotation as 'Аннотация',patents.accepted as 'Результат' FROM patents JOIN contacts ON contacts.id = patents.id_participant JOIN contacts repr ON repr.id = patents.id_representative JOIN adresses ON adresses.id = contacts.id_address JOIN adresses address On address.id = repr.id_address WHERE patents.accepted = '1' limit ${rowCount} offset ${(page-1) * rowCount}`);
                }
            },
        }

        const app  = Vue.createApp(TableApp);
        const vm = app.mount("#main");

        let start = async function(page) {await vm.getNotAccepted(page,25);};
        start();
            
        

    </script>
</body>
</html>

